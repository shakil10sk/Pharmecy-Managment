<?php

namespace App\Models\Human_recource;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'designation_id',
        'first_name',
        'last_name',
        'phone',
        'salary_type',
        'salary_value',
        'email',
        'blood',
        'address',
        'address2',
        'country',
        'image',
        'city',
        'zip',
        'status',
    ];
}
