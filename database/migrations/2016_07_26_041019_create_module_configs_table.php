<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModuleConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_configs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('designationId');
            $table->integer('moduleType');
            $table->string('name');
            $table->string('image');
            $table->string('muduleLink');
            $table->string('active');
            $table->string('title');
            $table->string('text');
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
        Schema::drop('module_configs');
    }
}
