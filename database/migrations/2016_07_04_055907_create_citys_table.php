<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citys', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('state_id');
            $table->integer('district_id');
            $table->string('cityName');
            $table->integer('cityDelete');
            $table->integer('cityStatus');
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
        Schema::drop('citys');
    }
}
