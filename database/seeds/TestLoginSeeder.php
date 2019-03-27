<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class TestLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $username ="admin";
        $password ="admin";
        $name = "Phan Trí Nhân";
        $email = "nhan98453@gmail.com";
        $phone_number = "0358340234";
        $gender = "Nam";
        DB::table('customer')->insert([
	           	'id' => $username,
	           	'name' => $name,
	            'gender' => $gender, 
	            'email' => $email,
	            'phone_number' => $phone_number,
	            'room' => str_random(5),
	            'created_at' => now(),
	            'updated_at' => now(),
	            'image' => 'upload/'."admin.jpg",
	        ]);
	        DB::table('account')->insert([
	           	'username' => $username,
	           	'password' => bcrypt($password),
	           	'email' => $email,
	           	'role' => '106',
	           	'created_at' => now(),
	            'updated_at' => now()
	        ]);
    }
}
