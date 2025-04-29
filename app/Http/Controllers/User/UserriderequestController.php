<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Driverfarerequest;
use App\Models\Userriderequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserriderequestController extends Controller
{
    public function selact_ride(Request $request){
        return view('user-app.selact-ride', ['request' => $request]);
    }

    public function driver_fare_request(Request $request)
    {
        $userriderequest = new Userriderequest();
        $userriderequest->user_id = Auth::guard('user')->id();
        $userriderequest->pickup_location = $request->pickup_location;
        $userriderequest->destination_location = $request->destination_location;
        $userriderequest->fare = $request->fare;
        $userriderequest->payment_method = $request->payment_method;
        $userriderequest->delivery_date = $request->delivery_date;
        $userriderequest->distance = '10';
        $userriderequest->expiry = Carbon::now()->addMinute(2);
        $userriderequest->save();
        return view('user-app.driver-fare-request', ['userriderequest_id' => $userriderequest->id]);
    }

    public function get_driver_fare_request(Request $request)
    {
        $driverFareRequests = Driverfarerequest::with('driver', 'userriderequest') // if you have these relationships
        ->where('userriderequest_id', $request->input('userriderequest_id'))
//            ->where('expiry', '>', Carbon::now())
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($driverFareRequests);
    }
}
