<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ridesbooked;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RideController extends Controller
{
    public function my_rides(){
        $pending_rides = Ridesbooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'pending')
            ->where('delivery_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        $completed_rides = Ridesbooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'completed')
            ->where('delivery_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        $cancelled_rides = Ridesbooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'cancelled')
            ->where('delivery_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        $active_rides = Ridesbooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'active')
            ->where('delivery_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        return view('user-app.my-rides', compact('pending_rides', 'completed_rides', 'cancelled_rides', 'active_rides'));
    }

    public function ride_details(Request $request)
    {
        $ride_details = Ridesbooked::where('id', $request->ride_id)
            ->with('driver', 'user')
            ->first();
        return view('user-app.ride-details',['ride_detail' => $ride_details]);
    }
}
