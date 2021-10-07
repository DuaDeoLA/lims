@extends('admin.layouts.master')

@section('title', 'Đây là title của trang')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <h2>Trả kết quả xét nghiệm</h2>
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
            <form action="lims/testnhanh/sua/{{$testnhanh->id}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group row">
                    <label for="" class="col-form-label">Họ và tên: {{$testnhanh->Patient->hoten}}</label>
                </div>
                <div class="form-group row">
                    <label for="" class="col-form-label">Năm sinh: {{$testnhanh->Patient->namsinh}}</label>
                </div>
                <div class="form-group row">
                    <label for="ketqua" class="col-4 col-form-label">Kết quả</label>
                    <div class="col-8">
                        <select id="ketqua" name="ketqua" class="custom-select">
                            <option value="0">Âm tính</option>
                            <option value="1">Dương tính</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary">Trả kết quả</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
