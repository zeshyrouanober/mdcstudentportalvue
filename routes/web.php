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

Route::get('verification-index',function(){
  return view('verification');
})->name('verification-index');

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
Route::get('student-course', 'StudentController@studentCourse');
Route::get('student-dashboard-status','StudentController@studentStatus');
Route::get('student-grade-pdf','StudentController@studentGradePDF')->name('grade-pdf');
Route::get('student-data', 'StudentController@showStudents');
Route::get('list-of-subject-with-grade','StudentController@listOfSubjectWithGrade');
Route::get('show-subject-taken','StudentController@showSubjectTaken');
Route::get('fetch-student/{idnum}','StudentController@fetchStudent');
Route::put('update-student/{idnum}','StudentController@updateStudent');
Route::get('student-counters','StudentController@counters');
Route::post('create-todo','TodosController@create');
Route::get('todos-data','TodosController@index');
Route::delete('delete-todo/{id}','TodosController@delete');
Route::get('count-current-subject','StudentController@currentSubject');
Route::get('count-taken-subjects','StudentController@takenSubject');


//Subject
Route::get('subject-data','SubjectController@showSubjects');
Route::get('fetch-subject-update/{subjectCode}','SubjectController@fetchUpdate');
Route::put('update-subject/{subjectCode}','SubjectController@update');
Route::get('list-of-student/{subjectCode}','SubjectController@listOfStudent');
Route::get('show-announcement','AnnouncementController@showAnnouncement');
Route::get('subject-counters','SubjectController@counters');


//School Events
Route::get('show-upcomingevents','EventController@showUpcomingEvents');
Route::post('create-event','EventController@create');
Route::get('show-events','EventController@show');
Route::get('view-event/{id}','EventController@viewEvent');
Route::get('fetch-event-data/{id}','EventController@fetchEvent');
Route::put('update-event/{id}','EventController@updateEvent');
Route::delete('delete-event/{id}','EventController@deleteEvent');

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
Route::get('user-information/{username}','UserController@userInformation');
Route::put('student-user-update','UserController@studentUserUpdate');
Route::post('update-avatar','UserController@updateAvatar');
Route::post('verify-current-password','UserController@verifyCurrentPassword');
Route::get('active-student','UserController@activeStudent');


//Verification
Route::get('verifsample','VerificationController@create')->name('generate-verification');
Route::post('generate-verification','VerificationController@generate');
Route::get('show-verifications','VerificationController@showVerifications');
Route::get('not-activated','VerificationController@notActivated');
Route::get('activated','VerificationController@activated');
Route::get('generate-verification-pdf','VerificationController@verificationPDF');


//Logs
Route::get('show-logs','LogController@show');

//Feedbacks
Route::post('create-feedback','FeedbackController@create');