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
        Schema::create('questions_quizzs', function (Blueprint $table) {
            $table->integer('quizz_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->integer('order')->nullable();
            $table->timestamps();
            $table->primary(['quizz_id','question_id']);
        });

        Schema::table('questions_quizzs', function(Blueprint $table) {
            $table->foreign('quizz_id')->references('id')->on('quizzs');
            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions_quizzs');
    }
}
