<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Calendar extends Model
{

  protected $table = 'calendar';
  protected $dates = ['eventDate'];
  protected $primaryKey = 'id';

}
