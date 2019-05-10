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
        $position = ['Bên trái trên trang chủ','Bên phải trên trang chủ','Bên trái dưới trang chủ','Bên phải dưới trang chủ','Random trên trang chủ','Bên trái trang bài viết','Bên phải trang bài viết','Bên trái trên trang cá nhân','Bên phải trên trang cá nhân','Bên trái dưới trang cá nhân','Bên phải dưới trang cá nhân'];

        foreach ($position as $key=>$position) {
            $price;
            switch($key){
                case 0:case 1:case 2:case 3:$price=500;break;
                case 4:case 7:case 8:case 9:case 10:$price=200;break;
                case 5:case 6:$price=300;break;
                default: $price = rand(1,1000); 
            }
        	DB::table('position')->insert([
                'name' => $position,
                'width' => 400,
                'height' => 500, 
                'price' => $price,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        
    }
}
