<?php

namespace App\Http\Controllers;

use App\LoaiTin;
use App\TestNhanh;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AjaxController extends Controller
{
    //
    public function getLoaiTin($idTheLoai){
        $loaitin = LoaiTin::where('idTheLoai',$idTheLoai) -> get();
        foreach ($loaitin as $lt)
        {
           echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
        }
    }
    public function getPrint($id){
        $testnhanh = TestNhanh::find($id);
        $now = Carbon::now();
        $day= $now->day;
        $moth = $now->month;
        $year=$now->year;
        $hour = $now->hour;
        return view('lims/testnhanh/print',['testnhanh'=>$testnhanh,'hour'=>$hour]);
    }
}
