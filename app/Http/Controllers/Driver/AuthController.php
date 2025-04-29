<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;

class AuthController extends Controller
{
    // Display the login/register form
    public function showAuthForm()
    {
        // If the user is already authenticated, redirect to profile
        if (Auth::check()) {
            return redirect('/profile');
        }

        return view('auth'); // Ensure this view contains your HTML form
    }

    // Handle registration
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'email' => 'required|email|unique:drivers,email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated(); // Store validated data


        try {
            // Create the user
            $user = Driver::create([
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

//            Auth::guard('driver')->login($user);

            return redirect('driver/driver-document-verify')->with(['user' => $user]);
        } catch (\Exception $e) {
            Log::error('User Registration Error: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong! Please try again.');
        }

    }

    public function driver_document_verify(Request $request)
    {
//        dd($request->all());

        $driver = Driver::where('id', $request->user_id)->firstOrFail();

        if ($request->hasFile('birth_certificate')) {
            $path = $request->file('birth_certificate')->store('documents/birth_certificates', 'public');
            $driver->birth_certificate = $path;
        }

        if ($request->hasFile('registeration_certificate')) {
            $path = $request->file('registeration_certificate')->store('documents/registration_certificates', 'public');
            $driver->registeration_certificate = $path;
        }

        if ($request->hasFile('driving_license')) {
            $path = $request->file('driving_license')->store('documents/driving_licenses', 'public');
            $driver->driving_license = $path;
        }

        if ($request->hasFile('national_id')) {
            $path = $request->file('national_id')->store('documents/national_ids', 'public');
            $driver->national_id = $path;
        }

        if ($request->hasFile('pan_card')) {
            $path = $request->file('pan_card')->store('documents/pan_cards', 'public');
            $driver->pan_card = $path;
        }

        $driver->save();
        return redirect('driver/vehicle-registeration', ['user_id' => $request->user_id]);
    }

    public function vehicle_registeration(Request $request)
    {
        $driver = Driver::where('id', $request->user_id)->firstOrFail();
        $driver->vehicle_name = $request->vehicle_name;
        $driver->registeration_date = $request->registeration_date;
        $driver->vehicle_type = $request->vehicle_type;
        $driver->vehicle_color = $request->vehicle_color;
        $driver->max_seats = $request->max_seats;
        $driver->rules = json_encode($request->input('rule', []));
        $driver->save();
        return redirect('driver/driver-bank-details', ['user_id' => $request->user_id]);
    }

    public function driver_bank_details(Request $request)
    {
        $driver = Driver::where('id', $request->user_id)->firstOrFail();
        $driver->bank_name = $request->bank_name;
        $driver->holder_name = $request->holder_name;
        $driver->account_number = $request->account_number;
        $driver->branch_name = $request->branch_name;
        $driver->ifsc_code = $request->ifsc_code;
        $driver->save();
        return redirect('driver/login');
    }

    // Handle login
    public function login(Request $request)
    {
        // Validate credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login
        if (Auth::guard('driver')->attempt($credentials, true)) {
            $request->session()->regenerate();

            // Redirect to /profile after successful login
            return redirect('/driver/home');
        }

        // If authentication fails, redirect back with errors
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(){
        Auth::guard('driver')->logout();
        return redirect('/driver/login');
    }

    public function sendotp(Request $request)
    {
        $user = Driver::where('phone', $request->phone)->first();

        if ($user) {

            $verificationCode = rand(10000, 99999);
            $message = "Your verification code is: $verificationCode";

//            $account_sid = env('TWILIO_SID_KEY');
//            $auth_token = env('TWILIO_AUTH_TOKEN');
//            $twilio_number =  env('TWILIO_NUMBER');
//
//            $client = new Client($account_sid, $auth_token);
//            $client->messages->create(
//                '+'.$request->phone,
//                array(
//                    'from' => $twilio_number,
//                    'body' => $message
//                )
//            );
            session(['verification_code' => $verificationCode]);

            $expiresAt = Carbon::now()->addMinutes(5);
            Otp::create([
                'user_id' => $user->id, // or however you're identifying the user
                'otp' => $verificationCode,
                'expires_at' => $expiresAt,
            ]);

            return view('driver-app.otp',['user_id'=>$user->id]);
        }
        else {
            return response()->json([
                'status' => 'error',
                'message' => 'Please register yourself'
            ]);
        }
    }

    public function verify_otp(Request $request)
    {

        $otp = Otp::where('user_id', $request->user_id)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', Carbon::now())
            ->latest()
            ->first();

        if ($otp) {
            $user = Driver::where('id', $request->user_id)->first();
            Auth::guard('driver')->login($user, true);
            return redirect('/driver/home');
        } else {
            dd('invalid otp');
            return redirect()->back()->with('error', 'Invalid OTP');
        }
    }

    public function update_profile(Request $request)
    {
        $driver = Driver::where('id', Auth::guard('driver')->id())->first();
        if ($request->hasFile('profile')) {
            $path = $request->file('profile')->store('documents/profile', 'public');
            $driver->profile = $path;
        }
        $driver->name = $request->name;
        $driver->phone = $request->phone;
        $driver->email = $request->email;
        $driver->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

}
