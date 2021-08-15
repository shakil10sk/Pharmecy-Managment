<?php

use App\Models\Customer;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach(range(1,10) as $value ){
            Customer::create([
                'customer_name' => $faker->name,
                'customer_mobile' => $faker->unique()->e164PhoneNumber,
                'customer_email' => $faker->unique()->email,
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
