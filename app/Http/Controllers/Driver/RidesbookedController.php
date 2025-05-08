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
use Illuminate\Support\Facades\Session;

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

                $client = new Client($account_sid, $auth_token);
                $client->messages->create(
                    '+'.Auth::guard('driver')->user()->phone,
                    array(
                        'from' => $twilio_number,
                        'body' => $message
                    )
                );
        session(['verification_code' => $verificationCode]);

        $expiresAt = Carbon::now()->addMinutes(5);
        Otp::create([
            'user_id' => $userriderequest->user_id, // or however you're identifying the user
            'otp' => $verificationCode,
            'expires_at' => $expiresAt,
        ]);

        return view('driver-app.ride-verification',['userriderequest' => $userriderequest]);
    }

    public function otp_successfully(Request $request)
    {
        if ($request->otp == session('verification_code')) {
            try {

                $userriderequest = Userriderequest::find($request->userriderequest_id);

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

                $userriderequest->status = 'accepted';
                $userriderequest->save();

                Session::forget('verification_code');

                return view('driver-app.otp-successfully')->with('success', 'Ride booked successfully!');
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
}
