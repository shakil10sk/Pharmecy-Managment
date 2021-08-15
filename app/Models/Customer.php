<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_mobile',
        'customer_email',
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
