<?php

namespace App\Http\Controllers;

use App\Pcr;
use App\TestNhanh;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PcrController extends Controller
{
    //
    public function getDanhsach()
    {
        $user_id = Auth::id();
        $pcr =Pcr::whereDate('created_at', Carbon::today())
            ->where('idUser',$user_id)
            ->get();
        return view('lims/pcr/danhsach',['testnhanh'=>$pcr]);
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
    public function getPrint($id){
        $testnhanh = TestNhanh::find($id);
        if($testnhanh->ketqua !=""){
            $testnhanh->dain=1;
            $testnhanh->save();
            $now = Carbon::now();
            $day= $now->day;
            $moth = $now->month;
            $year=$now->year;
            $hour = $now->hour;
            return view('lims/testnhanh/print',['testnhanh'=>$testnhanh,'hour'=>$hour]);
        } else{
            $user_id = Auth::id();
            $testnhanhs =TestNhanh::whereDate('created_at', Carbon::today())
                ->where('idUser',$user_id)
                ->get();
            return view('lims/testnhanh/danhsach',['testnhanh'=>$testnhanhs])->with('thongbao','Chưa nhập kết quả');
        }
    }
}
