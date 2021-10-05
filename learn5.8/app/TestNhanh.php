<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestNhanh extends Model
{
    //
    protected $table='testnhanh';
    public function Patient(){
        return $this->belongsTo('App\Patient','idPatient','id');
    }
}
