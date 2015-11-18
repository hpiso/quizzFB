<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsQuizzTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_quizz', function (Blueprint $table) {
            $table->integer('id_quizz')->unsigned();
            $table->integer('id_question')->unsigned();
            $table->integer('order')->nullable();
            $table->timestamps();
            $table->primary(['id_quizz','id_question']);
        });

        Schema::table('questions_quizz', function(Blueprint $table) {
            $table->foreign('id_quizz')->references('id')->on('quizz');
            $table->foreign('id_question')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions_quizz');
    }
}
