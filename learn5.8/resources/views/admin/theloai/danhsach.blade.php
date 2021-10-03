@extends('admin.layouts.master')

@section('title', 'Đây là title của trang')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Tên không dấu</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($theloai as $tl)
                <tr>
                    <td>{{$tl->id}}</td>
                    <td>{{$tl->Ten}}</td>
                    <td>{{$tl->TenKhongDau}}</td>
                    <td> <a href="admin/theloai/sua/{{$tl->id}}">Sửa</a> </td>
                    <td> <a href="admin/theloai/xoa/{{$tl->id}}">Xóa</a> </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
