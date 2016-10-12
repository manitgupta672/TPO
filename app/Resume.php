<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
	protected $table = 'resume';

	protected $fillable = [

	 'fatherName' ,
     'dob' ,
     'mobile' ,
     'gender' ,
     'address' ,
     'city' ,
     'pinCode' ,
     'state' ,
     'degree' ,
     'branch' ,
     'currentSem' ,
     'facultyNo' ,
     'enrollmentNo' ,
     'board10' ,
     'board10Percent' ,
     'isDiploma' ,
     'board12' ,
     'board12Percent' ,
     'sem1' ,
     'sem1MM' ,
     'sem1Percent' ,
     'sem2' ,
     'sem2MM' ,
     'sem2Percent' ,
     'sem3' ,
     'sem3MM' ,
     'sem3Percent' ,
     'sem4' ,
     'sem4MM' ,
     'sem4Percent' ,
     'sem5' ,
     'sem5MM' ,
     'sem5Percent' ,
     'sem6' ,
     'sem6MM' ,
     'sem6Percent' ,
     'sem7' ,
     'sem7MM' ,
     'sem7Percent' ,
     'sem8' ,
     'sem8MM' ,
     'sem8Percent' ,
     'kt' ,
     'totalkt',
     'proj1' ,
     'proj2' ,
     'extraCurricular',
     'user_id',
     'averagePercent',
     'aggregatePercent',
     'objective'

     ];

	public function user(){
    	return $this->belongsTo('App\User');
	}
}
