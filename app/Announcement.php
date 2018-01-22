<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
  public function getCreatedAtAttribute($date){
    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->diffForHumans();
  }
}
