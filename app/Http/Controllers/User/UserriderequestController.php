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
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'pickup_location'      => 'required|string|max:255',
            'destination_location' => 'required|array|min:1',
            'destination_location.*' => 'required|string|max:255', // validate each item
            'length_of_package'    => 'required|min:1',
            'width_of_package'     => 'required|min:1',
            'type_of_package'     => 'required',
            'sub_type_of_package'     => 'required',
//            'volume_of_package'    => 'required|numeric|min:1',
            'quantity_of_package'  => 'required|min:1',
            'fare'                 => 'required|min:1',
//            'travel_company'       => 'required|string|max:255',
            'comments'             => 'required|string|max:1000',
            'parcel_pictures.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'payment_method'       => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userriderequest = new Userriderequest();
        $userriderequest->user_id             = Auth::guard('user')->id();
        $userriderequest->receiver_name     = $request->receiver_name;
        $userriderequest->receiver_email     = $request->receiver_email;
        $userriderequest->receiver_phone     = $request->receiver_phone;
        $userriderequest->pickup_location     = $request->pickup_location;
        $userriderequest->destination_location = json_encode($request->destination_location); // store as JSON
        $userriderequest->pickup_location_latitude      = $request->pickup_location_latitude; // assuming current time as departure
        $userriderequest->pickup_location_longitude      = $request->pickup_location_longitude; // assuming current time as departure
        $userriderequest->departure_date      = $request->departure_date; // assuming current time as departure
        $userriderequest->distance            = $request->distance ?? 0;
        $userriderequest->type_of_package   = $request->type_of_package;
        $userriderequest->sub_type_of_package   = $request->sub_type_of_package;
        $userriderequest->length_of_package   = $request->length_of_package;
        $userriderequest->width_of_package    = $request->width_of_package;
        $userriderequest->weight_of_package    = $request->weight_of_package;
//        $userriderequest->volume_of_package   = $request->volume_of_package;
        $userriderequest->quantity_of_package = $request->quantity_of_package;
        $userriderequest->fare                = $request->fare;
        $userriderequest->fare_currency               = $request->fare_currency;
//        $userriderequest->travel_company      = $request->travel_company;
        $userriderequest->comments            = $request->comments;
        $userriderequest->message            = 'we are looking for a carrier, please wait';

        if ($request->hasFile('parcel_pictures')) {
            $imagePaths = [];
            $imagePaths = [];
            $files = $request->file('parcel_pictures');

            if (!is_array($files)) {
                $files = [$files];
            }
            foreach ($files as $image) {
                try {
                    $path = $image->store('documents/parcel_pictures', 'public');
                    $imagePaths[] = $path;
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
            }

            $userriderequest->parcel_pictures = json_encode($imagePaths);
        }

//        dd($userriderequest);

        $userriderequest->payment_method      = $request->payment_method;
        $userriderequest->expiry              = Carbon::now()->addMinutes(10);
        $userriderequest->save();
        return view('user-app.driver-fare-request', ['userriderequest_id' => $userriderequest->id]);
    }

    public function get_driver_fare_request(Request $request)
    {

        $userriderequest = Userriderequest::where('id',$request->input('userriderequest_id'))->first();

        $ridebooked = Ridesbooked::where('user_id',Auth::guard('user')->id())
            ->where('userriderequest_id',$userriderequest->id)
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
            ->where('status','!=','rejected')
            ->orderBy('id', 'desc')
            ->get();
        $userLat = $userriderequest->pickup_location_latitude;
        $userLng = $userriderequest->pickup_location_longitude;

// Add user lat/lng to each item
        $driverFareRequests->transform(function ($item) use ($userLat, $userLng) {
            $item->user_lat = $userLat;
            $item->user_lng = $userLng;
            return $item;
        });
        return response()->json($driverFareRequests);
    }
}
