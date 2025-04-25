<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driverfarerequest;
use App\Models\Ridesbooked;
use App\Models\Userriderequest;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class RidesbookedController extends Controller
{
    public  function accept_ride_confirmed($userriderequest_id)
    {
        $userriderequest = Userriderequest::find($userriderequest_id);

        $ridesbooked = new Ridesbooked();
        $ridesbooked->user_id = $userriderequest->user_id;
        $ridesbooked->driver_id = Auth::guard('driver')->id();
        $ridesbooked->pickup_location = $userriderequest->pickup_location;
        $ridesbooked->destination_location = $userriderequest->destination_location;
        $ridesbooked->fare = $userriderequest->fare;
        $ridesbooked->payment_method = $userriderequest->payment_method;
        $ridesbooked->delivery_date = $userriderequest->delivery_date;
        $ridesbooked->distance = $userriderequest->distance;
        $ridesbooked->expiry = $userriderequest->expiry;
        $ridesbooked->status = 'pending';
        $ridesbooked->save();
        return view('driver-app.accept-ride-confirmed',['ridesbooked' => $ridesbooked])->with(['success' => 'Ride booked successfully']);
    }
}
