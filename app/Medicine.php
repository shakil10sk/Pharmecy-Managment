<?php

namespace App;

use App\Models\Medicine\Medicine as MedicineMedicine;
use App\Models\Medicine\MedicineCategory;
use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    protected $fillable=['medicine_name','genric_name','category_id','manufecture','self_number','qty','strength','sell_price','buy_price','Images','Product_code','buy_date','expire_date',];

    public function category(){
        return $this->belongsTo(MedicineMedicine::class, 'category_id');
    }

}
