<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=UTF-8>
    <title>@yield('title')</title>
    <!-- Define default CSS path (you will run into CSS error without this) -->
    <base href="{{ asset('') }}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
</head>
<body>
<!--/header-->
@show
    <div class="container p-5">
        <h1><span class="text-success">HỆ THỐNG TRẢ KẾT QUẢ XÉT NGHIỆM COVID 19</span></h1>
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
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid"
                             alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form method="POST" action="lims/dangnhap">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control form-control-lg"
                                       placeholder="Enter a valid email address" />
                                <label class="form-label" for="form3Example3">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" id="password" name="password" class="form-control form-control-lg"
                                       placeholder="Enter password" />
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
        </section>
    </div>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"> </script>
<script src="{{asset('js/bootstrap.js')}}"> </script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('jqueryPrint/jQuery.print.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@yield('script')
</body>
</html>

