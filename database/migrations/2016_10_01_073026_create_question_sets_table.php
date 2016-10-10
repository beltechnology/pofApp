<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_sets', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('setid');
            $table->string('setName');
            $table->integer('sessionId');
            $table->string('stream');
            $table->integer('updateCounter');
            $table->integer('status');
            $table->integer('deleted');
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
        Schema::drop('question_sets');
    }
}
