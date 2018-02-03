<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Student;
use Illuminate\Http\Request;
use Input;
use Auth;
use DB;
use PDF;


class StudentController extends Controller
{
    public function index(){
      return view('admin');
    }

    public function showStudents(Request $request){
      $student = Student::orderBy('lname','asc')->with('studentcourse')->where('fname','LIKE','%'.$request->search.'%')->orWhere('lname','LIKE','%'.$request->search.'%')->paginate(20);
      $response = array('student' => $student );
      return response()->json($response);
    }

    public function listOfSubjectWithGrade(){
      $currentSem =  DB::table('sub_enrol')->orderBy('sem_code','desc')->take(1)->value('sem_code');
      $student =  Student::find(Auth::user()->username);
      return $student->subjects(23)->get();
    }

    public function showSubjectTaken(){
      $response = Student::where('idnum',Auth::user()->username)->with('subjectsTaken')->get();
      return response()->json($response);
    }

    public function studentCourse(){
      $currentSem =  DB::table('stud_enrol')->orderBy('sem_code','desc')->take(1)->value('sem_code');

      $student =  Student::find(Auth::user()->username);

      $course = $student->course(27)->get();
      $response = array('student' => $student,'course' => $course );

      return response()->json($response);
    }

    public function studentStatus(){
      $currentSem =  DB::table('stud_enrol')->orderBy('sem_code','desc')->take(1)->value('sem_code');

      $student =  Student::find(Auth::user()->username);

      $course = $student->course(27)->get();
      $response = array('course' => $course );

      return response()->json($response);

    }

    public function studentGradePDF(){
      $currentSem =  DB::table('sub_enrol')->orderBy('sem_code','desc')->take(1)->value('sem_code');
      $student =  Student::find(Auth::user()->username);

      $course = $student->course(23)->get();
      $subjects = $student->subjects(23)->get();
      $response = array('student' => $student,'course' => $course , 'subjects' => $subjects);

      // return $response;
      $pdf = PDF::loadView('pdf/grade',compact('course','subjects','student'))->setPaper('letter');
      return $pdf->save('gradepdf')->download('grade.pdf');
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

    public function currentSubject(){
      $currentSem =  DB::table('sub_enrol')->orderBy('sem_code','desc')->take(1)->value('sem_code');
      $student =  Student::find(Auth::user()->username);
      $subjectLenght =  $student->subjects(23)->get();
      return $subjectLenght->count();
    }

    public function takenSubject(){
      $response = Student::where('idnum',Auth::user()->username)->with('subjectsTaken')->get();
      return response()->json($response);
    }

    public function counters(){
      return Student::count();
    }
}
