<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Ridesbooked;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RideController extends Controller
{
    public function my_rides(){
        $pending_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'pending')
            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        $completed_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'completed')
            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        $cancelled_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'cancelled')
            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        return view('driver-app.my-rides', compact('pending_rides', 'completed_rides', 'cancelled_rides'));
    }

    public function active_rides()
    {
        $active_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'active')
            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        return view('driver-app.active-ride', compact('active_rides'));
    }

    public function track_ride()
    {
        $track_ride = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'active')
            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->first();
        return view('driver-app.track-ride', compact('track_ride'));
    }

    public function driver_location_update(Request $request)
    {

        $driver = Driver::find(Auth::guard('driver')->id());
        $driver->latitude = $request->lat;
        $driver->longitude = $request->lng;
        $driver->save();

        $ride = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'active')
            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->first();
        if ($ride && $ride->status === 'active') {
            $ride->driver_lat = $request->lat;
            $ride->driver_lng = $request->lng;
            $ride->save();
        }
    }

    public function ride_details(Request $request)
    {
        $ride_detail = Ridesbooked::where('id', $request->ride_id)
            ->with('driver', 'user')
            ->first();
        return view('driver-app.ride-details', compact('ride_detail'));
    }

}
