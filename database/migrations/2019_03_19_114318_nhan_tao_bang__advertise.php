<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NhanTaoBangAdvertise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('advertise',function(Blueprint $table){
            $table->increments('id');
            $table->string('linkad');
            $table->string('image');
            $table->string('username',50);
            $table->date('start');
            $table->date('end');
            $table->string('position');
            $table->Integer('money');
            $table->Integer('click');
            $table->Integer('status');
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
        Schema::dropIfExists('advertise');
    }
}
