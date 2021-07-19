<?php

namespace App\Models\Medicine;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'medicine_name',
        'barcode_id',
        'strength',
        'generic_name',
        'box_size',
        'unit_id',
        'category_id',
        'type_id',
        'manufacturer_id',
        'product_location',
        'product_details',
        'price',
        'image',
        'manufacturer_price',
        'tax0',
        'tax1',
        'status',
    ];
    public function category(){
        return $this->belongsTo(MedicineCategory::class, 'category_id');
    }
    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class , 'manufacturer_id');
    }
}
