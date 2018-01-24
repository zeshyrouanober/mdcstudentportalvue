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

//Home
Route::get('password','HomeController@signUp')->name('signup');
Route::post('/sign-up-user','HomeController@passwordSignUp');
Route::get('signin','HomeController@signIn')->name('signin');
Route::post('sign-in','HomeController@passwordSignIn')->name('passwordSignIn');
Route::post('log-out','HomeController@logOut');
Route::post('sign-up','VerificationController@verify')->name('verify');


Route::get('/dashboard','HomeController@index');
Route::get('update-student','StudentController@update');


//Student
Route::get('student-data', 'StudentController@showStudents');
Route::get('list-of-subject-with-grade','StudentController@listOfSubjectWithGrade');
Route::get('show-subject-taken','StudentController@showSubjectTaken');
Route::get('fetch-student/{idnum}','StudentController@fetchStudent');
Route::put('update-student/{idnum}','StudentController@updateStudent');
Route::get('student-counters','StudentController@counters');


//Subject
Route::get('subject-data','SubjectController@showSubjects');
Route::get('fetch-subject-update/{subjectCode}','SubjectController@fetchUpdate');
Route::put('update-subject/{subjectCode}','SubjectController@update');
Route::get('list-of-student/{subjectCode}','SubjectController@listOfStudent');
Route::get('show-announcement','AnnouncementController@showAnnouncement');
Route::get('subject-counters','SubjectController@counters');



//Announcement
Route::get('view-announcement','AnnouncementController@index');
Route::get('announcement-data','AnnouncementController@showAnnouncement');
Route::post('create-announcement','AnnouncementController@create');
Route::delete('delete-announcement/{announcementId}','AnnouncementController@delete');
Route::put('update-announcement/{announcementId}','AnnouncementController@update');
Route::get('fetch-data-update/{announcementId}','AnnouncementController@fetchUpdate');

//Users
Route::get('user-student-data/{username}','UserController@studentuserdata');
Route::get('user-data','UserController@showAccounts');
Route::put('update-user/{username}','UserController@updateUser');
Route::get('user-counters','UserController@counters');

//Verification
Route::get('verifsample','VerificationController@create')->name('generate-verification');
Route::post('generate-verification','VerificationController@generate');
Route::get('show-verifications','VerificationController@showVerifications');
Route::get('not-activated','VerificationController@notActivated');
Route::get('activated','VerificationController@activated');
