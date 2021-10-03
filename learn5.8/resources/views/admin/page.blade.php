@extends('admin.layouts.master')

@section('title', 'Đây là title của trang')

@section('sidebar')
    @parent
@endsection

@section('content')
    <p>Đây là phần hiển thị nội dung chính của trang</p>
@endsection
