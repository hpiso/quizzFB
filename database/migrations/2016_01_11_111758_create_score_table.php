<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('quizz_id', false, true);
            $table->integer('score', false, true);
            $table->timestamps();
        });

        Schema::table('scores', function (Blueprint $table)
        {
            $table->unique(['user_id', 'quizz_id']);
            $table->foreign('quizz_id')->references('id')->on('quizzs');
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
        Schema::drop('Scores');
    }
}
