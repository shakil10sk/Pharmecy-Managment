<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customar extends Model
{
    protected $fillable=[
        'customar_name',
        'email',
        'phone',
        'custoamr_city',
        'photo',
        'address',
        'ac_num',
        'bank_name',
        'bank_branch',
    ];
}
