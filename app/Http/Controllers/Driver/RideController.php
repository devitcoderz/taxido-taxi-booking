<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Ridesbooked;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RideController extends Controller
{
    public function my_rides(){
        $pending_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'pending')
            ->where('delivery_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        $completed_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'completed')
            ->where('delivery_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        $cancelled_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'cancelled')
            ->where('delivery_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        return view('driver-app.my-rides', compact('pending_rides', 'completed_rides', 'cancelled_rides'));
    }

    public function active_rides()
    {
        $active_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'active')
            ->where('delivery_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        return view('driver-app.active-ride', compact('active_rides'));
    }
}
