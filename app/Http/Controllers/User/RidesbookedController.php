<?php

namespace App\Http\Controllers\User;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Driverfarerequest;
use App\Models\Message;
use App\Models\Ridesbooked;
use App\Models\Userriderequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class RidesbookedController extends Controller
{
    public function accept_ride_details(Request $request)
    {
        $driverfarerequest = Driverfarerequest::where('id', $request->input('driverfarerequest_id'))->first();
        $userriderequest_id = $driverfarerequest->userriderequest_id;
        $userriderequest = Userriderequest::find($userriderequest_id);

        $ridesbooked = new Ridesbooked();
        $ridesbooked->user_id = $userriderequest->user_id;
        $ridesbooked->driver_id = $request->driver_id;
        $ridesbooked->pickup_location = $userriderequest->pickup_location;
        $ridesbooked->destination_location = $userriderequest->destination_location;
        $ridesbooked->fare = $driverfarerequest->fare;
        $ridesbooked->payment_method = $userriderequest->payment_method;
        $ridesbooked->delivery_date = $userriderequest->delivery_date;
        $ridesbooked->distance = $userriderequest->distance;
        $ridesbooked->expiry = $userriderequest->expiry;
        $ridesbooked->status = 'pending';
        $ridesbooked->save();

        $driverfarerequest->status = 'accepted';
        $driverfarerequest->save();
        $userriderequest->status = 'accepted';
        $userriderequest->fare = $driverfarerequest->fare;
        $userriderequest->save();

        return view('user-app.accept-ride-details',['ridesbooked' => $ridesbooked])->with(['success' => 'Ride booked successfully']);
    }

    public function chat(Request $request)
    {
        $message = Message::create([
            'sender_id' => Auth::guard('driver')->id(),
            'sender_type' => 'App\Models\Driver', // User or Driver
            'receiver_id' => '1',
            'receiver_type' => 'App\Models\User', // 'App\Models\User' or 'App\Models\Driver'
            'body' => $request->message,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['message' => $message]);
    }

}
