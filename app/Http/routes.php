<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello',function(){
	return view('hello');
});
// Route::get('/student/panel',function(){
// 	return view('student.panel');
// });
// Route::get('student/panel','newController@index');

Route::controller('auth','Auth\AuthController');
Route::get('company/panel','companyController@postLoginPage');
Route::get('company/panel/jaf','companyController@jaf');
Route::post('company/panel/jaf','companyController@jafStore');
Route::get('/company/panel/myStudents','companyController@myStudents');

// Route::get('company/panel/edit', 'companyController@editProfile');


 

Route::get('/student/panel','studentController@postLoginPage');
Route::post('student/panel/resume','studentController@resumeStore');
Route::get('student/panel/resume','studentController@resume');
Route::get('/student/panel/placements','placementsController@index');
Route::post('/student/panel/placements/applyForCompany','placementsController@applyForCompany');
Route::post('/student/panel/placements/cancelApplicationForCompany','placementsController@cancelApplicationForCompany');

Route::get('/student/panel/p','placementsController@appliedIn');
Route::get('/student/panel/fellowStudents','studentController@fellowStudents');
Route::get('/student/panel/fellowStudents/{stuid}','studentController@fellowStudentProfile');
Route::get('/student/panel/printResume','studentController@printResume');
// Route::get('register/verify/{confirmationCode}', [
//     'as' => 'confirmation_path',
//     'uses' => 'designing@confirm'
// ]);
