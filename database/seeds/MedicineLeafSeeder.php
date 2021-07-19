<?php

use App\Models\Medicine\MedicineLeaf;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MedicineLeafSeeder extends Seeder
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
            MedicineLeaf::create([
                'leaf_type' => $faker->lastName ,
                'total_number' => $faker->randomNumber(2),
            ]);
            
        }
    }
}
