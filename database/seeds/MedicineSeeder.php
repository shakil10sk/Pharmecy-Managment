<?php

use App\Models\Medicine\Medicine;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
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
            Medicine::create([
                'medicine_name' => $faker->unique()->lastName ,
                'barcode_id' => $faker->randomNumber(4) ,
                'strength' => $faker->firstName ,
                'generic_name' => $faker->name ,
                'box_size' => rand(1,10) ,
                'unit_id' => rand(1,10) ,
                'category_id' => rand(1,10) ,
                'type_id' => rand(1,10) ,
                'manufacturer_id' => rand(1,10) ,
                'product_location' => $faker->city ,
                'product_details' => $faker->slug ,
                'price' => $faker->randomNumber(4) ,
                'image' => $faker->imageUrl ,
                'manufacturer_price' => $faker->randomNumber(4) ,
                'tax0' => "1.00",
                'tax1' => "1.00",
                // 'status' => $faker->boolean,
                'status' => "1",
            ]);
            
        }
    }
}
