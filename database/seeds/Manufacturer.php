<?php

namespace Database\Seeders;

use App\Models\Manufacturer as ModelsManufacturer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class Manufacturer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $value ){
            ModelsManufacturer::create([
                'manufacturer_name' => $faker->name,
                'manufacturer_mobile' => $faker->unique()->e164PhoneNumber,
                'manufacturer_email' => $faker->unique()->email,
                'email_address' => $faker->unique()->email,
                'phone' => $faker->unique()->tollFreePhoneNumber,
                'contact' => $faker->phoneNumber,
                'address' => $faker->address,
                'address2' => $faker->address,
                'fax' => $faker->tld,
                'city' => $faker->city,
                'state' => $faker->state,
                'zip' => $faker->postcode,
                'country' => $faker->country,
                'previous_balance' => '000',
            ]);
        } 
        
    }
}
