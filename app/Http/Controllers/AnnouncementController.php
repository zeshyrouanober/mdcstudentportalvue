<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(){
      return view('admin');
    }
    public function showAnnouncement(){
      $announcement = Announcement::orderBy('id','desc')->paginate(3);

      $response = array('announcement' => $announcement );
      return response()->json($response);
    }
    public function create(Request $request){

      $announcement = new Announcement;
      $announcement->title = $request->title;
      $announcement->description = $request->description;
      $announcement->save();

      // return $request->all();

    }

    public function delete($announcementId){
      Announcement::where('id',$announcementId)->delete();
    }

    public function update(Request $request , $announcementId){
      $announcement = Announcement::find($announcementId);
      $announcement->title = $request->title;
      $announcement->description = $request->description;
      $announcement->save();

    }

    public function fetchUpdate($announcementId){
      return Announcement::where('id',$announcementId)->get();
    }
}
