<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $table = 'courses';
  protected $primaryKey = 'cr_num';
  protected $increment = false;
  public $timestamps = false;

  public function student($currentSem){
    return $this->belongsToMany('App\Student','stud_enrol','idnum','course')->withPivot('sem_code','en_status','year')->wherePivot('sem_code',$currentSem);
  }

}
