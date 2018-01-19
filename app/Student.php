<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $table = 'students';
  protected $primaryKey = 'idnum';

  protected $increment = false;
  public $timestamps = false;
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function todos(){
      return $this->hasMany('App\Todo');
    }
    public function subjects($currentSem){
      return $this->belongsToMany('App\Subject','sub_enrol','idnum','sub_code')->withPivot('mgrade','fgrade','rating','sem_code')->wherePivot('sem_code',$currentSem);
    }

}
