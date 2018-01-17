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
    return view('welcome');
});

Route::get('template',function (){
    return view('layouts/template');
});

Route::get('student-dashboard',function(){
  return view('student');
});

Route::get('verification',function(){
  return view('verification');
});

Route::get('sign-up', function () {
    return view('signup');
})->middleware('HomeMiddleware');

Route::get('password','HomeController@signUp')->name('signup');
Route::post('/sign-up-user','HomeController@passwordSignUp');

Route::get('signin','HomeController@signIn')->name('signin');
Route::post('sign-in','HomeController@passwordSignIn')->name('passwordSignIn');

Route::post('log-out','HomeController@logOut');

Route::post('sign-up','VerificationController@verify')->name('verify');

// Route::get('dashboard','TodosController@create');

Route::get('/dashboard','HomeController@index');

Route::get('update-student','StudentController@update');

Route::get('view-announcement','AnnouncementController@index');
Route::get('announcement-data','AnnouncementController@showAnnouncement');
Route::post('create-announcement','AnnouncementController@create');
Route::delete('delete-announcement/{announcementId}','AnnouncementController@delete');
Route::put('update-announcement/{announcementId}','AnnouncementController@update');
Route::get('fetch-data-update/{announcementId}','AnnouncementController@fetchUpdate');

Route::get('generate-verification','VerificationController@generate');

Route::get('verifsample','VerificationController@create')->name('generate-verification');
