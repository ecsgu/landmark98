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
        $this->call(CustomerSeeder::class);
        $this->call(TopicSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(AdvertiseSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(RevenueSeeder::class);
    }
}
