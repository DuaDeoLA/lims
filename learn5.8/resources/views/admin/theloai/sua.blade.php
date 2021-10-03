@extends('admin.layouts.master')

@section('title', 'Đây là title của trang')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1>Chỉnh sửa thể loại {{$theloai->Ten}}</h1>
        </div>
        <form action="admin/theloai/sua/{{$theloai->id}}" method="POST">
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
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <label for="Ten" class="col-4 col-form-label">Tên thể loại</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-list"></i>
                            </div>
                        </div>
                        <input id="Ten" name="Ten" type="text" class="form-control" required="required" value="{{$theloai->Ten}}">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </div>
        </form>
    </div>
@endsection
