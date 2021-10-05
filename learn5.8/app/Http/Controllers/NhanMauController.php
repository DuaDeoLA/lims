<?php

namespace App\Http\Controllers;

use App\KhaiBaoYT;
use App\Patient;
use App\TestNhanh;
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

        //Tạo danh sách test nhanh
        if($request->testnhanh ==1){
            //Thêm  test nhanh
            $testnhanh = new TestNhanh;
            $testnhanh->idPatient = $benhnhan->id;
            $testnhanh->tenxn = "Test nhanh kháng nguyên Sars-cov-2";
            $testnhanh->ketqua="";
            $testnhanh->donvi="";
            $testnhanh->thamkhao="";
            $testnhanh->giaxn="";
            $testnhanh->thutien=0;
            $testnhanh->dain=0;
            $testnhanh->save();
        }
        return redirect('lims/nhanmau/them')->with('thongbao','Đã khai báo y tế và thêm bệnh nhân');
    }
    public function getDanhSach(){
        $benhnhan =Patient::all();
        return view('lims/nhanmau/danhsach',['benhnhan'=>$benhnhan]);
    }
    public function getXoa($id){
        $benhnhan = Patient::find($id);
        $khaibao= $benhnhan->KhaiBaoYT;
       foreach ($khaibao as $kb){
          $kb->delete();
       }
       $benhnhan->delete();
       return  redirect('lims/nhanmau/danhsach')->with('thongbao','Đã xóa bệnh nhân');
    }
}
