<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable=[
        'firstname',
        'lastname',
        'username',
        'password',
        'confirm_password',
        'email',
        'phone',
        'address',
        'experience',
        'photo',
        'salary',
        'nid_number',
        'vacation',
        'city',
        'position'
    ];
}