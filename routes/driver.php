<?php


use App\Http\Controllers\Driver\GoogleController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'driver', 'as' => 'driver.'], function (){

    Route::middleware([\App\Http\Middleware\LoggedinDriver::class ])->group(function () {

        Route::get('/home', [\App\Http\Controllers\Driver\DriverfarerequestController::class, 'home'])->name('home');
        Route::get('/accept-ride/{id}', [\App\Http\Controllers\Driver\DriverfarerequestController::class, 'accept_ride'])->name('accept_ride');
        Route::post('/request-fare', [\App\Http\Controllers\Driver\DriverfarerequestController::class, 'request_fare'])->name('request_fare');
        Route::get('/accept-ride-confirmed/{userriderequest_id}', [\App\Http\Controllers\Driver\RidesbookedController::class, 'accept_ride_confirmed'])->name('accept_ride_confirmed');
        Route::get('/chatting', function (){
            return view('driver-app.chatting');
        });

        Route::post('/chat',[\App\Http\Controllers\User\RidesbookedController::class, 'chat'])->name('chat');

        Route::get('/driver-bank-details', function (){
            return view('driver-app.driver-bank-details');
        });
        Route::post('driver-bank-details', [\App\Http\Controllers\Driver\AuthController::class, 'driver_bank_details'])->name('driver_bank_details');

        Route::get('/driver-document-verify', function (){
            return view('driver-app.driver-document-verify');
        });
        Route::post('/driver-document-verify', [\App\Http\Controllers\Driver\AuthController::class, 'driver_document_verify'])->name('driver-document-verify');

        Route::get('/logout', [\App\Http\Controllers\Driver\AuthController::class, 'logout'])->name('logout');

        Route::get('/profile-setting', function (){
            return view('driver-app.profile-setting');
        });

        Route::post('/update_profile',[\App\Http\Controllers\Driver\AuthController::class,'update_profile'])->name('update_profile');

        Route::post('vehicle-registeration', [\App\Http\Controllers\Driver\AuthController::class,'vehicle_registeration'])->name('vehicle-registration');
        Route::get('/vehicle-registeration', function (){
            return view('driver-app.vehicle-registration');
        });

    });

    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

    Route::get('/accept-ride-details', function (){
        return view('driver-app.accept-ride-details');
    });

    Route::get('active-ride',[\App\Http\Controllers\Driver\RideController::class,'active_rides'])->name('active_rides');

    Route::get('/app-setting', function (){
        return view('driver-app.app-setting');
    });

    Route::get('/cancel-ride-details', function (){
        return view('driver-app.cancel-ride-details');
    });

    Route::get('/complete-ride-details', function (){
        return view('driver-app.complete-ride-details');
    });

    Route::get('/driver-bank-registeration-details', function (){
        return view('driver-app.driver-bank-registration-details');
    });

    Route::get('/driver-registeration-document', function (){
        return view('driver-app.driver-registration-document');
    });

    Route::get('/driver-vehicle-details', function (){
        return view('driver-app.driver-vehicle-details');
    });

    Route::get('/edit-offer', function (){
        return view('driver-app.edit-offer');
    });

    Route::get('/login', function (){
        return view('driver-app.login');
    })->middleware(\App\Http\Middleware\RedirectIfAuthenticatedDriver::class);
    Route::post('/login', [\App\Http\Controllers\Driver\AuthController::class, 'login_with_number'])->name('login_with_number');

    Route::get('/signup', function (){
        return view('driver-app.signup');
    })->middleware(\App\Http\Middleware\RedirectIfAuthenticatedDriver::class);
    Route::post('/signup', [\App\Http\Controllers\Driver\AuthController::class, 'register'])->name('register');

    Route::get('/index', function (){
        return view('driver-app.index');
    });

    Route::get('my-rides',[\App\Http\Controllers\Driver\RideController::class,'my_rides'])->name('my_rides');

    Route::get('/notification', function (){
        return view('driver-app.notification');
    });

    Route::get('/offer', function (){
        return view('driver-app.offer');
    });

    Route::post('/otp', [\App\Http\Controllers\Driver\AuthController::class,'sendotp'])->name('otplogin');
    Route::post('/verify-otp', [\App\Http\Controllers\Driver\AuthController::class,'verify_otp'])->name('verify_otp');

    Route::get('/otp-successfully', function (){
        return view('driver-app.otp-successfully');
    });

    Route::get('/page-listing', function (){
        return view('driver-app.page-listing');
    });

    Route::get('/pending-ride-details', function (){
        return view('driver-app.pending-ride-details');
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

    Route::get('/wallet', function (){
        return view('driver-app.wallet');
    });

    Route::get('/withdraw', function (){
        return view('driver-app.withdraw');
    });

});
