<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;

class CalendarController extends Controller
{

  public function create(Request $request){
    
    $event = new Calendar;
    $event->eventTitle = $request->title;
    $event->eventDescription = $request->description;
    $event->eventDate = $request->date;
    $event->save();

    return $request->all();

  }

  public function showUpcomingEvents(){
    $upcomingevents = Calendar::orderBy('id','desc')->paginate(3);

    $response = array('upcomingevents' => $upcomingevents );
    return response()->json($response);
  }


}
