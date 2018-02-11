<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{


  public function showUpcomingEvents(){
    $upcomingevents = Event::orderBy('id','desc')->paginate(3);

    $response = array('upcomingevents' => $upcomingevents );
    return response()->json($response);
  }

  public function create(Request $request){

    $event = new Event;
    $event->title = $request->title;
    $event->desc = $request->description;
    $event->date = $request->date;

    $event->save();

  }

  public function updateEvent(Request $request , $id){

    Event::where('id',$id)->update(['title' => $request->title , 'desc' => $request->description , 'date' => $request->date]);

  }

  public function deleteEvent($id){
    
    Event::where('id',$id)->delete();

  }

  public function show(){
    return Event::orderBy('date','asc')->get();
  }

  public function viewEvent($id){
    return Event::where('id',$id)->get();
  }

  public function fetchEvent($id){
    return Event::where('id',$id)->get();
  }
}
