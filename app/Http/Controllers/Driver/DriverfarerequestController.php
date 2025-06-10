<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driverfarerequest;
use App\Models\Ridesbooked;
use App\Models\Userriderequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DriverfarerequestController extends Controller
{
    public function home()
    {
        $userriderequests = Userriderequest::with('user','packagetype','packagesubtype')
//            ->where('expiry', '>', Carbon::now())
            ->where('status', 'waiting')
            ->orderBy('id', 'desc')
            ->get();
        return view('driver-app.home', compact('userriderequests'));
    }

    public function accept_ride($id){
        $userriderrequest = Userriderequest::findorfail($id);
        if ($userriderrequest->status == 'accepted') {
            return redirect()->route('driver.home')->with('success', 'Ride accepted by another driver');
        }
        return view('driver-app.accept-ride',['userriderequest'=>$userriderrequest]);
    }
    public function request_fare(Request $request)
    {
        $driverId = Auth::guard('driver')->id();

        $driverfarerequest = Driverfarerequest::where('driver_id', $driverId)
            ->where('expiry', '>', Carbon::now()->subMinutes(2))
            ->where('status', 'waiting')
            ->orderBy('id', 'desc')
            ->first();

        if (!$driverfarerequest) {
            $driverfarerequest = new Driverfarerequest();
            $driverfarerequest->driver_id = $driverId;
        }
        $driverfarerequest->userriderequest_id = $request->userriderequest_id;
        $driverfarerequest->requested_fare = $request->requested_fare;
        $driverfarerequest->driver_location_latitude = $request->driver_location_latitude;
        $driverfarerequest->driver_location_longitude = $request->driver_location_longitude;
        $driverfarerequest->expiry = Carbon::now()->addMinutes(2);
        $driverfarerequest->status = 'waiting'; // Optional: set explicitly if required
        $driverfarerequest->save();
        return redirect()->back()->with(['success' => 'Driver Requested the Fare Successfully']);
    }

    public function get_driver_ride_request_status($id)
    {
        $driver_fare_request = Driverfarerequest::where('userriderequest_id',$id)
            ->where('driver_id', Auth::guard('driver')->id())
            ->orderBy('id','desc')
            ->first();
        $ride_status = Ridesbooked::where('userriderequest_id',$id)
            ->first();
        return response()->json([
            'status' => $driver_fare_request ? $driver_fare_request->status : null,
            'ride_status' => $ride_status ? $ride_status : null,
            'message' => 'Ride has been booked.'
        ]);
    }
}
