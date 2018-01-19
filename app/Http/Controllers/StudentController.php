<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Input;
use Auth;
use DB;

class StudentController extends Controller
{
    public function index(){
      return view('admin');
    }

    public function showStudents(){
      $student = Student::orderBy('idnum','asc')->paginate(100);
      $response = array('student' => $student );
      return response()->json($response);
    }

    public function listOfSubjectWithGrade(){
      $currentSem =  DB::table('sub_enrol')->orderBy('sem_code','desc')->take(1)->value('sem_code');

      $student =  Student::find(Auth::user()->username);

      return $student->subjects(27)->get();

    }

    public function showSubjectTaken(){

    }
}
