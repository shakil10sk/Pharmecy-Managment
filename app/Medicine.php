<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    protected $fillable=['medicine_name','genric_name','category_id','manufecture','self_number','qty','strength','sell_price','buy_price','Images','Product_code','buy_date','expire_date',];
}
