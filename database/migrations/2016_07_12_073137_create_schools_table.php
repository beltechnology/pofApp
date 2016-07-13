<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function(Blueprint $table) {
            $table->increments('id');
            $table->string('sessionYear');
            $table->string('posterDistributionDate');
            $table->string('closingData');
            $table->string('formNo');
            $table->string('schoolName');
            $table->string('PrincipalName');
            $table->string('principalEmail');
            $table->string('firstCoordinatorName');
            $table->string('firstCoordinatorMobile');
            $table->string('firstCoordinatorEmail');
            $table->string('secondCoordinator');
            $table->string('secondCoordinatorMobile');
            $table->string('secondCoordinatorEmail');
            $table->string('PMOExamDate');
            $table->string('PSOExamDate');
            $table->string('schoolcode');
            $table->string('uniqueSchoolCode');
            $table->string('teamCode');
            $table->string('employeeCode');
            $table->string('schoolTotalStrength');
            $table->string('classStrength');
            $table->string('followUpDate');
            $table->string('callStatus');
            $table->string('posterDistributed');
            $table->string('KMS');
            $table->string('remarks');
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
        Schema::drop('schools');
    }
}
