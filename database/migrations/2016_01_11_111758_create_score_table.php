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
            $table->unsignedBigInteger('user_id');
            $table->integer('quizz_id',false,true);
            $table->integer('score',false,true);
            $table->timestamps();
        });

        Schema::table('scores', function(Blueprint $table){
            $table->primary(['user_id','quizz_id']);
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
