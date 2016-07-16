<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function(Blueprint $table) {
            $table->increments('id');
            $table->string('studentName');
            $table->string('fatherName');
            $table->string('dob');
            $table->string('class');
            $table->string('section');
            $table->string('pmo');
            $table->string('pso');
            $table->string('handicapped');
            $table->string('rollNo');
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
        Schema::drop('students');
    }
}
