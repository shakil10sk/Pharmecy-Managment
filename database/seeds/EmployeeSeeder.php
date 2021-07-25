<?php

use App\Models\Human_recource\Employee;
use Faker\Factory;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
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
            Employee::create([
                'designation_id' => rand(1,10),
                'first_name' => $faker->unique()->firstName ,
                'last_name' => $faker->unique()->lastName ,
                'phone' => "017". $faker->randomNumber(8) ,
                'salary_type' => $this->random_salary() ,
                'salary_value' => $faker->randomNumber(3),
                'email' => $faker->email,
                'blood' => $faker->bloodGroup(),
                'address' => $faker->address ,
                'address2' => $faker->address ,
                'country' => $faker->country,
                'image' => $faker->imageUrl ,
                'city' => $faker->city,
                'zip' => $faker->postcode,
                'status' => $this->random_status(),
            ]);
            
        }
    }
    public function random_salary(){
        $salary = [
            'hourly' => 'hourly',
            'salary' => 'salary',
        ];
        return array_rand($salary,1);
    }
    public function random_status(){
        $status = [
            'active' => 'active',
            'inactive' => 'inactive',
        ];
        return array_rand($status,1);
    }
   
}
