<?php

use App\Models\Medicine\MedicineUnit;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class MedicineUniteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
       foreach (range(1,10) as  $value) {
            MedicineUnit::create([
                'unit' => $faker->name ,
                'status' => "1",
            ]);
            
        }
    }
}
