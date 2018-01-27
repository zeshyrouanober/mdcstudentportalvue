<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Session;
use App\Student;
use Auth;
use Hash;
use Materialize;
use Alert;

class UserController extends Controller
{

    public function index()
    {
        return view('admin');
    }

    public function showAccounts(Request $request){
      $user = User::whereRaw('student_id <> ""')->with('student')->where('username','LIKE','%'.$request->search.'%')->paginate(10);
      // Session::put('idnum',$user->student_id);
      $response = array('user' => $user);
      return response()->json($response);
    }


    public function studentuserdata($username){
      return User::where('username',$username)->get();
    }

    public function updateUser(Request $request , $username){
      User::where('username',$username)->update(['username'=>$request->username , 'password' => bcrypt($request->password)]);
    }

    public function userInformation($username){
      $student =  Student::find($username);

      $course = $student->course(27)->get();
      $response = array('student' => $student,'course' => $course );

      return response()->json($response);

    }

    public function studentUserUpdate(Request $request){

      if (Hash::check($request->currentPassword, Auth::user()->password)) {
        if ($request->newPassword == $request->confirmPassword) {
          User::where('username',Auth::user()->username)->update(['password' => bcrypt($request->confirmPassword)]);
        }
      }
    }

    public function counters(){
      return User::count();
    }

}
