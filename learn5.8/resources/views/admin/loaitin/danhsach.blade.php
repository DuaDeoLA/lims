@extends('admin.layouts.master')

@section('title', 'Đây là title của trang')

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
                        <th>Tên</th>
                        <th>Tên không dấu</th>
                        <th>Thể loại</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($loaitin as $lt)
                    <tr>

                        <td>{{$lt->id}}</td>
                        <td>{{$lt->Ten}}</td>
                        <td>{{$lt->TenKhongDau}}</td>
                        <td>{{$lt->TheLoai->Ten}}</td>
                        <td> <a href="admin/loaitin/sua/{{$lt->id}}">Sửa</a></td>
                        <td> <a href="admin/loaitin/xoa/{{$lt->id}}">Xóa</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Tên không dấu</th>
                        <th>Thể loại</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </tfoot>
                </table>
        </div>
    </div>
@endsection

