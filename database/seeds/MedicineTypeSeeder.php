<?php

use App\Models\Medicine\MedicineType;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MedicineTypeSeeder extends Seeder
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
            MedicineType::create([
                'type' => $faker->name ,
                'status' => "1",
            ]);
        }
    }
}
