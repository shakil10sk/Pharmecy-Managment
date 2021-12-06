<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => '1',
            'phone' => '01636639790',
            'nid_number' => '46554569870',
            'city' => 'Dhaka',
            'position' => 'CEO',
            'address' => 'Dhaka',
            'photo' => '',
            'password' => Hash::make('12345678'),
        ]);
    }
}
