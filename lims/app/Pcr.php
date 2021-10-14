<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pcr extends Model
{
    //
    protected $table ='pcr';
    public function Patient(){
        return $this->belongsTo('App\Patient','idPatient','id');
    }
}
