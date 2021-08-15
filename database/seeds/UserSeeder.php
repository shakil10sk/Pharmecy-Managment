<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_data = [
            [
                'name' => 'admin', 
                'email' => 'admin@gmail.com',
                'role' =>   1,
                'password' => bcrypt('123456'),  
            ],
            [
                'name' => 'user', 
                'email' => 'user@gmail.com',
                'role'  =>  2,
                'password' => bcrypt('123456')
            ],
        ];
         foreach($user_data as $key => $vlaue ){
            User::create($vlaue);
         };
    }
}
