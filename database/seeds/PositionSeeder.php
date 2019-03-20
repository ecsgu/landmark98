<?php

use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $position = ['left-top','left-bottom','right-top','right-bottom'];

        foreach ($position as $position) {
        	DB::table('position')->insert([
                'name' => $position,
                'width' => rand(1,1000),
                'height' => rand(1,1000), 
                'price' => rand(1,1000),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        
    }
}
