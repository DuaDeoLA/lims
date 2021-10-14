<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table="patient";
    public function KhaiBaoYT(){
       return  $this->hasMany('App\KhaiBaoYT','idPatient','id');
    }
    public function TestNhanh(){
        return $this->hasMany('App\TestNhanh','idPatient','id');
    }
}
