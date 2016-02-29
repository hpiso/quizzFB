<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableQuizz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quizzs', function(Blueprint $table){
            $table->string('image_lot')->nullable();
            $table->string('desc_lot')->nullable();
            $table->string('titre_lot')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quizzs', function($table)
        {
            $table->dropColumn(array('image_lot', 'desc_lot', 'titre_lot'));
        });
    }
}
