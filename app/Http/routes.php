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
    return view('prelogin.index');
});
Route::get('/about',function(){
	return view('prelogin.about');
});
Route::get('/procedure',function(){
	return view('prelogin.procedure');
});
Route::get('/departments',function(){
	return view('prelogin.departments');
});
Route::get('/contact',function(){
	return view('prelogin.contact');
});
Route::get('/procedure',function(){
	return view('prelogin.procedure');
});

Route::get('registerAdmin',function(){
	return view('auth.registerAdmin');
});

Route::get('/register/{confirmationCode}',[
    'as' => 'confirmation_path',
    'uses' => 'userRegistrationController@confirm'
]);
Route::get('/password-reset',function(){
	return view('auth.password');
});
Route::post('/password-change','userRegistrationController@setResetRequest');

Route::post('/reset','userRegistrationController@reset');

Route::get('/reset/{confirmationCode}',[
	'as'=>'confirmation_path',
	'uses'=>'userRegistrationController@resetPasswordPage'	
]);

Route::get('/{ent}/updatePassword',function(){
	return view('updatePassword');
});
Route::post('/updatePassword', 'passController@index');
Route::get('news','newsController@index');

Route::get('admin/panel','adminController@index');
Route::get('admin/companyManagement','adminController@allCompanies');
Route::get('admin/companyManagement/{company_id}','adminController@company');
Route::post('admin/companyManagement/updateVisibility','adminController@updateSetVisibilityStatus');
Route::post('/admin/companyManagement/updateApplyButton','adminController@updateApplyButtonStatus');

Route::get('/admin/panel/campusProcedure/{company_id}','adminController@campusProcedure');
Route::get('/admin/panel/campusProcedure/advanced/{company_id}','adminController@advancedCampusProcedure');
Route::get('/admin/panel/campusProcedure/setRoundsDataAbsent/{company_id}','adminController@absentInCampusProcedure');
Route::post('/admin/panel/campusProcedure/setRoundsDataAbsent','adminController@setAbsentInCampusProcedure');
Route::post('/admin/panel/campusProcedure/setRoundsDataAdvanced','adminController@setRoundsDataAdvanced');
Route::post('/admin/panel/campusProcedure/setRoundsData','adminController@setRoundsData');
Route::get('/admin/panel/studentDetails/{stuid}','adminController@studentDetails');

Route::post('/admin/companyManagement/setSlab','adminController@setSlab');
Route::get('/passwordChangeByAdmin',function(){
	return view('admin.changePassword');
});
Route::post('/passwordChangeByAdmin','adminController@changePassword');

Route::post('admin/companyManagement/getExcel','adminController@getExcel');

Route::get('admin/addNews','newsController@newsForm');
Route::post('admin/addNews','newsController@storeNews');
Route::get('admin/editNews','newsController@showAllNews');
Route::get('admin/editNews/{id}','newsController@editNews');

// Route::get('news','newsController@index');
// Route::get('news/create','newsController@create');
// Route::get('news/{id}','newsController@show');
// Route::post('news','newsController@store');
// Route::get('news/{id}/edit','newsController@edit');

Route::resource('news','newsController');

Route::controller('auth','Auth\AuthController');
Route::get('company/panel','companyController@postLoginPage');
Route::get('company/panel/jaf','companyController@jaf');
Route::post('company/panel/jaf','companyController@jafStore');
Route::get('/company/panel/myStudents','companyController@myStudents');
Route::get('/company/panel/news','companyController@companyNews');
Route::get('/company/panel/branchStudents/{branch}','companyController@getPercentRangeStudentsOfBranch');
// Route::get('company/panel/edit', 'companyController@editProfile');
Route::get('/company/panel/branches','companyController@getOpenForBranches');
Route::get('/company/panel/branches/{branch}','companyController@getStudentsOfBranch');
Route::get('/company/panel/branches/studentDetails/{stuid}','companyController@studentProfile');
Route::post('/company/panel/settings','companyController@settingsPageStore');
Route::get('/company/panel/settings','companyController@settingsPage');


Route::get('alumni/panel','alumniController@index');
Route::get('/alumni/panel/news','alumniController@alumniNews');
Route::get('/alumni/panel/placements','alumniController@companies');
Route::get('/alumni/panel/fellowAlumni','alumniController@fellowAlumni');
Route::get('/alumni/panel/currentBranches','alumniController@currentStudents');
Route::get('/alumni/panel/currentBranches/{branch}','alumniController@currentStudentsByBranch');
Route::get('/alumni/panel/studentDetails/{stuid}','alumniController@studentDetails');

Route::get('/alumni/panel/CurrentProfessors','alumniController@currentProfessors');
Route::post('/alumni/panel/settings','alumniController@settingsPageStore');
Route::get('/alumni/panel/settings','alumniController@settingsPage');




Route::get('professor/panel','professorController@index');
Route::get('/professor/panel/news','professorController@professorNews');
Route::get('/professor/panel/placements','professorController@companies');
Route::get('/professor/panel/students','professorController@showAllBranches');
Route::get('/professor/panel/students/{branch}','professorController@currentStudentsByBranch');
Route::get('/professor/panel/studentDetails/{stuid}','professorController@studentDetails');

Route::get('/professor/panel/fellowProfessors','professorController@fellowProfessors');
Route::get('/professor/panel/alumni','professorController@alumni');
Route::post('/professor/panel/settings','professorController@settingsPageStore');
Route::get('/professor/panel/settings','professorController@settingsPage');


Route::get('/student/panel','studentController@postLoginPage');
Route::post('student/panel/resume','studentController@resumeStore');
Route::get('student/panel/resume','studentController@resume');
Route::get('/student/panel/placements','placementsController@index');
Route::post('/student/panel/placements/applyForCompany','placementsController@applyForCompany');
Route::post('/student/panel/placements/cancelApplicationForCompany','placementsController@cancelApplicationForCompany');
Route::post('/student/panel/cancelApplicationForCompany','studentController@cancelApplicationForCompany');
Route::post('student/panel/settings','studentController@settingsPageStore');
Route::get('student/panel/settings','studentController@settingsPage');


Route::get('/student/panel/news','studentController@studentNews');
Route::post('/student/panel/applyForCompanyDashboard','studentController@applyForCompany');
Route::get('/student/panel/p','placementsController@appliedIn');
Route::get('/student/panel/fellowStudents','studentController@fellowStudents');
Route::get('/student/panel/fellowStudents/{stuid}','studentController@fellowStudentProfile');
Route::get('/student/panel/printResume','studentController@printResume');
// Route::get('register/verify/{confirmationCode}', [
//     'as' => 'confirmation_path',
//     'uses' => 'designing@confirm'
// ]);



Route::get('/android/loginCredentials/{newRoll}','androidController@loginCredentials');