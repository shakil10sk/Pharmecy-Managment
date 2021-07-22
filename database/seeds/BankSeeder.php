<?php

use App\Models\Bank;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
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
            Bank::create([
                'bank_name' => $faker->name,
                'account_name' => $faker->lastName,
                'account_number' => $faker->unique()->bankAccountNumber,
                'branch_name' => $faker->name,
                'signature' => $faker->imageUrl,
                'status' => $this->random_status(),
            ]);
        } 
    }
    public function random_status(){
        $status = [
            'active' => 'active',
            'inactive' => 'inactive',
        ];
        return array_rand($status,1);
    }
}
