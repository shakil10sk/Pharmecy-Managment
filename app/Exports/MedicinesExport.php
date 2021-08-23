<?php

namespace App\Exports;

use App\Medicine;
use Maatwebsite\Excel\Concerns\FromCollection;

class MedicinesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Medicine::select('medicine_name','genric_name','category_id','manufecture','self_number','qty','strength','sell_price','manufecture_price','Images','Product_code','buy_date','manufecturer_date','expire_date')->get();

    }

}
