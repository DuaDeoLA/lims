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
        @if(session('loi'))
            <div class="alert alert-danger">
                {{session('loi')}}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <span>Từ ngày: <input id="from" type="text" class="datepicker"> đến ngày <input id="to" type="text" class="datepicker"></span>
                <button name="btnTimkiem"  id="btnTimkiem" class="btn btn-primary">Tìm kiếm</button>
            </div>
            <div id="list" class="col-sm-12">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed p-5" style="width:100%">
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
                        <th>Hóa đơn</th>
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
                            <td><a href="lims/testnhanh/sua/{{$tn->id}}"><i class="fas fa-edit"></i></a></td>
                            <td><a href="lims/testnhanh/xoa/{{$tn->id}}"><i class="far fa-trash-alt"></i></a></td>
                            <td><a target="_blank" href="lims/testnhanh/print/{{$tn->id}}"><i class="fas fa-print"></i> </a></td>
                            <td><a target="_blank" href="lims/testnhanh/bill/{{$tn->id}}"><i class="fas fa-print"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection
@section('script')
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        $(document).ready(function () {
            $( function() {
                $( ".datepicker" ).datepicker({
                    showButtonPanel: true,
                    dateFormat: 'dd-mm-yy'
                });
            } );
            var table = $('#example').DataTable( {
                paging:false,
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
            } );

            table.buttons().container()
                .appendTo( '#example_wrapper .col-md-6:eq(0)' );
            $('#btnTimkiem').on('click', function() {
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                let from = $('#from').val().toString();
                let to = $('#to').val().toString();
                $.ajaxSetup({
                    url: 'lims/ajax/fromD2D/'+from+'/'+to,
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                    },
                    beforeSend: function() {
                        console.log('searching ...');
                    },
                    complete: function() {
                        console.log('searched');
                    }
                });

                $.ajax({
                    success: function(viewContent) {
                        $('tbody').html(viewContent) // This is where the script calls the printer to print the viwe's content.
                    }
                });
            });
        });
    </script>
@endsection



