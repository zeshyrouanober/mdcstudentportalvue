<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Session;

class TodosController extends Controller
{
    public function create(Request $request){

        if ($request->ajax()) {

          $title = $request->title;
          $description = $request->description;
          $date = $request->date;
          // $time = $request->time;

          $todo = new Todo;
          $todo->title = $title;
          $todo->description = $description;
          $todo->date =$date;
          // $todo->time = $time;
          $todo->student_id = Session::get('username');
          $todo->save();

          $todos = DB::table('todos')->where('student_id',Session::get('username'))->get();

          return View::make('dashboard')->with('todos',$todos);

        }
    }
}
