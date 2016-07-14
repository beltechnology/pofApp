<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_counts', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('entityId');
            $table->integer('schoolId');
            $table->integer('classId');
            $table->integer('noofstudentPMO');
            $table->integer('noofstudentPSO');
            $table->integer('handicapped');
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
        Schema::drop('student_counts');
    }
}
