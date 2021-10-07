<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=UTF-8>
    <title>@yield('title')</title>
    <!-- Define default CSS path (you will run into CSS error without this) -->
    <base href="{{ asset('') }}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
</head>
<body>
<!--/header-->
@show
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-12 p-2">
            <h1><span class="text-success">ĐĂNG NHẬP HỆ THỐNG</span></h1>
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
        </div>
    </div>

    <div class="row p-5">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 text-center">
            <img src="{{asset('/image/lims/print/logo_lu.png')}}"
                 class="img-fluid"
                 alt="Logo">
        </div>
        <div class=" card col-xs-12 col-sm-12 col-md-12 col-lg-8 p-5">
            <form method="POST" action="lims/dangnhap">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                           placeholder="Nhập địa chỉ email"/>
                    <label class="form-label" for="email">Địa chỉ email</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <input type="password" id="password" name="password"
                           class="form-control form-control-lg"
                           placeholder="Nhập mật khẩu"/>
                    <label class="form-label" for="form3Example4">Password</label>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Đăng nhập') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('jqueryPrint/jQuery.print.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
@yield('script')
</body>
</html>

