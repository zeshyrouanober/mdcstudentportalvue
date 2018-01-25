<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{

    public function student(){
      return $this->belongsTo('App\Student');
    }

    public function getCreatedAtAttribute($date){
      return Carbon::createFromFormat('Y-m-d H:i:s', $date)->diffForHumans();
    }

}
