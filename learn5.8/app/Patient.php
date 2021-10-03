<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table="patient";
    public function KhaiBaoYT(){
        $this->hasMany('App\KhaBaoYT','idPatient','id');
    }

}
