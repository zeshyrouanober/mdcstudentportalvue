<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Session;


class UserController extends Controller
{

    public function index()
    {
        return view('admin');
    }

    public function showAccounts(){
      $user = User::whereRaw('student_id <> ""')->with('student')->paginate(10);
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

    public function counters(){
      return User::count();
    }

}
