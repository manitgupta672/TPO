<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('entity');
			$table->string('dpLink');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('mobile');
            $table->string('branch');
            $table->string('newRoll')->unique();
            // $table->string('followUp');
            $table->boolean('confirmed')->default(0);
            $table->string('confirmationCode')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
