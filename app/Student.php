<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $table = 'students';
  protected $primaryKey = 'idnum';
  protected $dates = ['bdate'];
  protected $increment = false;
  public $timestamps = false;

    public function getBdateAttribute($date){
      return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-M-d');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }
    public function todos(){
      return $this->hasMany('App\Todo');
    }

    public function subjects($currentSem){
      return $this->belongsToMany('App\Subject','sub_enrol','idnum','sub_code')->withPivot('mgrade','fgrade','rating','sem_code')->wherePivot('sem_code',$currentSem);
    }

    public function subjectsTaken(){
      return $this->belongsToMany('App\Subject','sub_enrol','idnum','sub_code')->withPivot('mgrade','fgrade','rating','sem_code');
    }

    public function course($currentSem){
      return $this->belongsToMany('App\Course','stud_enrol','idnum','course')->withPivot('sem_code','en_status','year')->wherePivot('sem_code',$currentSem);
    }

    public function studentcourse(){
      return $this->belongsToMany('App\Course','stud_enrol','idnum','course')->withPivot('sem_code','en_status','year');
    }

}
