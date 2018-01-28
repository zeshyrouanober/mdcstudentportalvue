<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
  protected $table = 'teacher';
  protected $primaryKey = 'tch_num';
  protected $increment = false;
  public $timestamps = false;

  public function subjects(){
    return $this->belongsToMany('App\Subject','class','sub_code','tch_num');
}
