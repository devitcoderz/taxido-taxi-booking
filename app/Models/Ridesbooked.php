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
        'driver_id',
        'expiry',
        'delivery_date',
        'distance',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function driver(){
        return $this->belongsTo(Driver::class,'driver_id','id');
    }
}
