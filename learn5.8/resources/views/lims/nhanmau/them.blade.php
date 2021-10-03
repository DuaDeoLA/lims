@extends('lims.layouts.master')

@section('title', 'Thêm tin tức mới')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <form action="lims/nhanmau/them" method="POST" enctype="multipart/form-data">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </div>
            @endif
            @if(session('loi'))
                <div class="alert alert-danger">
                    {{session('loi')}}
                </div>
            @endif
            <h3>Phần thông tin hành chính</h3>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group row">
                <label for="hoten" class="col-4 col-form-label">Họ và tên</label>
                <div class="col-8">
                    <input id="hoten" name="hoten" placeholder="Họ và tên" type="text" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="namsinh" class="col-4 col-form-label">Năm sinh</label>
                <div class="col-8">
                    <input id="namsinh" name="namsinh" placeholder="Nhập số" type="text" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Giới tính</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="gioitinh" id="gioitinh_0" type="radio" class="custom-control-input" value="1">
                        <label for="gioitinh_0" class="custom-control-label">Nam</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="gioitinh" id="gioitinh_1" type="radio" class="custom-control-input" value="0">
                        <label for="gioitinh_1" class="custom-control-label">Nữ</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="diachi" class="col-4 col-form-label">Địa chỉ</label>
                <div class="col-8">
                    <textarea id="diachi" name="diachi" cols="40" rows="5" class="form-control" aria-describedby="diachiHelpBlock"></textarea>
                    <span id="diachiHelpBlock" class="form-text text-muted">Nhập địa chỉ</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="text" class="col-4 col-form-label">Số điện thoại</label>
                <div class="col-8">
                    <input id="dienthoai" name="dienthoai" placeholder="Nhập số điện thoại" type="text" class="form-control">
                </div>
            </div>

<h3>Phần khai báo y tế</h3>
            <div class="form-group row">
                <label for="lichsu14" class="col-4 col-form-label">Trong vòng 14 ngày qua, anh chị có đến tỉnh/Thành Phố, quốc Gia/Vùng lãnh thổ (Có thể đi nhiều nơi khác)</label>
                <div class="col-8">
                    <textarea id="lichsu14" name="lichsu14" cols="40" rows="5" class="form-control">Không có</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Có XUẤT HIỆN ít nhất 1 trong các dấu hiệu sau: sốt,ho,khó thở,viêm phổi,đau họng, mệt mỏi không?</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="trieuchung" id="trieuchung_0" type="radio" class="custom-control-input" value="1">
                        <label for="trieuchung_0" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input checked name="trieuchung" id="trieuchung_1" type="radio" class="custom-control-input" value="0">
                        <label for="trieuchung_1" class="custom-control-label">Không</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4"> Có TIẾP XÚC với người bệnh hoặc nghi ngờ, mắc bệnh COVID-19</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="tiepxuccovid" id="tiepxuccovid_0" type="radio" class="custom-control-input" value="1">
                        <label for="tiepxuccovid_0" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input checked name="tiepxuccovid" id="tiepxuccovid_1" type="radio" class="custom-control-input" value="0">
                        <label for="tiepxuccovid_1" class="custom-control-label">Không</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Có TIẾP XÚC với người có biểu hiện (Sốt, ho, khó thở, Viêm Phổi)</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="tiepxuctc" id="tiepxuctc_0" type="radio" class="custom-control-input" value="1">
                        <label for="tiepxuctc_0" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input checked name="tiepxuctc" id="tiepxuctc_1" type="radio" class="custom-control-input" value="0">
                        <label for="tiepxuctc_1" class="custom-control-label">Không</label>
                    </div>
                </div>
            </div>
            <h3>Chọn dịch vụ</h3>
            <div class="form-group row">
                <label class="col-4">Test nhanh Covid19</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="testnhanh" id="testnhanh_0" type="radio" class="custom-control-input" value="1">
                        <label for="testnhanh_0" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input checked name="testnhanh" id="testnhanh_1" type="radio" class="custom-control-input" value="0">
                        <label for="testnhanh_1" class="custom-control-label">Không</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">PCR Covid19</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="pcrcovid" id="pcrcovid_0" type="radio" class="custom-control-input" value="1">
                        <label for="pcrcovid_0" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input checked name="pcrcovid" id="pcrcovid_1" type="radio" class="custom-control-input" value="0">
                        <label for="pcrcovid_1" class="custom-control-label">Không</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Xét nghiệm thường quy</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="xnthuongquy" id="xnthuongquy_0" type="radio" class="custom-control-input" value="1">
                        <label for="xnthuongquy_0" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input checked name="xnthuongquy" id="xnthuongquy_1" type="radio" class="custom-control-input" value="0">
                        <label for="xnthuongquy_1" class="custom-control-label">Không</label>
                    </div>
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
