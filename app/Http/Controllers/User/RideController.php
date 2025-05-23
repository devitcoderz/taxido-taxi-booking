<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Ridesbooked;
use App\Models\User;
use App\Models\Userriderequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function ride_details(Request $request)
    {
        $ride_details = Ridesbooked::where('id', $request->ride_id)
            ->with('driver', 'user')
            ->first();
        return view('user-app.ride-details', ['ride_detail' => $ride_details]);
    }

    public function get_user_ride_request()
    {
        $driverFareRequests = Userriderequest::with('user') // if you have these relationships
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
}
