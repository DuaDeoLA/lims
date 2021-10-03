<?php

namespace App\Http\Controllers;

use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class LoaiTinController extends Controller
{
    public function getDanhsach(){
        $loaitin= LoaiTin::all();
        return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }
    public function getThem(){
        $theloai = TheLoai::all();
        return view('admin.loaitin.them',['theloai'=>$theloai]);
    }
    public function postThem(Request $request){
        //echo $request->tentheloai;
        $this->validate($request, [
            'Ten' => 'required|unique:LoaiTin|min:3|max:100',
            'tentheloai' => 'required'
        ],[
            'Ten.required' => 'Chưa nhập thể loại',
            'Ten.unique' =>'Tên này đã tồn tại',
            'Ten.min' => 'Tên thể loại phải có độ dài từ 3 đến 100',
            'Ten.max' => 'Tên thể loại phải có độ dài từ 3 đến 100',
            'tentheloai' =>'Chưa nhập thể loại'
        ]);
        $loaitin = new LoaiTin();
        $loaitin -> Ten = $request->Ten;
        $loaitin -> TenKhongDau = create_slug($request -> Ten);
        $loaitin ->idTheLoai = $request->tentheloai;
        $loaitin->save();
        return redirect('admin/loaitin/them') ->with('thongbao','Thêm loại tin thành công');
    }

    public function getSua($id){
        $loaitin = LoaiTin::find($id);
        $theloai = TheLoai::all();
        return view('admin.loaitin.sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id){
        $this->validate($request, [
            'Ten' => 'required|min:3|max:100',
            'tentheloai' => 'required'
        ],[
            'Ten.required' => 'Chưa nhập thể loại',
            'Ten.min' => 'Tên thể loại phải có độ dài từ 3 đến 100',
            'Ten.max' => 'Tên thể loại phải có độ dài từ 3 đến 100',
            'tentheloai' =>'Chưa nhập thể loại'
        ]);
        $loaitin = LoaiTin::find($id);
        $loaitin -> Ten = $request->Ten;
        $loaitin -> TenKhongDau = create_slug($request -> Ten);
        $loaitin ->idTheLoai = $request->tentheloai;
        $loaitin->save();
        return redirect('admin/loaitin/danhsach') ->with('thongbao','Đã chỉnh sửa thành công');
    }
    public function getXoa($id){
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach') ->with('thongbao','Đã xóa thành công');
    }
}
