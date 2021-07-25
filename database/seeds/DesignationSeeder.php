<?php

use App\Models\Human_recource\Designation;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1,10) as  $value) {
            Designation::create([
                'name' => $faker->name ,
                'details' => $faker->slug,
            ]);
            
        }
    }
}
