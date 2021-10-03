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
@include("admin.partial.header")
@section('sidebar')
@show
<div class="container">
    @yield('content')
</div>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"> </script>
<script src="{{asset('js/bootstrap.js')}}"> </script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@yield('script')
</body>
</html>
