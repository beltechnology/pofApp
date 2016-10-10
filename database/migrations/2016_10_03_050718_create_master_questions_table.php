<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_questions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('questionId');
            $table->integer('questionNumber');
            $table->text('text');
            $table->string('section');
            $table->string('stream');
            $table->integer('marks');
            $table->string('');
            $table->string('questionType');
            $table->integer('updateCounter');
            $table->integer('deleted');
            $table->integer('status');
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
        Schema::drop('master_questions');
    }
}
