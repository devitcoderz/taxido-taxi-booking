<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Driverfarerequest;
use App\Models\Ridesbooked;
use App\Models\Userriderequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserriderequestController extends Controller
{
    public function selact_ride(Request $request){
        return view('user-app.selact-ride', ['request' => $request]);
    }

    public function driver_fare_request(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'pickup_location'      => 'required|string|max:255',
            'destination_location' => 'required|string|max:255',
            'transport_time_value' => 'required|numeric|min:1',
            'transport_time_unit'  => 'required|in:days,weeks,months',
            'distance'             => 'required|numeric|min:1',
            'length_of_package'    => 'required|numeric|min:1',
            'width_of_package'     => 'required|numeric|min:1',
            'volume_of_package'    => 'required|numeric|min:1',
            'quantity_of_package'  => 'required|integer|min:1',
            'fare'                 => 'required|numeric|min:1',
            'travel_company'       => 'required|string|max:255',
            'comments'             => 'required|string|max:1000',
            'payment_method'       => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userriderequest = new Userriderequest();
        $userriderequest->user_id             = Auth::guard('user')->id();
        $userriderequest->pickup_location     = $request->pickup_location;
        $userriderequest->destination_location = $request->destination_location;
        $userriderequest->departure_date      = $request->departure_date; // assuming current time as departure
        $userriderequest->arrival_date        = $request->arrival_date;
        $userriderequest->transport_time_value = $request->transport_time_value;
        $userriderequest->transport_time_unit = $request->transport_time_unit;
        $userriderequest->distance            = $request->distance ?? 0;
        $userriderequest->type_of_package   = $request->type_of_package;
        $userriderequest->length_of_package   = $request->length_of_package;
        $userriderequest->width_of_package    = $request->width_of_package;
        $userriderequest->weight_of_package    = $request->weight_of_package;
        $userriderequest->volume_of_package   = $request->volume_of_package;
        $userriderequest->quantity_of_package = $request->quantity_of_package;
        $userriderequest->fare                = $request->fare;
        $userriderequest->travel_company      = $request->travel_company;
        $userriderequest->comments            = $request->comments;
        $userriderequest->payment_method      = $request->payment_method;
        $userriderequest->expiry              = Carbon::now()->addMinutes(2);
        $userriderequest->save();
        return view('user-app.driver-fare-request', ['userriderequest_id' => $userriderequest->id]);
    }

    public function get_driver_fare_request(Request $request)
    {

        $userriderequest = Userriderequest::where('id',$request->input('userriderequest_id'))->first();

        $ridebooked = Ridesbooked::where('user_id',Auth::guard('user')->id())
            ->where('pickup_location',$userriderequest->pickup_location)
            ->where('destination_location',$userriderequest->destination_location)
            ->where('fare',$userriderequest->fare)
            ->where('payment_method',$userriderequest->payment_method)
            ->where('departure_date',$userriderequest->departure_date)
            ->get();

        if ($ridebooked->isNotEmpty()) {
            return response()->json(['ridebooked' => true]);
        }

        Log::info($request->input('userriderequest_id'));
        $driverFareRequests = Driverfarerequest::with('driver', 'userriderequest') // if you have these relationships
        ->where('userriderequest_id', $request->input('userriderequest_id'))
//            ->where('expiry', '>', Carbon::now())
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($driverFareRequests);
    }
}
