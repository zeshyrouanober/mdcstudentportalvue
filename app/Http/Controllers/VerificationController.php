<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use Input;
use App\Verification;
use Alert;
use Auth;

class VerificationController extends Controller
{
    public function create(){

      $verif = new Verification;
      $verif->verification = str_random(25);
      $verif->save();

      return $verif->verification;

    }

    public function verify(Request $request){

      $requestData = $request->get('verification');

        $Verification = DB::table('verifications')->select('verification')->where('verification',$requestData)->value('verification');
        if ($requestData == $Verification) {

          $request->session()->put('verification',$Verification);
          $status = DB::table('verifications')->where('verification',$requestData)->value('status');

          if ($status == 0 ) {
            $status = DB::table('verifications')->where('verification',$requestData)->update(['status' => 1]);
            // Alert::success('You can now continue','Verification Success !')->persistent('close');
            return view('/signup');
          }else {
            // Alert::warning('Verification already used !','Oppsss..!')->persistent('close');
            return redirect('/verification');
          }
          }else{
            // Alert::warning('Verification not macth !','Oppsss..!')->persistent('close');
            return redirect('/verification');
        }
      }
      public function generate(Request $request){
        $length = intval($request->numberOfVerification);
        for ($i=0; $i < $length ; $i++) {
          $generatedVerification = new Verification;
          $generatedVerification->verification = str_random(25);
          $generatedVerification->save();
        }
      }
}
