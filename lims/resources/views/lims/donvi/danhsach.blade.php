@extends('lims.layouts.master')

@section('title', 'Danh sách nhận mẫu')

@section('sidebar')
    @parent
@endsection

@section('content')
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
    <div class="row">
        <div class="col-ms-12 col-md-6 text-center p-5">
                <a href="lims/nhanmau/danhsach/1"><img width="100" class="img-thumbnail" src="{{asset('image/lims/print/logo_lu.png')}}"> PHÒNG XÉT NGHIỆM LÊ UYÊN </a>
        </div>
        <div class="col-ms-12 col-md-6 text-center p-5">
            <a href="lims/nhanmau/danhsach/2"><img width="100" class="img-thumbnail" src="{{asset('image/lims/print/logo_lu.png')}}"> ĐIỂM PHÚ THỨ </a>
        </div>
    </div>
    </div>
@endsection
