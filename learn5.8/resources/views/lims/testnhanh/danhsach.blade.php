@extends('lims.layouts.master')

@section('title', 'Danh sách nhận mẫu')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <div class="row">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Năm sinh</th>
                    <th>Địa chỉ</th>
                    <th>Kết quả</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                    <th>In</th>
                </tr>
                </thead>
                <tbody>
                @foreach($testnhanh as $tn)
                    <tr>
                        <td>{{$tn->id}}</td>
                        <td>{{$tn->Patient->hoten}}</td>
                        <td>{{$tn->Patient->namsinh}}</td>
                        <td>{{$tn->Patient->diachi}}</td>
                        <td>
                            @if($tn->ketqua == 0 && $tn->ketqua != "")
                                <span class="text-success">Âm tính</span>
                            @endif
                            @if($tn->ketqua == 1)
                                <span class="text-danger">Dương tính</span>
                            @endif
                        </td>
                        <td><a href="lims/testnhanh/sua/{{$tn->id}}">Sửa</a></td>
                        <td><a href="lims/testnhanh/xoa">Xóa</a></td>
                        <td><button name="{{$tn->id}}" class="print"> Print </button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.print').on('click', function() {

                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                let id = $(this).attr("name");
                $.ajaxSetup({
                    url: 'lims/ajax/print/'+id,
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                    },
                    beforeSend: function() {
                        console.log('printing ...');
                    },
                    complete: function() {
                        console.log('printed!');
                    }
                });

                $.ajax({
                    success: function(viewContent) {
                        $.print(viewContent); // This is where the script calls the printer to print the viwe's content.
                    }
                });
            });
        });
    </script>
@endsection


