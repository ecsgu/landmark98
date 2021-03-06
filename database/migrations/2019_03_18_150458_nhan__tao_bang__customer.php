<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NhanTaoBangCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Customer',function(Blueprint $table){
            $table->string('id',50)->primary();
            $table->string('name');
            $table->string('gender');
            $table->string('email');
            $table->string('phone_number');
            $table->string('room');
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
        Schema::drop('Customer');
    }
}
