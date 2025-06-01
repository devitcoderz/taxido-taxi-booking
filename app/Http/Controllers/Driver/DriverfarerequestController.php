<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driverfarerequest;
use App\Models\Userriderequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DriverfarerequestController extends Controller
{
    public function home()
    {
        $userriderequests = Userriderequest::with('user')
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
        $driverfarerequest->expiry = Carbon::now()->addMinutes(2);
        $driverfarerequest->status = 'waiting'; // Optional: set explicitly if required
        $driverfarerequest->save();
        return redirect()->back()->with(['success' => 'Driver Requested the Fare Successfully']);
    }

    public function get_driver_ride_request_status($id)
    {
        $driver_fare_request = Driverfarerequest::where('userriderequest_id',$id)->first();
        if ($driver_fare_request && $driver_fare_request->status === 'accepted') {
            return response()->json(['status' => $driver_fare_request->status,'message' => 'Ride has been booked.']);
        }
    }
}
