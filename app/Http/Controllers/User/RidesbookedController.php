<?php

namespace App\Http\Controllers\User;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Driverfarerequest;
use App\Models\Message;
use App\Models\Ridesbooked;
use App\Models\User;
use App\Models\Userriderequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        $ridesbooked->receiver_name = $userriderequest->receiver_name;
        $ridesbooked->receiver_email = $userriderequest->receiver_email;
        $ridesbooked->receiver_phone = $userriderequest->receiver_phone;
        $ridesbooked->pickup_location = $userriderequest->pickup_location;
        $ridesbooked->destination_location = $userriderequest->destination_location;
        $ridesbooked->departure_date      = $userriderequest->departure_date; // assuming current time as departure
        $ridesbooked->arrival_date        = $userriderequest->arrival_date;
        $ridesbooked->transport_time_value = $userriderequest->transport_time_value;
        $ridesbooked->transport_time_unit = $userriderequest->transport_time_unit;
        $ridesbooked->distance            = $userriderequest->distance ?? 0;
        $ridesbooked->type_of_package   = $userriderequest->type_of_package;
        $ridesbooked->length_of_package   = $userriderequest->length_of_package;
        $ridesbooked->width_of_package    = $userriderequest->width_of_package;
        $ridesbooked->weight_of_package    = $userriderequest->weight_of_package;
        $ridesbooked->volume_of_package   = $userriderequest->volume_of_package;
        $ridesbooked->quantity_of_package = $userriderequest->quantity_of_package;
        $ridesbooked->fare                = $driverfarerequest->requested_fare;
        $ridesbooked->travel_company      = $userriderequest->travel_company;
        $ridesbooked->comments            = $userriderequest->comments;
        $ridesbooked->payment_method      = $userriderequest->payment_method;
        $ridesbooked->expiry = $userriderequest->expiry;
        $ridesbooked->status = 'pending';
        $ridesbooked->save();

        $driverfarerequest->status = 'accepted';
        $driverfarerequest->save();
        $userriderequest->status = 'accepted';
        $userriderequest->fare = $driverfarerequest->requested_fare;
        $userriderequest->save();

        $user = User::find($ridesbooked->user_id);
        if ($user && $user->email) {
            try {
                Mail::to($user->email)->send(new \App\Mail\RideBookedNotification($ridesbooked));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }

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
