<?php

namespace App\Http\Controllers;

use App\TestNhanh;
use Illuminate\Http\Request;

class TestNhanhController extends Controller
{
    //
    public function getDanhsach()
    {
        $testnhanh = TestNhanh::all();
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
}
