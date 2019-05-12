<?php

use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
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
            DB::table('notification')->insert([
                'caption' => $faker->sentence,
                'username' => $faker->username,
                'end' => now()->addDay(), 
                'level' => rand(1,3),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
