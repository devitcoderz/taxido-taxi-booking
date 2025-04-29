<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Driver extends Authenticatable
{
    protected $table = 'drivers';

    protected $fillable = [
        'name',
        'phone',
        'referral_code',
        'reffer_by',
        'email',
        'password',
        'birth_certificate',
        'registeration_certificate',
        'driving_license',
        'national_id',
        'pan_card',
        'vehicle_name',
        'registeration_date',
        'vehicle_type',
        'vehicle_color',
        'max_seats',
        'rules',
        'bank_name',
        'holder_name',
        'account_number',
        'branch_name',
        'ifsc_code',
        'profile',
        'google_id'
    ];
}
