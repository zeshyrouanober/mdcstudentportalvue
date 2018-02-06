<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';
    public $timestamps = true;

    public function getCreatedAtAttribute($date){
      return Carbon::createFromFormat('Y-m-d H:i:s', $date)->diffForHumans();
    }

}
