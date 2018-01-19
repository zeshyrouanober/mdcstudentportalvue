<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use DB;

class SubjectController extends Controller
{

    public function index()
    {
      return view('admin');
    }

    public function showSubjects(){
      $subject = Subject::orderBy('sub_code','asc')->paginate(10);
      $response = array('subject' => $subject );
      return response()->json($response);
    }

    public function fetchUpdate($subjectCode){
      return Subject::where('sub_code',$subjectCode)->get();
    }

    public function update(Request $request , $subjectCode){
      Subject::where('sub_code',$subjectCode)->update(['sub_code'=>$request->sub_code, 'name' => $request->name , 'descript' => $request->descript]);
    }

    public function listOfStudent($subjectCode){
      $subject =  Subject::find($subjectCode);
      return $subject->students()->paginate(10);
    }
}
