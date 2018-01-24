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
      $student = Student::orderBy('lname','asc')->paginate(20);
      $response = array('student' => $student );
      return response()->json($response);
    }

    public function listOfSubjectWithGrade(){
      $currentSem =  DB::table('sub_enrol')->orderBy('sem_code','desc')->take(1)->value('sem_code');
      $student =  Student::find(Auth::user()->username);
      return $student->subjects(27)->get();

    }

    public function showSubjectTaken(){
      $response = Student::where('idnum',Auth::user()->username)->with('subjectsTaken')->get();
      return response()->json($response);
    }

    public function fetchStudent($idnum){
      return Student::where('idnum',$idnum)->get();
    }

    public function updateStudent(Request $request, $idnum){
      Student::where('idnum',$idnum)->update([
        'idnum' => $request->idnum,
        'lname' => $request->lname,
        'fname' => $request->fname,
        'mi'    => $request->mi,
        'addb'  => $request->addb,
        'addt'  => $request->addt,
        'addp'  => $request->addp,
        'gender'=> $request->gender,
        'bdate' => $request->bdate,
        'status' => $request->status,
        'mother' => $request->mother,
        'father'  => $request->father,
        'base_rate' => $request->base_rate
      ]);
    }

    public function counters(){
      return Student::count();
    }
}
