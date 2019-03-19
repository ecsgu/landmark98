<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NhanTaoBangRevenue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('revenue',function(Blueprint $table){
            $table->Integer('month');
            $table->Integer('year');
            $table->Integer('left-top');
            $table->Integer('left-bottom');
            $table->Integer('right-top');
            $table->Integer('right-bottom');
            $table->Integer('money');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('revenue');
    }
}
