<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class LogController extends Controller
{
    public function show(){
      $logs = Log::orderBy('id','desc')->with('studentLog')->with('userLog')->paginate(10);
      $response = array('logs' => $logs);
      return response()->json($response);
    }
}
