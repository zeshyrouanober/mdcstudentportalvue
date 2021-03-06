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
use Image;

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

    public function verifyCurrentPassword(Request $request){
        if (Hash::check($request->currentPassword, Auth::user()->password)) {
          return 'true';
        }else {
          return 'false';
        }
    }

    public function studentUserUpdate(Request $request){
        if ($request->newPassword == $request->confirmPassword) {
          User::where('username',Auth::user()->username)->update(['password' => bcrypt($request->confirmPassword)]);
        }
    }

    public function updateAvatar(Request $request){

        $image = $request->get('image');
        $filename = time() . '.' . ('png');
        Image::make($image)->save(public_path('/storage/avatars/').$filename);

        $user = Auth::user();
        $user->avatar = $filename;
        $user->update();

      }

    public function  activeStudent(){
      $user =  User::where('status','1')->with('student')->get();


      return response()->json($user);
    }

    public function counters(){
      return User::count();
    }

}
