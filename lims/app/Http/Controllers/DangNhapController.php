<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DangNhapController extends Controller
{
    //
    public function getDangNhap(){
        return view('lims.login.login');
    }
    public function postDangNhap(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' =>'required'],
            [ 'email.required' =>'Chưa nhập email',
                'password.required' =>'Chưa nhập password'
        ]);
        if(Auth::attempt(['email' => $request->email,'password'=>$request->password])){
            $user= Auth::user();
            $request->session()->put('idUser', Auth::id());
            if($user->level==1){
                return redirect('lims.donvi.danhsach');
            } else{
                return view('lims.donvi.danhsach');
            }
        } else{
            return  redirect('lims/login')->with('thongbao','Đăng nhập không thành công');
        }
    }
    public function dangxuat(){
        Auth::logout();
        return redirect('lims/dangnhap');
    }
}
