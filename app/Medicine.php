<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    protected $fillable=['medicine_name','genric_name','category','manufecture','self_number','strength','medicine_price','menufecturer_price','Images',];
}
