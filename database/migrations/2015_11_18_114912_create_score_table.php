<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('quizz_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->integer('answer_id')->unsigned()->nullable();
            $table->boolean('already_answered');
            $table->boolean('correct')->nullable();
            $table->timestamps();
        });

        Schema::table('scores', function(Blueprint $table) {
            $table->foreign('quizz_id')->references('id')->on('quizzs');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('answer_id')->references('id')->on('answers');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scores');
    }
}
