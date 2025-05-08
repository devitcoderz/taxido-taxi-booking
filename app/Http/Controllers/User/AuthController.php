<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;

// Adjust to your user model location

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

        if ($request->otp == session('verification_code')) {
            try {
                $userData = json_decode($request->input('user_data'), true);
                // Create the user
                $user = User::create([
                    'name' => $userData['name'],
                    'phone' => $userData['phone'],
                    'email' => $userData['email'],
                    'password' => Hash::make($userData['password']),
                ]);

                Auth::guard('user')->login($user);

                return redirect()->to('user/home')->with('success', 'Registration successful!');
            }
            catch (\Exception $e) {
                Log::error('User Registration Error: ' . $e->getMessage());
                return back()->with('error', 'Something went wrong! Please try again.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid OTP');
        }
    }

    public function verify_otp(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated(); // Store validated data

        $user = User::where('phone', $validated["phone"])->first();

        if ($user) {
            return redirect()->back()->with('error', 'Already Registered. Please login yourself');
        }
        else {

                $verificationCode = rand(10000, 99999);
                $message = "Your verification code is: $verificationCode";

                $account_sid = env('TWILIO_SID_KEY');
                $auth_token = env('TWILIO_AUTH_TOKEN');
                $twilio_number =  env('TWILIO_NUMBER');

//                $client = new Client($account_sid, $auth_token);
//                $client->messages->create(
//                    '+'.$request->phone,
//                    array(
//                        'from' => $twilio_number,
//                        'body' => $message
//                    )
//                );
                session(['verification_code' => $verificationCode]);

                $expiresAt = Carbon::now()->addMinutes(5);
                Otp::create([
//                    'user_id' => $user->id, // or however you're identifying the user
                    'otp' => $verificationCode,
                    'expires_at' => $expiresAt,
                ]);

                return view('user-app.otp',['requestData'=>$request->all(),'phone'=>$validated["phone"]]);
        }
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
        if (Auth::guard('user')->attempt($credentials, true)) {
            $request->session()->regenerate();

            // Redirect to /profile after successful login
            return redirect('/user/home');
        }

        // If authentication fails, redirect back with errors
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function sendotp(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if ($user) {

            $verificationCode = rand(10000, 99999);
            $message = "Your verification code is: $verificationCode";

            $account_sid = env('TWILIO_SID_KEY');
            $auth_token = env('TWILIO_AUTH_TOKEN');
            $twilio_number =  env('TWILIO_NUMBER');

            $client = new Client($account_sid, $auth_token);
            $client->messages->create(
                '+'.$request->phone,
                array(
                    'from' => $twilio_number,
                    'body' => $message
                )
            );
            session(['verification_code' => $verificationCode]);

            $expiresAt = Carbon::now()->addMinutes(5);
            Otp::create([
//                'user_id' => $user->id, // or however you're identifying the user
                'otp' => $verificationCode,
                'expires_at' => $expiresAt,
            ]);

            return view('user-app.otp',['user_id'=>$user->id]);
        }
        else {
            return response()->json([
                'status' => 'error',
                'message' => 'Please register yourself'
            ]);
        }
    }

    public function logout(){
        Auth::guard('user')->logout();
        return redirect('/user/login');
    }

    public function update_profile(Request $request)
    {
        $user = User::where('id', Auth::guard('user')->id())->first();
        if ($request->hasFile('profile')) {
            $path = $request->file('profile')->store('documents/profile', 'public');
            $user->profile = $path;
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function user_bank_details(Request $request)
    {
        $user = User::where('id', Auth::guard('user')->user()->id)->firstOrFail();
        $user->bank_name = $request->bank_name;
        $user->holder_name = $request->holder_name;
        $user->account_number = $request->account_number;
        $user->branch_name = $request->branch_name;
        $user->ifsc_code = $request->ifsc_code;
        $user->swift_code = $request->swift_code;
        $user->save();
        return redirect()->back()->with('success', 'Bank Details updated successfully');
    }

    public function verification(Request $request)
    {
        $request->validate([
            'phone' => 'required',
        ]);

        $user = User::where('phone', $request->phone)->first();
        if ($user) {

            $verificationCode = rand(10000, 99999);

            $expiresAt = Carbon::now()->addMinutes(5);
            Otp::create([
                'user_id' => $user->id, // or however you're identifying the user
                'otp' => $verificationCode,
                'expires_at' => $expiresAt,
            ]);

            $message = "Your Reset Password verification code is: $verificationCode";
            $account_sid = env('TWILIO_SID_KEY');
            $auth_token = env('TWILIO_AUTH_TOKEN');
            $twilio_number =  env('TWILIO_NUMBER');

//            $client = new Client($account_sid, $auth_token);
//            $client->messages->create(
//                '+'.$request->phone,
//                array(
//                    'from' => $twilio_number,
//                    'body' => $message
//                )
//            );

//            Mail::raw('Your verification code is: ' . $verificationCode, function ($message) use ($request) {
//                $message->to($request->email)
//                    ->subject('Your Verification Code');
//            });
            return view('user-app.varification')->with(['success' => 'OTP sent to your phone', 'user_id' => $user->id]);

        }
        else{
            return redirect()->back()->with('error', 'Invalid Phone');
        }
    }

    public function reset_password(Request $request){
        $otp = Otp::where('user_id', $request->user_id)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', Carbon::now())
            ->latest()
            ->first();

        if ($otp) {
            $user = User::where('id', $request->user_id)->first();
            Auth::guard('user')->login($user, true);
            return view('user-app.reset-password')->with(['success' => 'Please enter your new password', 'user_id' => $user->id]);
        } else {
            return redirect()->back()->with('error', 'Invalid OTP');
        }
    }

    public function update_password(Request $request){
        $request->validate([
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $user = User::where('id', $request->user_id)->first();
        $user->password = $request->password;
        $user->save();
        return redirect()->route('user.login')->with('success', 'Password updated successfully');
    }

}
