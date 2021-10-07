<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Define default CSS path (you will run into CSS error without this) -->
    <base href="{{ asset('') }}">
    <style>
        .example_wrapper{
            width: 100%;
        }
    </style>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/dataTables.bootstrap4.min.css')}}">
</head>
<body>
<!--/header-->
@include("lims.layouts.partial.header")
@section('sidebar')
@show
<div class="container-fluid">
    @yield('content')
</div>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"> </script>
<script src="{{asset('js/bootstrap.js')}}"> </script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
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
