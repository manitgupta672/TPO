<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Jaf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jaf', function (Blueprint $table) {
            $table->increments('id');

            // Post Login Profile  Update
            $table->string('compUrl');
            $table->string('compAdd');
            $table->string('compCity');
            $table->string('hrName');
            $table->string('hrMob');
            $table->string('hrPhone'); // alternate

            // JAF
            // About Job 
            $table->text('compOver');
            $table->text('jobDesc'); // include payscale per post Designations .. gross salary
            $table->string('cityPost');
            $table->string('accom');
            $table->string('bond'); // default 0
            $table->string('cutOff');

            // Selection Procedure
            $table->text('selPro');

            // Departments open for // Show Available Departments and ask to Mention the Departments 
            $table->string('openFor');
            $table->integer('ktAllowed');
            // view is same as previous jaf checkbox
            // MEC/4-ECC/5-ITE/5
            $table->integer('user_id')->unsigned()->unique();
            $table->string('studentPanelVisibilityStatus');
            // jafKey points to user
             $table->foreign('user_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('cascade');
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
        Schema::drop('jaf');
    }
}
