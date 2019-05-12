<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
        $account = DB::table('account')->get();

        for($i=1;$i<12;$i++)
        {
            DB::table('advertise')->insert([
                'linkad' => 'advertise',
                'image' => ($i==5)?'upload/3.png':'upload/1.png',
                'username' => 'admin',
                'start' => Carbon::minValue(),
                'end' => Carbon::maxValue(), 
                'position' => $i,
                'money' => 0,
                'click' => 0,
                'status' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
