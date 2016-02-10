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
        Schema::create('quizzs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label',100);
            $table->string('description',500);
            $table->dateTime('starting_at');
            $table->dateTime('ending_at');
            $table->boolean('actif')->default(false);
            $table->integer('max_question')->default(10);
            $table->integer('theme_id')->unsigned();
            $table->integer('temps',false,true)->default(10); // Temps en seconde pour les questions
            $table->timestamps();
        });

        Schema::table('quizzs', function (Blueprint $table) {
            $table->foreign('theme_id')->references('id')->on('themes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quizzs');
    }
}
