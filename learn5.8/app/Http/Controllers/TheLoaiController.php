<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\TheLoai;

class TheLoaiController extends Controller
{
    //
    public function getDanhsach(){
        $theloai= TheLoai::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    public function getSua($id){
        $theloai = TheLoai::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id){
        $this->validate($request, [
            'Ten' => 'required|min:3|max:100'
        ],[
            'Ten.required' => 'Chưa nhập thể loại',
            'Ten.min' => 'Tên thể loại phải có độ dài từ 3 đến 100',
            'Ten.max' => 'Tên thể loại phải có độ dài từ 3 đến 100'
        ]);
        $theloai = TheLoai::find($id);
        $theloai -> Ten = $request->Ten;
        $theloai -> TenKhongDau = create_slug($request -> Ten);
        $theloai->save();
        return redirect('admin/theloai/danhsach') ->with('thongbao','Đã chỉnh sửa thành công');
    }
    public function getThem(){
        return view('admin.theloai.them');
    }
    public function postThem(Request $request){
        //echo $request->tentheloai;
        $this->validate($request, [
            'Ten' => 'required|min:3|max:100'
        ],[
            'Ten.required' => 'Chưa nhập thể loại',
            'Ten.min' => 'Tên thể loại phải có độ dài từ 3 đến 100',
            'Ten.max' => 'Tên thể loại phải có độ dài từ 3 đến 100'
        ]);
        $theloai = new TheLoai;
        $theloai -> Ten = $request->Ten;
        $theloai -> TenKhongDau = create_slug($request -> Ten);
        $theloai->save();
        return redirect('admin/theloai/them') ->with('thongbao','Thêm thể loại thành công');
    }
    public function getXoa($id){
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach') ->with('thongbao','Đã xóa thành công');
    }
}
