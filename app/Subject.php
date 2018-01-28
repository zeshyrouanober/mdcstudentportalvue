<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $primaryKey = 'sub_code';
    protected $increment = false;
    public $timestamps = false;

    public function students(){
      return $this->belongsToMany('App\Student','sub_enrol','sub_code','idnum');
    }

    public function teacher(){
      return $this->belongsToMany('App\Teacher','class','sub_code','tch_num')->withPivot('sem_code','limit');
    }
}
