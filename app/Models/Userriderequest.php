<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userriderequest extends Model
{
    protected $table = 'userriderequests';
    protected $fillable = ['pickup_location',
        'destination_location',
        'fare',
        'payment_method',
        'user_id',
        'expiry',
        'delivery_date',
        'distance',

    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
