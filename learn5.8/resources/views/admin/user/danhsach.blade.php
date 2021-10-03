@extends('admin.layouts.master')

@section('title', 'Danh sách người dùng')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <div class="row">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên người dùng</th>
                    <th>Tên đăng nhập</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>

                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->level}}</td>
                        <td> <a href="admin/user/sua/{{$user->id}}">Sửa</a></td>
                        <td> <a href="admin/user/xoa/{{$user->id}}">Xóa</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

