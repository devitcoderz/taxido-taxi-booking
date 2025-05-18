<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driverfarerequest;
use App\Models\Otp;
use App\Models\Ridesbooked;
use App\Models\User;
use App\Models\Userriderequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;

class RidesbookedController extends Controller
{
    public  function accept_ride_confirmed($userriderequest_id)
    {
        $userriderequest = Userriderequest::find($userriderequest_id);

        return view('driver-app.accept-ride-confirmed',['userriderequest' => $userriderequest])->with(['success' => 'Ride booked successfully']);
    }

    public function ride_verification($userriderequest_id)
    {
        $userriderequest = Userriderequest::find($userriderequest_id);

        $verificationCode = rand(10000, 99999);
        $message = "Your verification code is: $verificationCode";

        $account_sid = env('TWILIO_SID_KEY');
        $auth_token = env('TWILIO_AUTH_TOKEN');
        $twilio_number =  env('TWILIO_NUMBER');

//                $client = new Client($account_sid, $auth_token);
//                $client->messages->create(
//                    '+'.Auth::guard('driver')->user()->phone,
//                    array(
//                        'from' => $twilio_number,
//                        'body' => $message
//                    )
//                );
        session(['verification_code' => $verificationCode]);

        $expiresAt = Carbon::now()->addMinutes(5);
        Otp::create([
            'user_id' => $userriderequest->user_id, // or however you're identifying the user
            'otp' => $verificationCode,
            'expires_at' => $expiresAt,
        ]);

        return view('driver-app.ride-verification',['userriderequest' => $userriderequest]);
    }

    public function start_ride($ride_id)
    {
        $ride_booked = Ridesbooked::find($ride_id);

        $verificationCode = rand(10000, 99999);
        $message = "Your verification code is: $verificationCode";

        $account_sid = env('TWILIO_SID_KEY');
        $auth_token = env('TWILIO_AUTH_TOKEN');
        $twilio_number =  env('TWILIO_NUMBER');

//                $client = new Client($account_sid, $auth_token);
//                $client->messages->create(
//                    '+'.Auth::guard('driver')->user()->phone,
//                    array(
//                        'from' => $twilio_number,
//                        'body' => $message
//                    )
//                );
        session(['verification_code' => $verificationCode]);

        $expiresAt = Carbon::now()->addMinutes(5);
        Otp::create([
            'user_id' => $ride_booked->user_id, // or however you're identifying the user
            'otp' => $verificationCode,
            'expires_at' => $expiresAt,
        ]);

        return view('driver-app.book-ride-verification',['ride_booked' => $ride_booked]);
    }

    public function otp_successfully(Request $request)
    {
        if ($request->otp == session('verification_code')) {
            try {

                $userriderequest = Userriderequest::find($request->userriderequest_id);

                $ridesbooked = new Ridesbooked();
                $ridesbooked->user_id = $userriderequest->user_id;
                $ridesbooked->driver_id = Auth::guard('driver')->id();
                $ridesbooked->receiver_name = $userriderequest->receiver_name;
                $ridesbooked->receiver_email = $userriderequest->receiver_email;
                $ridesbooked->receiver_phone = $userriderequest->receiver_phone;
                $ridesbooked->pickup_location = $userriderequest->pickup_location;
                $ridesbooked->destination_location = $userriderequest->destination_location;
                $ridesbooked->departure_date      = $userriderequest->departure_date; // assuming current time as departure
                $ridesbooked->distance            = $userriderequest->distance ?? 0;
                $ridesbooked->type_of_package   = $userriderequest->type_of_package;
                $ridesbooked->length_of_package   = $userriderequest->length_of_package;
                $ridesbooked->width_of_package    = $userriderequest->width_of_package;
                $ridesbooked->weight_of_package    = $userriderequest->weight_of_package;
                $ridesbooked->volume_of_package   = $userriderequest->volume_of_package;
                $ridesbooked->quantity_of_package = $userriderequest->quantity_of_package;
                $ridesbooked->fare                = $userriderequest->fare;
                $ridesbooked->travel_company      = $userriderequest->travel_company;
                $ridesbooked->comments            = $userriderequest->comments;
                $ridesbooked->payment_method      = $userriderequest->payment_method;
                $ridesbooked->expiry = $userriderequest->expiry;
                $ridesbooked->status = 'pending';
                $ridesbooked->save();

                $userriderequest->status = 'accepted';
                $userriderequest->save();

                Session::forget('verification_code');

                $user = User::find($ridesbooked->user_id);
                if ($user && $user->email) {
                    try {
                        Mail::to($user->email)->send(new \App\Mail\RideBookedNotification($ridesbooked));
                    }
                    catch (\Exception $e) {
                        Log::info($e->getMessage());
                    }
                }

                return view('driver-app.otp-successfully')->with('success', 'Ride booked successfully!');
            }
            catch (\Exception $e) {
                Log::error('User Registration Error: ' . $e->getMessage());
                return back()->with('error', 'Something went wrong! Please try again.'. $e->getMessage());
            }
        }
        else {
            return redirect()->back()->with('error', 'Invalid OTP');
        }

    }
    public function start_ride_otp_successfully(Request $request)
    {
        if ($request->otp == session('verification_code')) {
            try {

                $ridesbooked = Ridesbooked::where('id', $request->booked_ride_id)->first();
                $ridesbooked->status = 'active';
                $ridesbooked->save();

                Session::forget('verification_code');

                $user = User::find($ridesbooked->user_id);
                if ($user && $user->email) {
                    try {
                        Mail::to($user->email)->send(new \App\Mail\RideStartedNotification($ridesbooked));
                    }
                    catch (\Exception $e) {
                        Log::info($e->getMessage());
                    }
                }

                return view('driver-app.otp-successfully')->with('success', 'Ride Started successfully!');
            }
            catch (\Exception $e) {
                Log::error('User Registration Error: ' . $e->getMessage());
                return back()->with('error', 'Something went wrong! Please try again.');
            }
        }
        else {
            return redirect()->back()->with('error', 'Invalid OTP');
        }

    }

    public function ride_complete_request($ride_id)
    {
        $ride_booked = Ridesbooked::find($ride_id);

//        dd($ride_booked);

        if ($ride_booked && $ride_booked->receiver_email) {
            try {
                Mail::to($ride_booked->receiver_email)->send(new \App\Mail\RideCompleteRequestNotification($ride_booked));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Ride requested successfully to mark as complete!');

    }
}
