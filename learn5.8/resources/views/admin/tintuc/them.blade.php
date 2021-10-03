@extends('admin.layouts.master')

@section('title', 'Thêm tin tức mới')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1>Thêm tin tức mới</h1>
        </div>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        @if(session('loi'))
            <div class="alert alert-danger">
                {{session('loi')}}
            </div>
        @endif
        <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group row">
                <label for="idTheLoai" class="col-4 col-form-label">Thể loại</label>
                <div class="col-8">
                    <select id="idTheLoai" name="idTheLoai" class="custom-select">
                        @foreach($theloai as $tl)
                            <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="idLoaiTin" class="col-4 col-form-label">Loại Tin</label>
                <div class="col-8">
                    <select id="idLoaiTin" name="idLoaiTin" class="custom-select">
                        @foreach($loaitin as $lt)
                            <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="TieuDe" class="col-4 col-form-label">Tiêu đề</label>
                <div class="col-8">
                    <input id="TieuDe" name="TieuDe" placeholder="Nhập tiêu đề" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="TomTat" class="col-4 col-form-label">Tóm tắt</label>
                <div class="col-8">
                    <textarea name="TomTat" id="TomTat" cols="40" rows="5" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="NoiDung" class="col-4 col-form-label">Nội dung</label>
                <div class="col-8">
                    <textarea name="NoiDung" id="NoiDung" cols="30" class="ckeditor" rows="10"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Nổi bật</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="NoiBat" id="NoiBat_0" type="radio" class="custom-control-input" value="1" checked>
                        <label for="NoiBat_0" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="NoiBat" id="NoiBat_1" type="radio" class="custom-control-input" value="0">
                        <label for="NoiBat_1" class="custom-control-label">Không</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Hình ảnh</label>
                <div class="col-8">
                    <input type="file" name="Hinh" id="Hinh">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            //alert('Đã chạy');
            $("#idTheLoai").change(function () {
                var idTheLoai = $(this).val();
                //alert(idTheLoai);
                $.get("admin/ajax/loaitin/" + idTheLoai, function (data) {
                    //alert(data);
                    $("#idLoaiTin").html(data);
                });
            });
        });
    </script>
@endsection
