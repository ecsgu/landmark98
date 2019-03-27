<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $account = DB::table('account')->get();
        $faker = Faker\Factory::create();
        $limits=10;

        for($i=0;$i<$limits;$i++)
        {
            DB::table('topic')->insert([
                'caption' => $faker->sentence,
                'image' => 'image/'.$faker->word,
                'username' => $account->random()->username, 
                'status' => rand(1,3),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
