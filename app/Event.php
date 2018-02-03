<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $table = 'events';
    public $timestamps = false;

  public function getDateAttribute($value) {
    return Carbon::parse($value)->format('Y/m/d');
  }
  
}
