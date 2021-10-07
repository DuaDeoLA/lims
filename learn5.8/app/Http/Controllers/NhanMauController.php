<?php

namespace App\Http\Controllers;

use App\KhaiBaoYT;
use App\Patient;
use App\TestNhanh;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class NhanMauController extends Controller
{
    //
    public function getThem(){
        return view('lims/nhanmau/them');
    }
    public function postThem(Request $request){
        $this->validate($request, [
            'hoten' => 'required|min:3|max:100',
            'namsinh'=>'required|numeric|min:4',
            'diachi'=>'required',
            'dienthoai'=>'required|min:10',
        ],[
            'hoten.required' =>'Chưa nhập họ tên',
            'hoten.min' =>'Họ tên quá ngắn',
            'namsinh.required' => 'Chưa nhập năm sinh',
            'namsinh.numeric' => 'Năm sinh phải là số',
            'dienthoai.required'=> 'Điện thoại không đúng'
        ]);
        //Tạo bệnh nhân
        $benhnhan = new Patient;
        $benhnhan->hoten =$request->hoten;
        $benhnhan->namsinh=$request->namsinh;
        $benhnhan->gioitinh=$request->gioitinh;
        $benhnhan->diachi=$request->diachi;
        $benhnhan->dienthoai=$request->dienthoai;
        $benhnhan->idDiaDiem=1;
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
            $testnhanh->code= $this->generateCode();
            $testnhanh->link = "";
            $testnhanh->idUser= Auth::user()->getAuthIdentifier();
            $testnhanh->save();
        }
        return redirect('lims/nhanmau/them')->with('thongbao','Đã khai báo y tế và thêm bệnh nhân');
    }
    public function getDanhSach(){
        $benhnhan =Patient::orderBy('id','desc')->get();
        return view('lims/nhanmau/danhsach',['benhnhan'=>$benhnhan]);
    }
    public function getXoa($id){
        $benhnhan = Patient::find($id);
        if($benhnhan->Testnhanh->isEmpty() == 1){
            $khaibao= $benhnhan->KhaiBaoYT;
            foreach ($khaibao as $kb){
                $kb->delete();
            }
            $benhnhan->delete();
            return  redirect('lims/nhanmau/danhsach')->with('thongbao','Đã xóa bệnh nhân');
        } else{
            return  redirect('lims/nhanmau/danhsach')->with('thongbao','Đã có kết quả test nhanh, không thể xóa');
        }
    }
    public function generateCode(){
        $Tendiadiem="LU";
        $latest = TestNhanh::latest()->first();
        $number = 1;
        if(isset($latest)){
            $number = $latest->id + 1;
        }
        $form= Carbon::now()->toDateTimeString();
        $date = Carbon::parse($form)->format('Ymd');
        return $Tendiadiem.$date.$number;
    }
}
