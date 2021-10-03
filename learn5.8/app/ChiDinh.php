<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiDinh extends Model
{
    //
    protected $table="chidinh";

    public function Patient(){
        $this->belongsTo('App\Patient','idPatient','id');
    }
    public function KetQuaXN(){
        $this->belongsTo('App\KetQuaXN','idKetqua','id');
    }
}
