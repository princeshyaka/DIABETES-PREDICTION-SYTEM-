<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes();


Route::get('/home',function () {
    return redirect()->route('new.exam');
});
Route::get('/patient/{id}/test','ExaminationController@createPrediction')->name('create.prediction');
Route::post('/patient/{id}/test', 'ExaminationController@predict')->name('predict');
Route::get('/test/{id}', 'ExaminationController@show')->name('examination.show');

Route::get('/test/pdf/{id}','ExaminationController@downloadPdf')->name('examination.pdf');
Route::get('/patient/pdf', 'PatientController@pdf')->name('patient.pdf');
Route::get('/doctors/pdf', 'DoctorController@pdf')->name('doctor.pdf');

Route::resource('/patient', 'PatientController');

Route::get('/doctor/{id}/update', 'DoctorController@getUpdateDoctor')->name('doctor.getUpdate');
Route::patch('/doctor/{id}/update', 'DoctorController@updateDoctor')->name('doctor.updateDoctor');
Route::get('profile/', 'DoctorController@editProfile')->name('doctor.profile');
Route::patch('profile/email', 'DoctorController@updateEmail')->name('doctor.updateEmail');
Route::patch('profile/password', 'DoctorController@updatePassword')->name('doctor.updatePassword');

Route::resource('/doctor', 'DoctorController');

Route::get('/tests','ExaminationController@index')->name('examination.index');
Route::get('/tests/pdf','ExaminationController@printPDF')->name('examination.list.pdf');
Route::post('/search/id','PatientController@searchID')->name('examination.search.id');
Route::post('/search/names','PatientController@searchByNames')->name('examination.search.names');
Route::get('/search/patient', function () {
    return view('patient.search');
})->name('new.exam');

Route::get('my/profile/edit-email', 'DoctorController@editEmail')->name('doctor.editEmail');
Route::get('my/profile/edit-password', 'DoctorController@editPassword')->name('doctor.editPassword');

Route::patch('my/profile/email', 'DoctorController@updateEmail')->name('doctor.updateEmail');
Route::patch('my/profile/password', 'DoctorController@updatePassword')->name('doctor.updatePassword');
