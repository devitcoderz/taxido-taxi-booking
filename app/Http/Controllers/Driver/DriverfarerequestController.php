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
            ->where('expiry', '>', Carbon::now())
            ->orderBy('id', 'desc')
            ->get();
        return view('driver-app.home', compact('userriderequests'));
    }

    public function accept_ride($id){
        $userriderrequest = Userriderequest::findorfail($id);
        return view('driver-app.accept-ride',['userriderequest'=>$userriderrequest]);
    }
    public function request_fare(Request $request)
    {
        $driverfarerequest = new Driverfarerequest();
        $driverfarerequest->driver_id = Auth::guard('driver')->id();
        $driverfarerequest->userriderequest_id = $request->userriderequest_id;
        $driverfarerequest->requested_fare = $request->requested_fare;
        $driverfarerequest->expiry = Carbon::now()->addMinute(2);
        $driverfarerequest->save();
        return redirect()->back()->with(['success' => 'Driver Requested the Fare Successfully']);
    }
}
