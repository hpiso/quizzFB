<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id',false)->unique();
            $table->string('token',255);
            $table->string('email');
            $table->string('avatar');
            $table->string('avatar_original');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->boolean('admin');
            $table->timestamps();
        });

        Schema::table('users',function (Blueprint $table)
        {
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Users');
    }
}
