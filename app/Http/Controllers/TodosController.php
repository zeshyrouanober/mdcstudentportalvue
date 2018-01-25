<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Session;
use Auth;

class TodosController extends Controller
{
    public function index(){
      $todos = Todo::where('student_id',Auth::user()->username)->orderBy('id','desc')->paginate(10);

      $response = array('todos' => $todos );
      return response()->json($response);
    }

    public function create(Request $request){
      $todo = new Todo;
      $todo->title = $request->title;
      $todo->description = $request->description;
      $todo->student_id = Auth::user()->username;
      $todo->save();
    }

    public function delete($id){
      Todo::where('id',$id)->delete();
    }
}
