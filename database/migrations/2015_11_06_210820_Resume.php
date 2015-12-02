<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Resume extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('fatherName');
            $table->string('dob');
            $table->string('mobile');
            $table->string('gender');
            $table->string('address');
            $table->string('city');
            $table->string('pinCode');
            $table->string('state');
            $table->string('degree');
            $table->string('branch');
            $table->integer('currentSem');
            $table->string('facultyNo');
            $table->string('enrollmentNo');
            $table->tinyInteger('isDiploma')->default(0);
            $table->string('board10');
            $table->string('board10Percent');
            $table->string('board12');
            $table->string('board12Percent');
            $table->string('sem1');
            $table->string('sem1MM');
            $table->string('sem1Percent');
            $table->string('sem2');
            $table->string('sem2MM');
            $table->string('sem2Percent');
            $table->string('sem3');
            $table->string('sem3MM');
            $table->string('sem3Percent');
            $table->string('sem4');
            $table->string('sem4MM');
            $table->string('sem4Percent');
            $table->string('sem5');
            $table->string('sem5MM');
            $table->string('sem5Percent');
            $table->string('sem6');
            $table->string('sem6MM');
            $table->string('sem6Percent');
            $table->string('sem7');
            $table->string('sem7MM');
            $table->string('sem7Percent');
            $table->string('sem8');
            $table->string('sem8MM');
            $table->string('sem8Percent');
            $table->integer('aggregatePercent');
            $table->integer('averagePercent');
            $table->string('kt');
            $table->integer('totalkt');
            $table->text('proj1');
            $table->text('proj2');
            $table->text('extraCurricular');

            $table->integer('user_id')->unsigned()->unique();
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
        Schema::drop('resume');
    }
}