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
        foreach(range(1,10) as $i=> $value ){
            $bank = [
                'Sonali',
                'UCB',
                'PRIME BANK',
                'AGRANI',
                'RUPALI',
                'JONOTA',
                'BRACK',
                'ISLAMI BANK',
                'TRUST',
                'CITY BANK',
            ];
            Bank::create([
                'bank_name' => $bank[$i],
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
    public function random_bank(){
        $bank = [
            'bank_name' => 'sonali',
            'bank_name' => 'Jonota',
            'bank_name' => 'Rupali',
            'bank_name' => 'Agrani',
            'bank_name' => 'prime',
            'bank_name' => 'Islami',
            'bank_name' => 'brak',
            'bank_name' => 'City Bank',
            'bank_name' => 'DBBL',
            'bank_name' => 'Ucb',
            'bank_name' => 'Asa',
        ];
        return array_rand($bank,1);
    }
}
