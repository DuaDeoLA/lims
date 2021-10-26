<?php

namespace App\Http\Controllers;

use App\LoaiTin;
use App\Patient;
use App\TestNhanh;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
    public function getThongtin($sdt){
        $benhnhan = Patient::firstWhere('dienthoai', $sdt);
        if(isset($benhnhan)){
            return view('lims/nhanmau/thongtin')->with('benhnhan',$benhnhan);
        } else{
            return view('lims/nhanmau/thongtinnull');
        }
    }
    public function searchD2D($from,$to){
        $from = Carbon::parse($from);
        $to = Carbon::parse($to);
        //echo $from;
        //echo $to;
        $testnhanh=TestNhanh::whereBetween('created_at', [$from, $to])
            ->where('idUser',session()->get('idUser'))
            ->get();
        //echo session()->get('idUser');
        return view('lims/testnhanh/fromD2D',['testnhanh'=>$testnhanh]);
    }
}
