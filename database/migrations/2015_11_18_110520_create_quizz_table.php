<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizz', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label',100);
            $table->string('description',500);
            $table->dateTime('starting_at');
            $table->dateTime('ending_at');
            $table->boolean('actif')->default(false);
            $table->integer('max_question')->default(10);
            $table->integer('id_theme')->unsigned();
            $table->timestamps();
        });

        Schema::table('quizz', function (Blueprint $table) {
            $table->foreign('id_theme')->references('id')->on('theme');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quizz');
    }
}
