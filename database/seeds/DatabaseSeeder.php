<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();
        // $this->call(UsersTableSeeder::class);
        $this->call(CustomerSeeder::class);
    }
}

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
	            'room' => str_random(5),
	            'created_at' => now(),
	            'updated_at' => now()
	        ]);
	        DB::table('account')->insert([
	           	'username' => $username,
	           	'password' => hash('sha256', str_random(9)),
	           	'email' => $email,
	           	'role' => '1',
	           	'created_at' => now(),
	            'updated_at' => now()
	        ]);
    	}
    }
}