<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ridesbooked extends Model
{
    protected $table = 'ridesbookeds';
    protected $fillable = [
        'pickup_location',
        'destination_location',
        'fare',
        'payment_method',
        'user_id',
        'receiver_name',
        'receiver_phone',
        'receiver_email',
        'driver_id',
        'expiry',
        'departure_date',
        'arrival_date',
        'distance',
        'transport_time',
        'travel_company',
        'type_of_package',
        'length_of_package',
        'width_of_package',
        'volume_of_package',
        'weight_of_package',
        'quantity_of_package',
        'comments',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function driver(){
        return $this->belongsTo(Driver::class,'driver_id','id');
    }
}
