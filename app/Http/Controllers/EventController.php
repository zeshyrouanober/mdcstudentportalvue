<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

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

  public function show(){
    $event = Event::all();
    return $event;
  }

}
