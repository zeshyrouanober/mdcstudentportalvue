<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use App\User;
use App\Announcement;
use App\Student;
use Session;
Use Alert;
Use Materialize;
Use View;
use Auth;
use Carbon\Carbon;
use App\Log;

class HomeController extends Controller
{
    //FOR REGISTRATION
    public function signUp(Request $request){
      $requestData = $request->input('idnumber');

      if (User::where('username',$requestData)->exists()) {
        Session::flash('accountalreadyexist', 'This is a message!');
        return redirect()->back()->with('accountalreadyexist','Account already exist !');
      }else{
        $student_id = DB::table('students')->select('idnum')->where('idnum',$requestData)->value('verification');
        if ($requestData == $student_id) {
          $student = DB::table('students')->where('idnum',$student_id)->take('1')->get();
          Session::put('username',$student_id);
          return View::make("password")->with('student',$student);
        }else{
          Session::flash('idnumbernotfound', 'This is a message!');
          return redirect()->back()->with('idnumbernotfound','Password dont match !');
        }
      }
    }
    public function passwordSignUp(Request $request){
      $student_role_id = DB::table('roles')->select('id')->where('id','=','1')->value('id');
      $password = $request->input('password');
      $passwordconfirmation = $request->input('password_confirmation');
        if ($password == $passwordconfirmation) {
          if (Session::has('username')) {
            $user = new User;
            $user->username = Session::get('username');
            $user->password = bcrypt($password);
            $user->student_id =  Session::get('username');
            $user->role_id = $student_role_id;
            $user->save();

            $todos = DB::table('todos')->where('student_id',Session::get('username'))->get();
            $students = DB::table('students')->where('idnum',Session::get('username'))->take('1')->get();

            $credentials = array('username' => $user->username , 'password' => $password);

            if (Auth::attempt($credentials)) {
              $dateTime = Carbon::now();
              return redirect('dashboard')->with('dateTime',$dateTime->toDateTimeString());
            }else {
              return redirect()->back();
            }
          }
        }else{
          Session::flash('passworddontmatch', 'This is a message!');
          return redirect()->back()->with('passworddontmatch','Password dont match !');
        }
      }

    //FOR LOGGING IN
    public function signIn(Request $request){
      $request = $request->input('idnumber');
      $username = DB::table('users')->where('username',$request)->value('username');
      if ($request == $username) {
        $user = DB::table('users')->where('username',$username)->take('1')->get();
        $student = DB::table('students')->where('idnum',$username)->take('1')->get();
        Session::put('username',$username);
        return View::make('loginpassword')->with('student',$student)->with('user',$user);
      }else {
        Session::flash('message', 'This is a message!');
        return redirect()->back()->with('message','User not found !');
      }
    }

    public function passwordSignIn(Request $request){
      $username = Session::get('username');

      $credentials = array('username' => $username,'password' => $request->input('passwordSignIn') );

      if (Auth::attempt($credentials)) {

        if (Auth::user()->role_id == null ) {

          return redirect('dashboard')->with('message','Welcome');

        }else {

          User::where('username',Auth::user()->username)->update(['status' => '1']);

          Session::flash('message', 'This is a message!');
          return redirect('dashboard')->with('message','Welcome');

        }
      }else {
        Session::flash('message', 'This is a message!');
        return redirect()->back()->with('message','Wrong Password !');
      }
    }

    public function index(){
      if (Auth::user()->role_id == 1) {
        $todos = DB::table('todos')->where('student_id',Auth::user()->username)->get();
        return View::make('student')->with('todos',$todos);
      }else {
        $students = Student::all();
        $announcements = Announcement::all();
        $users = DB::table('users')->where('role_id','1')->get();
        return View::make('admin')->with('announcements',$announcements)->with('students',$students)->with('users',$users);
      }
    }
    
    public function logOut(){

      if (Auth::user()->role_id == null) {
        Auth::logout();
        return redirect('/');
      }else {
        $log = new Log;
        $log->username = Session::get('username');
        $log->stud_id = Session::get('username');
        $log->user_id = Session::get('username');
        $log->save();

        User::where('username',Auth::user()->username)->update(['status' => '0']);
        Auth::logout();
        Session::flush();
        return redirect('/');
      }
    }
}
