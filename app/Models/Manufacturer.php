<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = [
        'manufacturer_name',
        'manufacturer_mobile',
        'manufacturer_email',
        'email_address',
        'phone',
        'contact',
        'address',
        'address2',
        'fax',
        'city',
        'state',
        'zip',
        'country',
        'previous_balance',
    ];
}
