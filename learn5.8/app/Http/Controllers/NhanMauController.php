<?php

namespace App\Http\Controllers;

use App\KhaiBaoYT;
use App\Patient;
use Illuminate\Http\Request;

class NhanMauController extends Controller
{
    //
    public function getThem(){
        return view('lims/nhanmau/them');
    }
    public function postThem(Request $request){
        $this->validate($request, [
            'hoten' => 'required|min:3|max:100',
            'namsinh'=>'required',
            'diachi'=>'required',
            'dienthoai'=>'required',
        ]);
        //Tạo bệnh nhân
        $benhnhan = new Patient;
        $benhnhan->hoten =$request->hoten;
        $benhnhan->namsinh=$request->namsinh;
        $benhnhan->gioitinh=$request->gioitinh;
        $benhnhan->diachi=$request->diachi;
        $benhnhan->dienthoai=$request->dienthoai;
        $benhnhan->save();
        //Tạo khai báo
        $khaibao = new KhaiBaoYT;
        $khaibao->idPatient = $benhnhan->id;
        $khaibao->lichsu14 = $request->lichsu14;
        $khaibao->trieuchung= $request->trieuchung;
        $khaibao->tiepxuccovid=$request->tiepxuccovid;
        $khaibao->tiepxuctc =$request->tiepxuctc;
        $khaibao->testnhanh = $request->testnhanh;
        $khaibao->pcrcovid =$request->pcrcovid;
        $khaibao->xnthuongquy=$request->xnthuongquy;
        $khaibao->ketluan="";
        $khaibao->save();
        return view('lims/nhanmau/them')->with('thongbao','Đã cập nhật bệnh nhân');
    }
    public function getDanhSach(){
        $benhnhan =Patient::all();
        return view('lims/nhanmau/danhsach',['benhnhan'=>$benhnhan]);
    }
}
