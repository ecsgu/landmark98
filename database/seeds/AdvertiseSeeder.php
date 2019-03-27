<?php

use Illuminate\Database\Seeder;

class AdvertiseSeeder extends Seeder
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
        $account = DB::table('account')->get();
        for($i=0;$i<$limits;$i++)
        {
            DB::table('advertise')->insert([
                'linkad' => 'http://'.$faker->domainName,
                'image' => 'image/'.$faker->word,
                'username' => $account->random()->username,
                'start' => now(),
                'end' => now(), 
                'position' => $faker->word,
                'money' => rand(1,100000),
                'click' => rand(1,99999999),
                'status' => rand(1,3),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
