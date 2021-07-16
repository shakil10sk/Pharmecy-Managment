<?php

use App\Models\Medicine\MedicineCategory;
use App\Models\Medicine\MedicineType;
use App\Models\Medicine\MedicineUnit;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MedicineCategorySeeder extends Seeder
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
            MedicineCategory::create([
                'name' => $faker->name ,
                'status' => $faker->boolean,
            ]);
            
        }
    }
}
