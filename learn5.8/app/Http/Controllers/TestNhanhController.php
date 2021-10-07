<?php

namespace App\Http\Controllers;

use App\TestNhanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestNhanhController extends Controller
{
    //
    public function getDanhsach()
    {
        $testnhanh = TestNhanh::orderBy('id','desc')->get();;
        return view('lims/testnhanh/danhsach',['testnhanh'=>$testnhanh]);
    }

    public function getSua($id){
        $testnhanh= TestNhanh::find($id);
        return view('lims/testnhanh/sua',['testnhanh'=>$testnhanh]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request, [
            'ketqua'=>'required'
        ]);
        $testnhanh= TestNhanh::find($id);
        $testnhanh->ketqua = $request->ketqua;
        $testnhanh->save();
        return redirect('lims/testnhanh/danhsach')->with('thanhcong','Cập nhật kết quả thành công');
    }
    public function getXoa($id){
        $testnhanh = TestNhanh::find($id);
        if(isset($testnhanh->ketqua)){
            if(Auth::user()->level ==1){
                $testnhanh->delete();
                return redirect('lims/testnhanh/danhsach')->with('thongbao','Đã xóa thành công');
            } else{
                return redirect('lims/testnhanh/danhsach')->with('thongbao','Đã nhập kết quả không được xóa, liên hệ admin');
            }
        } else{
            $testnhanh->delete();
            return redirect('lims/testnhanh/danhsach')->with('thongbao','Đã xóa thành công');
        }
    }
}
