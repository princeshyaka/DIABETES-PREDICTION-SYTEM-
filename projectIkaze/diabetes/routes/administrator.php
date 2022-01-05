<?php

Route::group(['namespace' => 'Administrator'], function() {
    Route::get('/', 'HomeController@index')->name('administrator.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('administrator.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('administrator.logout');

  
    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('administrator.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('administrator.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('administrator.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('administrator.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('administrator.verification.notice');
    Route::get('email/verify/{id}/{hash}','Auth\VerificationController@verify')->name('administrator.verification.verify');

    Route::get('/doctors', 'HomeController@index')->name('admin.doctor.index');
Route::get('/doctor/{id}/update', 'HomeController@getUpdateDoctor')->name('doctor.getUpdate');
Route::get('/doctor/{id}', 'HomeController@doctorShow')->name('admin.doctor.show');
Route::get('/doctor/create/s', 'HomeController@createDoctor')->name('admin.doctor.create');
Route::post('/doctor/store', 'HomeController@doctorStore')->name('admin.doctor.store');
Route::patch('/doctor/{id}/update/', 'HomeController@updateDoctor')->name('doctor.updateDoctor');
Route::get('profile/', 'HomeController@editProfile')->name('admin.profile');
Route::get('/doctor/{id}/access','HomeController@access')->name('admin.access');
Route::patch('profile/email', 'HomeController@updateEmail')->name('admin.updateEmail');
Route::patch('profile/password', 'HomeController@updatePassword')->name('admin.updatePassword');
});