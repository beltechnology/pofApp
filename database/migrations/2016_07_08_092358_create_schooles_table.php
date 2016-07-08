<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schooles', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('session');
            $table->integer('distributionDate');
            $table->integer('clossingDate');
            $table->string('formNo');
            $table->string('schoolCode');
            $table->string('uniqueSchoolCode');
            $table->string('teamcode');
            $table->integer('employeeNo');
            $table->integer('employeeConNo');
            $table->string('principalName');
            $table->string('pmo_psoIncharge');
            $table->string('pmoExmDate');
            $table->string('psoExmDate');
            $table->string('deleted');
            $table->string('status');
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
        Schema::drop('schooles');
    }
}
