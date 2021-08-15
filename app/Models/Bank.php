<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'bank_name',
        'account_name',
        'account_number',
        'branch_name',
        'signature',
        'status'
    ];
}
