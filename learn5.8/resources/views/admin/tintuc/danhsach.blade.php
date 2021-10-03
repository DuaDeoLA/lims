@extends('admin.layouts.master')

@section('title', 'Danh sác tin tức')

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
                    <th>Tiêu đề</th>
                    <th>Tiêu đề không dấu</th>
                    <th>Tóm tắt</th>
                    <th>Nổi bật</th>
                    <th>Lượt xem</th>
                    <th>Loạt tin</th>
                    <th>Xem</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tintuc as $tt)
                    <tr>
                        <td>{{$tt->id}}</td>
                        <td>{{$tt->TieuDe}}
                            <img width="100%" src="upload/tintuc/{{$tt->Hinh}}">
                        </td>
                        <td>{{$tt->TieuDeKhongDau}}</td>
                        <td>{{$tt->TomTat}}</td>
                        <td>
                            @if($tt->NoiBat ==0)
                                {{'Không'}}
                            @else
                                {{'Có'}}
                            @endif
                        </td>
                        <td>{{$tt->SoLuotXem}}</td>
                        <td>{{$tt->LoaiTin->Ten}}</td>
                        <td><a href="#">Xem</a></td>
                        <td><a href="admin/tintuc/sua/{{$tt->id}}">Sửa</a></td>
                        <td><a href="admin/tintuc/xoa/{{$tt->id}}">Xóa</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Tiêu đề không dấu</th>
                    <th>Tóm tắt</th>
                    <th>Nội dung</th>
                    <th>Nổi bật</th>
                    <th>Lượt xem</th>
                    <th>Loạt tin</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
