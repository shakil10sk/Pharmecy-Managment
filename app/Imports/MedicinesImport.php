<?php

namespace App\Imports;

use App\Medicine;
use Maatwebsite\Excel\Concerns\ToModel;

class MedicinesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Medicine([
            'medicine_name'=>$row[0],
            'genric_name'=>$row[1],
            'category_id'=>$row[2],
            'manufecture'=>$row[3],
            'self_number'=>$row[4],
            'qty'=>$row[5],
            'strength'=>$row[6],
            'sell_price'=>$row[7],
            'manufecture_price'=>$row[8],
            'Images'=>$row[9],
            'Product_code'=>$row[10],
            'buy_date'=>$row[11],
            'manufecturer_date'=>$row[12],
            'expire_date'=>$row[13]
        ]);
    }
}
