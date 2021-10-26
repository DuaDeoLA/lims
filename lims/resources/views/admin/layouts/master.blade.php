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
    <link rel="stylesheet" href="{{asset('/css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('/datatable/datatables.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
</head>
<body>
<!--/header-->
@include("lims.layouts.partial.header")
@section('sidebar')
@show
<div class="container-fluid">
    @yield('content')
</div>
<script src="{{asset('js/admin.js')}}"> </script>
<script src="{{asset('datatable/datatables.js')}}"> </script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('jqueryPrint/jQuery.print.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // $('#example').DataTable();
    } );
</script>
@yield('script')
</body>
</html>
