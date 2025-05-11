<?php


use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\GoogleController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'as' => 'user.'], function (){

    Route::middleware([\App\Http\Middleware\LoggedinUser::class ])->group(function () {

        Route::get('/home', function (){
            return view('user-app.home');
        });

        Route::get('/get-user-ride-request', [\App\Http\Controllers\User\RideController::class, 'get_user_ride_request'])->name('get_user_ride_request');

        Route::get('/accept-ride-details', [\App\Http\Controllers\User\RidesbookedController::class, 'accept_ride_details'])->name('accept_ride_details');

        Route::get('/bank-details', function (){
            return view('user-app.bank-details');
        });

        Route::post('user-bank-details', [\App\Http\Controllers\User\AuthController::class, 'user_bank_details'])->name('user_bank_details');

        Route::get('/category', function (){
            return view('user-app.category');
        });

        Route::get('/chatting', function (){
            return view('user-app.chatting');
        });

        Route::post('/driver-fare-request', [\App\Http\Controllers\User\UserriderequestController::class, 'driver_fare_request'])->name('driver_fare_request');
        Route::get('/get-driver-fare-request', [\App\Http\Controllers\User\UserriderequestController::class, 'get_driver_fare_request'])->name('get_driver_fare_request');

        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/profile-setting', function (){
            return view('user-app.profile-setting');
        });

        Route::post('/update_profile',[\App\Http\Controllers\User\AuthController::class,'update_profile'])->name('update_profile');

        Route::get('/selact-ride', [\App\Http\Controllers\User\UserriderequestController::class, 'selact_ride'])->name('selact_ride');

        Route::get('/setting', function (){
            return view('user-app.setting');
        });

        Route::get('/app-setting', function (){
            return view('user-app.app-setting');
        });

    });

    Route::get('/login', function (){
        return view('user-app.login');
    })->middleware(\App\Http\Middleware\RedirectIfAuthenticatedUser::class);

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/otp', [\App\Http\Controllers\User\AuthController::class,'sendotp'])->name('otplogin');
    Route::post('/verify-otp', [\App\Http\Controllers\User\AuthController::class,'verify_otp'])->name('verify_otp');

    Route::get('/login-with-number', function (){
        return view('user-app.login-with-number');
    });

    Route::get('/signup', function (){
        return view('user-app.signup');
    })->middleware(\App\Http\Middleware\RedirectIfAuthenticatedUser::class);

    Route::post('/verify-otp', [AuthController::class, 'verify_otp'])->name('verify_otp');
    Route::post('/signup', [AuthController::class, 'register'])->name('register');

    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

    Route::post('/reset-password', [AuthController::class, 'reset_password'])->name('reset_password');
    Route::post('/update-password', [AuthController::class, 'update_password'])->name('update_password');

    Route::get('/verification',[ \App\Http\Controllers\User\AuthController::class, 'verification'])->name('verification');

    Route::get('/add-new-location', function (){
        return view('user-app.add-new-location');
    });

    Route::get('/add-new-rider', function (){
        return view('user-app.add-new-rider');
    });

    Route::get('/choose-rider', function (){
        return view('user-app.choose-rider');
    });

    Route::get('ride-details',[\App\Http\Controllers\User\RideController::class,'ride_details'])->name('ride_details');

    Route::get('/coupon', function (){
        return view('user-app.coupon');
    });

    Route::get('/date-time-schedule', function (){
        return view('user-app.date-time-schedule');
    });

    Route::get('/driver-details', function (){
        return view('user-app.driver-details');
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

    Route::get('/index', function (){
        return view('user-app.index');
    });

    Route::get('/location', function (){
        return view('user-app.location');
    });

    Route::get('my-rides',[\App\Http\Controllers\User\RideController::class, 'my_rides'])->name('my_rides');

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

    Route::get('/rental', function (){
        return view('user-app.rental');
    });

    Route::get('/rental-selact-ride', function (){
        return view('user-app.rental-selact-ride');
    });

    Route::get('/rental-vehicle-details', function (){
        return view('user-app.rental-vehicle-details');
    });

    Route::get('/saved-location', function (){
        return view('user-app.saved-location');
    });

    Route::get('/search-location', function (){
        return view('user-app.search-location');
    });

    Route::get('/google_place_api', function (){
        return view('user-app.google_place_api');
    });

});
