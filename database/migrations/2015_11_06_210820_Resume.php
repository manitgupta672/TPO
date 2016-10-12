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
//            $table->string('mobile');
            $table->string('gender');
            $table->string('address');
            $table->string('city');
            $table->string('pinCode');
            $table->string('state');
            $table->string('degree');
            // $table->string('branch');
            $table->integer('currentSem');
            $table->string('facultyNo');
            $table->string('enrollmentNo');
            $table->tinyInteger('isDiploma')->default(0);
            $table->string('board10');
            $table->string('board10Percent');
            $table->string('board12');
            $table->string('board12Percent');
            $table->integer('sem1');
            $table->integer('sem1MM');
            $table->float('sem1Percent');
            $table->integer('sem2');
            $table->integer('sem2MM');
            $table->float('sem2Percent');
            $table->integer('sem3');
            $table->integer('sem3MM');
            $table->float('sem3Percent');
            $table->integer('sem4');
            $table->integer('sem4MM');
            $table->float('sem4Percent');
            $table->integer('sem5');
            $table->integer('sem5MM');
            $table->float('sem5Percent');
            $table->integer('sem6');
            $table->integer('sem6MM');
            $table->float('sem6Percent');
            $table->integer('sem7');
            $table->integer('sem7MM');
            $table->float('sem7Percent');
            $table->integer('sem8');
            $table->integer('sem8MM');
            $table->float('sem8Percent');
            $table->integer('aggregatePercent');
            $table->integer('averagePercent');
            $table->string('kt');
            $table->integer('totalkt');
            $table->text('proj1');
            $table->text('proj2');
            $table->text('extraCurricular');
			$table->text('objective');
            $table->boolean('showResume')->default(1);
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