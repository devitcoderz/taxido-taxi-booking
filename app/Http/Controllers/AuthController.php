<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Adjust to your user model location
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated(); // Store validated data


        try {
            // Create the user
            $user = User::create([
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'referral_code' => rand(100000, 999999), // Generate a better referral code
                'reffer_by' => 1, // Consider dynamic referral logic
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            Auth::login($user);

            return redirect()->to('user/home')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            Log::error('User Registration Error: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong! Please try again.');
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
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect to /profile after successful login
            return redirect('/user/home');
        }

        // If authentication fails, redirect back with errors
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/user/login');
    }
}
