<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group(['prefix' => 'driver'], function (){

    Route::get('/accept-ride', function (){
        return view('driver-app.accept-ride');
    });

    Route::get('/accept-ride-confirmed', function (){
        return view('driver-app.accept-ride-confirmed');
    });

    Route::get('/accept-ride-details', function (){
        return view('driver-app.accept-ride-details');
    });

    Route::get('/active-ride', function (){
        return view('driver-app.active-ride');
    });

    Route::get('/app-setting', function (){
        return view('driver-app.app-setting');
    });

    Route::get('/cancel-ride-details', function (){
        return view('driver-app.cancel-ride-details');
    });

    Route::get('/chatting', function (){
        return view('driver-app.chatting');
    });

    Route::get('/complete-ride-details', function (){
        return view('driver-app.complete-ride-details');
    });

    Route::get('/driver-bank-details', function (){
        return view('driver-app.driver-bank-details');
    });

    Route::get('/driver-bank-registeration-details', function (){
        return view('driver-app.driver-bank-registeration-details');
    });

    Route::get('/driver-document-verify', function (){
        return view('driver-app.driver-document-verify');
    });

    Route::get('/driver-registeration-document', function (){
        return view('driver-app.driver-registeration-document');
    });

    Route::get('/driver-vehicle-details', function (){
        return view('driver-app.driver-vehicle-details');
    });

    Route::get('/edit-offer', function (){
        return view('driver-app.edit-offer');
    });

    Route::get('/login', function (){
        return view('driver-app.login');
    });

    Route::get('/signup', function (){
        return view('driver-app.signup');
    });

    Route::get('/index', function (){
        return view('driver-app.index');
    });

    Route::get('/home', function (){
        return view('driver-app.home');
    });

    Route::get('/my-rides', function (){
        return view('driver-app.my-rides');
    });

    Route::get('/notification', function (){
        return view('driver-app.notification');
    });

    Route::get('/offer', function (){
        return view('driver-app.offer');
    });

    Route::get('/otp', function (){
        return view('driver-app.otp');
    });

    Route::get('/otp-successfully', function (){
        return view('driver-app.otp-successfully');
    });

    Route::get('/page-listing', function (){
        return view('driver-app.page-listing');
    });

    Route::get('/pending-ride-details', function (){
        return view('driver-app.pending-ride-details');
    });

    Route::get('/profile-setting', function (){
        return view('driver-app.profile-setting');
    });

    Route::get('/ride-details', function (){
        return view('driver-app.ride-details');
    });

    Route::get('/ride-on-way', function (){
        return view('driver-app.ride-on-way');
    });

    Route::get('/ride-verification', function (){
        return view('driver-app.ride-verification');
    });

    Route::get('/setting', function (){
        return view('driver-app.setting');
    });

    Route::get('/topup-wallet', function (){
        return view('driver-app.topup-wallet');
    });

    Route::get('/vehicle-registeration', function (){
        return view('driver-app.vehicle-registeration');
    });

    Route::get('/wallet', function (){
        return view('driver-app.wallet');
    });

    Route::get('/withdraw', function (){
        return view('driver-app.withdraw');
    });

});

Route::group(['prefix' => 'user'], function (){

    Route::get('/accept-ride-details', function (){
        return view('user-app.accept-ride-details');
    });

    Route::get('/add-new-location', function (){
        return view('user-app.add-new-location');
    });

    Route::get('/add-new-rider', function (){
        return view('user-app.add-new-rider');
    });

    Route::get('/app-setting', function (){
        return view('user-app.app-setting');
    });

    Route::get('/bank-details', function (){
        return view('user-app.bank-details');
    });

    Route::get('/cancel-ride-details', function (){
        return view('user-app.cancel-ride-details');
    });

    Route::get('/category', function (){
        return view('user-app.category');
    });

    Route::get('/chatting', function (){
        return view('user-app.chatting');
    });

    Route::get('/choose-rider', function (){
        return view('user-app.choose-rider');
    });

    Route::get('/complete-ride-details', function (){
        return view('user-app.complete-ride-details');
    });

    Route::get('/coupon', function (){
        return view('user-app.coupon');
    });

    Route::get('/date-time-schedule', function (){
        return view('user-app.date-time-schedule');
    });

    Route::get('/driver-details', function (){
        return view('user-app.driver-details');
    });

    Route::get('/driver-fare-request', function (){
        return view('user-app.driver-fare-request');
    });

    Route::get('/driver-review', function (){
        return view('user-app.driver-review');
    });

    Route::get('/empty-notification', function (){
        return view('user-app.empty-notification');
    });

    Route::get('/finding-driver', function (){
        return view('user-app.finding-driver');
    });

    Route::get('/forgot-password', function (){
        return view('user-app.forgot-password');
    });

    Route::get('/home', function (){
        return view('user-app.home');
    });

    Route::get('/index', function (){
        return view('user-app.index');
    });

    Route::get('/location', function (){
        return view('user-app.location');
    });

    Route::get('/login', function (){
        return view('user-app.login');
    })->middleware(\App\Http\Middleware\RedirectIfAuthenticated::class);

    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/login-with-number', function (){
        return view('user-app.login-with-number');
    });

    Route::get('/my-rides', function (){
        return view('user-app.my-rides');
    });

    Route::get('/notification', function (){
        return view('user-app.notification');
    });

    Route::get('/otp', function (){
        return view('user-app.otp');
    });

    Route::get('/outstation', function (){
        return view('user-app.outstation');
    });

    Route::get('/page-listing', function (){
        return view('user-app.page-listing');
    });

    Route::get('/payment-details', function (){
        return view('user-app.payment-details');
    });

    Route::get('/payment-method', function (){
        return view('user-app.payment-method');
    });

    Route::get('/pending-ride-details', function (){
        return view('user-app.pending-ride-details');
    });

    Route::get('/profile-setting', function (){
        return view('user-app.profile-setting');
    });

    Route::get('/rental', function (){
        return view('user-app.rental');
    });

    Route::get('/rental-selact-ride', function (){
        return view('user-app.rental-selact-ride');
    });

    Route::get('/rental-vehicle-details', function (){
        return view('user-app.rental-vehicle-details');
    });

    Route::get('/reset-password', function (){
        return view('user-app.reset-password');
    });

    Route::get('/saved-location', function (){
        return view('user-app.saved-location');
    });

    Route::get('/search-location', function (){
        return view('user-app.search-location');
    });

    Route::get('/selact-ride', function (){
        return view('user-app.selact-ride');
    });

    Route::get('/setting', function (){
        return view('user-app.setting');
    });

    Route::get('/signup', function (){
        return view('user-app.signup');
    })->middleware(\App\Http\Middleware\RedirectIfAuthenticated::class);

    Route::post('/signup', [AuthController::class, 'register'])->name('register');

    Route::get('/verification', function (){
        return view('user-app.varification');
    });

});