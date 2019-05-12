<?php

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
        //
        $faker = Faker\Factory::create();
        $limits=10;
        //2 tk merchant
        $email =$faker->unique()->safeEmail;
        DB::table('customer')->insert([
	           	'id' => 'merchantA',
	           	'name' => $faker->name,
	            'gender' => rand(1,2)%2?'Nam':'Nữ', 
	            'email' => $faker->unique()->safeEmail,
	            'phone_number' => rand(1111111111,9999999999),
	            'room' => rand(1,400),
	            'created_at' => now(),
	            'updated_at' => now(),
	            'image' => 'upload/defaultCus.jpg'
	        ]);
        DB::table('account')->insert([
           	'username' => 'merchantA',
           	'password' => Hash::make('Abcd1234@'),
           	'email' => $faker->unique()->safeEmail,
           	'role' => '3',
           	'created_at' => now(),
            'updated_at' => now()
        ]);
        $email =$faker->unique()->safeEmail;
        DB::table('customer')->insert([
	           	'id' => 'merchantB',
	           	'name' => $faker->name,
	            'gender' => rand(1,2)%2?'Nam':'Nữ', 
	            'email' => $faker->unique()->safeEmail,
	            'phone_number' => rand(1111111111,9999999999),
	            'room' => rand(1,400),
	            'created_at' => now(),
	            'updated_at' => now(),
	            'image' => 'upload/defaultCus.jpg'
	        ]);
        DB::table('account')->insert([
           	'username' => 'merchantB',
           	'password' => Hash::make('Abcd1234@'),
           	'email' => $faker->unique()->safeEmail,
           	'role' => '1',
           	'created_at' => now(),
            'updated_at' => now()
        ]);
        //2 tài khoản customer
        $email =$faker->unique()->safeEmail;
        DB::table('customer')->insert([
	           	'id' => 'CustomerX',
	           	'name' => $faker->name,
	            'gender' => rand(1,2)%2?'Nam':'Nữ', 
	            'email' => $faker->unique()->safeEmail,
	            'phone_number' => rand(1111111111,9999999999),
	            'room' => rand(1,400),
	            'created_at' => now(),
	            'updated_at' => now(),
	            'image' => 'upload/defaultCus.jpg'
	        ]);
        DB::table('account')->insert([
           	'username' => 'CustomerX',
           	'password' => Hash::make('Abcd1234@'),
           	'email' => $faker->unique()->safeEmail,
           	'role' => '1',
           	'created_at' => now(),
            'updated_at' => now()
        ]);
        $email =$faker->unique()->safeEmail;
        DB::table('customer')->insert([
	           	'id' => 'CustomerY',
	           	'name' => $faker->name,
	            'gender' => rand(1,2)%2?'Nam':'Nữ', 
	            'email' => $faker->unique()->safeEmail,
	            'phone_number' => rand(1111111111,9999999999),
	            'room' => rand(1,400),
	            'created_at' => now(),
	            'updated_at' => now(),
	            'image' => 'upload/defaultCus.jpg'
	        ]);
        DB::table('account')->insert([
           	'username' => 'CustomerY',
           	'password' => Hash::make('Abcd1234@'),
           	'email' => $faker->unique()->safeEmail,
           	'role' => '3',
           	'created_at' => now(),
            'updated_at' => now()
        ]);
        $email =$faker->unique()->safeEmail;
        //admin
        DB::table('customer')->insert([
	           	'id' => 'admin',
	           	'name' => 'Phan Trí Nhân',
	            'gender' => 'Nam', 
	            'email' => 'nhan98453@gmail.com',
	            'phone_number' => '0358340234',
	            'room' => rand(1,400),
	            'created_at' => now(),
	            'updated_at' => now(),
	            'image' => 'upload/defaultCus.jpg'
	        ]);
        DB::table('account')->insert([
           	'username' => 'admin',
           	'password' => Hash::make('Admin123@'),
           	'email' => $faker->unique()->safeEmail,
           	'role' => '127',
           	'created_at' => now(),
            'updated_at' => now()
        ]);
        for($i=0;$i<$limits;$i++)
        {
        	$username = $faker->username;
        	$email = $faker->unique()->safeEmail;
	        DB::table('customer')->insert([
	           	'id' => $username,
	           	'name' => $faker->name,
	            'gender' => rand(1,2)%2?'Nam':'Nữ', 
	            'email' => $email,
	            'phone_number' => rand(1111111111,9999999999),
	            'room' => rand(1,400),
	            'created_at' => now(),
	            'updated_at' => now(),
	            'image' => 'upload/'.$faker->word()
	        ]);
	        DB::table('account')->insert([
	           	'username' => $username,
	           	'password' => Hash::make('123456789'),
	           	'email' => $email,
	           	'role' => '1',
	           	'created_at' => now(),
	            'updated_at' => now()
	        ]);
    	}
    }
}