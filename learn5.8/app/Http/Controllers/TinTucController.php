<?php

namespace App\Http\Controllers;

use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    //
    public function getDanhsach()
    {
        $tintuc = TinTuc::orderBy('id','desc')->get();
        return view('admin.tintuc.danhsach', ['tintuc' => $tintuc]);
    }

    public function getThem()
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.them', ['loaitin' => $loaitin, 'theloai' => $theloai]);
    }

    public function postThem(Request $request)
    {
        //echo $request->tentheloai;
        $this->validate($request, [
            'idLoaiTin' => 'required',
            'TieuDe' => 'required|min:3|unique:TinTuc,TieuDe',
            'TomTat' => 'required',
            'NoiDung' => 'required'
        ], [
            'TieuDe.required' => 'Chưa nhập thể loại',
            'TieuDe.unique' => 'Tên này đã tồn tại',
            'TieuDe.min' => 'Tên thể loại phải có độ dài từ 3 đến 100',
            'TieuDe.max' => 'Tên thể loại phải có độ dài từ 3 đến 100',
            'idLoaiTin' => 'Chưa nhập loại tin',
            'TomTat' => 'Chưa nhập tóm tắt',
            'NoiDung' => 'Chưa nhập nội dung'
        ]);
        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = create_slug($request->TieuDe);
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->idLoaiTin = $request->idLoaiTin;
        $tintuc->SoLuotXem = 0;
        $tintuc->NoiBat=$request->NoiBat ;
        if ($request->hasFile('Hinh')) {
            $file = $request->file('Hinh');
            //Lấy tên hình, tạo tên random
            $ext = $file->getClientOriginalExtension();
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                return redirect('admin/tintuc/them')->with('loi', 'Chỉ được up file có định dạng jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4) . "_" . $name;
            //Dùng random lại cho hết trùng
            while (file_exists('upload/tintuc' . $Hinh)) {
                $Hinh = str_random(4) . "_" . $Hinh;
            }
            //Lưu File
            $file->move('upload/tintuc', $Hinh);
            $tintuc->Hinh = $Hinh;
            //  echo $Hinh;
        } else {
            $tintuc->Hinh = "";
        }
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao', 'Bạn đã thêm tin tức thành công');

    }

    public function getSua($id){
        $tintuc = TinTuc::find($id);
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('admin/tintuc/sua',['tintuc'=> $tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    public function postSua(Request $request,$id){
        //echo $request->tentheloai;
        $this->validate($request, [
            'idLoaiTin' => 'required',
            'TieuDe' => 'required|min:3',
            'TomTat' => 'required',
            'NoiDung' => 'required'
        ], [
            'TieuDe.required' => 'Chưa nhập thể loại',
            'TieuDe.min' => 'Tên thể loại phải có độ dài từ 3 đến 100',
            'TieuDe.max' => 'Tên thể loại phải có độ dài từ 3 đến 100',
            'idLoaiTin' => 'Chưa nhập loại tin',
            'TomTat' => 'Chưa nhập tóm tắt',
            'NoiDung' => 'Chưa nhập nội dung'
        ]);
        $tintuc = TinTuc::find($id);
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = create_slug($request->TieuDe);
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->idLoaiTin = $request->idLoaiTin;
        $tintuc->NoiBat = $request->NoiBat;
        if ($request->hasFile('Hinh')) {
            $file = $request->file('Hinh');
            //Lấy tên hình, tạo tên random
            $ext = $file->getClientOriginalExtension();
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                return redirect('admin/tintuc/them')->with('loi', 'Chỉ được up file có định dạng jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4) . "_" . $name;
            //Dùng random lại cho hết trùng
            while (file_exists('upload/tintuc' . $Hinh)) {
                $Hinh = str_random(4) . "_" . $Hinh;
            }
            //Lưu File
            $file->move('upload/tintuc', $Hinh);
            //Unlink
            unlink('upload/tintuc'.$tintuc->Hinh);
            $tintuc->Hinh = $Hinh;
            //  echo $Hinh;
        }
        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao', 'Đã chỉnh sửa thành công');
    }
    public function getXoa($id){
        $tintuc = TinTuc::find($id);
        $tintuc->delete();
       return redirect('admin/tintuc/danhsach')->with('thongbao','Đã xóa thành công');
    }
}
