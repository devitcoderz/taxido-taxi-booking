<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\ParcelCategory;
use App\Models\Ridesbooked;
use App\Models\User;
use App\Models\Userriderequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RideController extends Controller
{
    public function my_rides()
    {
        $pending_rides = Ridesbooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'pending')
            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        $completed_rides = Ridesbooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'completed')
//            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        $cancelled_rides = Ridesbooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'cancelled')
//            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        $active_rides = Ridesbooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'active')
//            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        return view('user-app.my-rides', compact('pending_rides', 'completed_rides', 'cancelled_rides', 'active_rides'));
    }

    public function track_ride()
    {
        $track_ride = Ridesbooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'active')
//            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->first();
        return view('user-app.track-ride', [
            'pickup_location' => $track_ride->pickup_location,
            'destination_location' => $track_ride->destination_location
        ]);
    }

    public function get_driver_location(Request $request)
    {
        $track_ride = Ridesbooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'active')
//            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->first();

        if (!$track_ride || !$track_ride->driver_lat || !$track_ride->driver_lng) {
            return response()->json(['lat' => null, 'lng' => null]);
        }

        return response()->json([
            'lat' => $track_ride->driver_lat,
            'lng' => $track_ride->driver_lng
        ]);
    }

    public function ride_details(Request $request)
    {
        $ride_details = Ridesbooked::where('id', $request->ride_id)
            ->with('driver', 'user')
            ->first();
        return view('user-app.ride-details', ['ride_detail' => $ride_details]);
    }

    public function get_user_ride_request()
    {
        $driver = Driver::find(Auth::guard('driver')->user()->id);
        $driverTransports = json_decode($driver->means_of_transport ?? '[]', true);

        $driverFareRequests = Userriderequest::with('user','packagetype','packagesubtype') // if you have these relationships
        ->where('status', 'waiting')
            ->whereNull('is_targetted')
//            ->where('expiry', '>', Carbon::now())
            ->orderBy('id', 'desc')
            ->get()
            ->filter(function ($request) use ($driverTransports) {
                $requestTransports = json_decode($request->means_of_transport ?? '[]', true);
                return !empty(array_intersect($driverTransports, $requestTransports));
            });
        return response()->json($driverFareRequests);
    }

    public function get_personal_ride_request()
    {
        $driverFareRequests = Userriderequest::with('user','packagetype','packagesubtype') // if you have these relationships
        ->where('status', 'waiting')
            ->where('targetted_driver_id', Auth::guard('driver')->user()->id)
            ->where('is_targetted','1')
//            ->where('expiry', '>', Carbon::now())
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($driverFareRequests);
    }

    public function markRidecomplete($ride_id)
    {
        $ride_detail = Ridesbooked::where('id', $ride_id)
            ->with('driver', 'user')
            ->first();
        $departure = Carbon::parse($ride_detail->departure_date);
        $diff = Carbon::now()->diff($departure);
        $result = "{$diff->d} days {$diff->h} hours {$diff->i} minutes";

        $ride_detail->status = 'completed';
        $ride_detail->arrival_date = Carbon::now();
        $ride_detail->transport_time = $result;
        $ride_detail->save();
        session()->flash('success', 'Ride Completed Successfully!');
        if ($ride_detail->payment_method == 'online'){
            $user = User::find($ride_detail->user_id);
            $user->balance = $user->balance - $ride_detail->fare;
            $user->save();
            $driver = Driver::find($ride_detail->driver_id);
            $driver->balance = $driver->balance + $ride_detail->fare;
            $driver->save();
        }
        if ($user && $user->email) {
            try {
                Mail::to($user->email)->send(new \App\Mail\RideCompletedNotification($ride_detail));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }
        return view('user-app.ride-details', [
            'ride_detail' => $ride_detail,
            'status' => 'completed'
        ]);
    }

    public function sub_categories(Request $request)
    {
        $category = ParcelCategory::with('sub_category')->find($request->category_id);
        return response()->json(['category' => $category]);
    }

    public function getNearbyDrivers(Request $request)
    {
        $latitude = floatval(request()->lat);    // e.g. 32.0836
        $longitude = floatval(request()->lng);  // e.g. 72.6711
        $distance = 10; // km

        $drivers = DB::table('drivers')
            ->select('*', DB::raw("
        (6371 * acos(
            cos(radians($latitude)) *
            cos(radians(latitude)) *
            cos(radians(longitude) - radians($longitude)) +
            sin(radians($latitude)) *
            sin(radians(latitude))
        )) AS distance
    "))
            ->having('distance', '<=', $distance)
            ->orderBy('distance', 'asc')
            ->get();

        return response()->json($drivers);
    }

    public function targeted_transport_route(Request $request)
    {
        $pickupAddress = $request->pickup_location;
        $destinationAddress = $request->desination_location;

        $pickupCoords = $this->geocodeAddress($pickupAddress);
        $destinationCoords = $this->geocodeAddress($destinationAddress);

        if (!$pickupCoords || !$destinationCoords) {
            return back()->with('error', 'Could not determine pickup or destination location.');
        }

        $toleranceMeters = 20000; // 1 km radius
        $matches = [];

        $minRideIds = Ridesbooked::whereNotNull('route_polyline')
            ->where('status','active')
            ->groupBy('driver_id')
            ->selectRaw('MIN(id) as id')
            ->pluck('id');

// Step 2: Fetch full ride records for those IDs
        $rides = Ridesbooked::whereIn('id', $minRideIds)->get();

        foreach ($rides as $ride) {
            $routeCoords = $this->decodePolyline($ride->route_polyline);

            $pickupMatch = $this->isPointNearRoute(
                $pickupCoords['lat'], $pickupCoords['lng'], $routeCoords, $toleranceMeters, 'Pickup'
            );
            $destinationMatch = $this->isPointNearRoute(
                $destinationCoords['lat'], $destinationCoords['lng'], $routeCoords, $toleranceMeters, 'Destination'
            );

            Log::info("Pickup: ", $pickupCoords);
            Log::info("Destination: ", $destinationCoords);
            Log::info("Decoded route has " . count($routeCoords) . " points");

            if ($pickupMatch && $destinationMatch) {
                $ride->match_type = 'both';
                $matches[] = $ride;
            } elseif ($pickupMatch) {
                $ride->match_type = 'pickup_only';
                $matches[] = $ride;
            } elseif ($destinationMatch) {
                $ride->match_type = 'destination_only';
                $matches[] = $ride;
            }
        }

        return view('user-app.date-time-schedule', compact('matches','pickupAddress','destinationAddress'));
    }

    private function geocodeAddress($address)
    {
        $apiKey = 'AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE';
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=$apiKey";

        $response = Http::get($url)->json();

        if (!empty($response['results'][0]['geometry']['location'])) {
            return $response['results'][0]['geometry']['location']; // ['lat' => ..., 'lng' => ...]
        }

        return null;
    }

    private function decodePolyline($encoded)
    {
        $points = [];
        $index = $lat = $lng = 0;

        while ($index < strlen($encoded)) {
            $b = $shift = $result = 0;
            do {
                $b = ord($encoded[$index++]) - 63;
                $result |= ($b & 0x1f) << $shift;
                $shift += 5;
            } while ($b >= 0x20);
            $deltaLat = (($result & 1) ? ~($result >> 1) : ($result >> 1));
            $lat += $deltaLat;

            $shift = $result = 0;
            do {
                $b = ord($encoded[$index++]) - 63;
                $result |= ($b & 0x1f) << $shift;
                $shift += 5;
            } while ($b >= 0x20);
            $deltaLng = (($result & 1) ? ~($result >> 1) : ($result >> 1));
            $lng += $deltaLng;

            $points[] = [
                'lat' => $lat * 1e-5,
                'lng' => $lng * 1e-5
            ];
        }

        return $points;
    }

    private function isPointNearRoute($pointLat, $pointLng, array $routeCoords, $toleranceMeters = 20000, $pointLabel = '')
    {
        $minDistance = INF;

        for ($i = 0; $i < count($routeCoords) - 1; $i++) {
            $start = $routeCoords[$i];
            $end = $routeCoords[$i + 1];
            $distance = $this->distanceToSegment($pointLat, $pointLng, $start, $end);

            if ($distance < $minDistance) {
                $minDistance = $distance;
            }

            if ($distance <= $toleranceMeters) {
                \Log::info("✅ $pointLabel is near the route. Distance: {$distance} m");
                return true;
            }
        }

        \Log::warning("❌ $pointLabel is NOT near the route. Closest distance: {$minDistance} m");
        return false;
    }


    private function distanceToSegment($px, $py, $start, $end)
    {
        $earthRadius = 6371000;

        $lat1 = deg2rad($start['lat']);
        $lng1 = deg2rad($start['lng']);
        $lat2 = deg2rad($end['lat']);
        $lng2 = deg2rad($end['lng']);
        $plat = deg2rad($px);
        $plng = deg2rad($py);

        $dx = $lng2 - $lng1;
        $dy = $lat2 - $lat1;

        $u = (($plat - $lat1) * $dy + ($plng - $lng1) * $dx) / ($dy * $dy + $dx * $dx);
        $u = max(min($u, 1), 0);

        $closestLat = $lat1 + $u * $dy;
        $closestLng = $lng1 + $u * $dx;

        return $this->haversineDistance(rad2deg($plat), rad2deg($plng), rad2deg($closestLat), rad2deg($closestLng));
    }


    private function haversineDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371000; // meters

        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);

        $a = sin($dLat / 2) ** 2 +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLng / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }

}
