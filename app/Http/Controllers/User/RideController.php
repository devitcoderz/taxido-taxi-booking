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
        $driverFareRequests = Userriderequest::with('user','packagetype','packagesubtype') // if you have these relationships
        ->where('status', 'waiting')
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

        $toleranceMeters = 1000; // 1 km radius
        $matches = [];

        $rides = Ridesbooked::whereNotNull('route_polyline')->get();

        foreach ($rides as $ride) {
            $routeCoords = $this->decodePolyline($ride->route_polyline);

            $pickupMatch = $this->isPointNearRoute($pickupCoords['lat'], $pickupCoords['lng'], $routeCoords, $toleranceMeters);
            $destinationMatch = $this->isPointNearRoute($destinationCoords['lat'], $destinationCoords['lng'], $routeCoords, $toleranceMeters);

            if ($pickupMatch && $destinationMatch) {
                $matches[] = $ride;
            }
        }

        dd($matches);

        return view('user-app.date-time-schedule');
    }

    private function geocodeAddress($address)
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
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
            $dlat = (($result & 1) ? ~($result >> 1) : ($result >> 1));
            $lat += $dlat;

            $shift = $result = 0;
            do {
                $b = ord($encoded[$index++]) - 63;
                $result |= ($b & 0x1f) << $shift;
                $shift += 5;
            } while ($b >= 0x20);
            $dlng = (($result & 1) ? ~($result >> 1) : ($result >> 1));
            $lng += $dlng;

            $points[] = ['lat' => $lat / 1E5, 'lng' => $lng / 1E5];
        }

        return $points;
    }

    private function haversineDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371000; // meters
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) ** 2 +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $earthRadius * $c;
    }

    private function isPointNearRoute($pointLat, $pointLng, $routeCoords, $toleranceMeters)
    {
        foreach ($routeCoords as $coord) {
            $distance = $this->haversineDistance($pointLat, $pointLng, $coord['lat'], $coord['lng']);
            if ($distance <= $toleranceMeters) {
                return true;
            }
        }
        return false;
    }

}
