<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Announcement;
use App\Student;
use Session;
Use Alert;
Use Materialize;
Use View;
use Auth;

class HomeController extends Controller
{
    //FOR REGISTRATION
    public function signUp(Request $request){
        $requestData = $request->input('idnumber');
          $student_id = DB::table('students')->select('idnum')->where('idnum',$requestData)->value('verification');
          if ($requestData == $student_id) {
            $student = DB::table('students')->where('idnum',$student_id)->take('1')->get();
            Session::put('username',$student_id);
            return View::make("password")->with('student',$student);
          }else{
            $notification =  array('message' => 'ID not found' );
            return redirect()->back()->with($notification);
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
              return redirect('dashboard');
            }else {
              return redirect()->back();
            }

          }
        }else{
          $notification =  array('message' => 'Password dont match' );
          return redirect()->back()->with($notification);
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
        $notification =  array('message' => 'User not found' );
        return redirect()->back()->with($notification);
      }
    }

    public function passwordSignIn(Request $request){
      $username = Session::get('username');

      $credentials = array('username' => $username,'password' => $request->input('passwordSignIn') );

      if (Auth::attempt($credentials)) {
        return redirect('dashboard');
      }else {
        return redirect()->back();
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
        return view::make('admin')->with('announcements',$announcements)->with('students',$students)->with('users',$users);
      }
    }

    public function logOut(){
      Auth::logout();
      return redirect('/');
    }
}
