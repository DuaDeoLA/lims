<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhaiBaoYT extends Model
{
    //
    protected $table='khaibaoyt';
    public function Patient(){
        $this->belongsTo('App\Patient','idPatient','id');
    }
}
