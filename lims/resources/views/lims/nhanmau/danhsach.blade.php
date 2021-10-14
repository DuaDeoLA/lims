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
            <div class="col-sm-12">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed p-5" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Năm sinh</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($benhnhan as $bn)
                        <tr>
                            <td>{{$bn->id}}</td>
                            <td>{{$bn->hoten}}</td>
                            <td>{{$bn->namsinh}}</td>
                            <td>{{$bn->diachi}}</td>
                            <td>{{$bn->dienthoai}}</td>
                            <td> <a href="lims/nhanmau/sua/{{$bn->id}}"><i class="fas fa-edit"></i></a></td>
                            <td> <a href="lims/nhanmau/xoa/{{$bn->id}}"><i class="far fa-trash-alt"></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
@endsection
@section('script')
<script>
    $('#example').DataTable({
        paging: true
    });
</script>
@endsection
