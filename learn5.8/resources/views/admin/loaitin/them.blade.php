@extends('admin.layouts.master')

@section('title', 'Đây là title của trang')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1>THÊM THỂ LOẠI MỚI</h1>
        </div>
        <form action="admin/loaitin/them" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
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
                <div class="form-group row">
                    <label for="Ten" class="col-4 col-form-label">Tên Loại Tin</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-align-justify"></i>
                                </div>
                            </div>
                            <input id="Ten" name="Ten" placeholder="Nhập tên loại tin" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tentheloai" class="col-4 col-form-label">Chọn Thể Loại</label>
                    <div class="col-8">
                        <select id="tentheloai" name="tentheloai" class="custom-select">
                            @foreach($theloai as $tl)
                                <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                            @endforeach
                        </select>
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
