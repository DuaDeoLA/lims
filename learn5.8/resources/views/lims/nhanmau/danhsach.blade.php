@extends('lims.layouts.master')

@section('title', 'Danh sách nhận mẫu')

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
                    <th>Họ tên</th>
                    <th>Năm sinh</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($benhnhan as $bn)
                    <tr>
                        <td>{{$bn->id}}</td>
                        <td>{{$bn->hoten}}</td>
                        <td>{{$bn->namsinh}}</td>
                        <td>{{$bn->diachi}}</td>
                        <td>{{$bn->dienthoai}}</td>
                        <td> <a href="lims/nhanmau/sua/{{$bn->id}}">Sửa</a></td>
                        <td> <a href="lims/nhanmau/xoa/{{$bn->id}}">Xóa</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

