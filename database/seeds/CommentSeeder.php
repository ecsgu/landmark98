<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $topic = DB::table('topic')->get();
        $account = DB::table('account')->get();
        $faker = Faker\Factory::create();
        $limits=10;

        for($i=0;$i<$limits;$i++)
        {
            DB::table('comment')->insert([
                'idtopic' => $topic->random()->id, 
                'caption' => $faker->sentence,
                'username' => $account->random()->username,
                'status' => rand(1,3),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
