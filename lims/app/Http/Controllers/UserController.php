<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //Xem danh sách user
    public function getDanhsach(){
        $users = User::all();
        return view('admin.user.danhsach',['users' => $users]);
    }
    //Sửa danh sách user
    public function getSua()
    {

    }
    public function postSua()
    {

    }
    public function getThem(){
        return view('admin.user.them');
    }
    public  function postThem(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $user = new User;
        $user->name= $request->name;
        $user->username =$request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect('admin/user/them')->with('thongbao','Thêm người dùng thành công');
    }
}
