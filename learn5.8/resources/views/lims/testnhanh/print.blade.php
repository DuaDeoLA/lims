<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả xét nghiệm</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <style>
        p{
            font-size: 1rem;
            text-align: center;
            margin-top: 0pt;
            padding-top: 0;
            margin-bottom: 0pt;
            padding-bottom: 0;
            line-height: 1.2;
        }
    </style>
</head>

<body>
<div class="container ">
    <div class="row justify-content-center">
        <table>
            <tr>
                <td><img  width="150" src="{{asset('/image/lims/print/logo_lu.png')}}" alt="Logo Lê Uyên"></td>
                <td>
                    <p style="text-align: center; margin-top: 0pt; padding-top: 0; margin-bottom: 0pt; padding-bottom: 0; line-height: 1.2;">
                        <strong><span style="color: #ff0000; font-size: 18pt;">PHÒNG XÉT NGHIỆM LÊ UYÊN</span></strong></p>
                    <p style="text-align: center; margin-top: 0pt; padding-top: 0; margin-bottom: 0pt; padding-bottom: 0; line-height: 1.2;">
                        <span style="color: #000000; font-size: 13pt;">Địa chỉ: 229AA Nguyễn Văn Cừ, P.An Bình,Q.Ninh Kiều, TP Cần Thơ</span> </p>
                    <p style="text-align: center; margin-top: 0pt; padding-top: 0; margin-bottom: 0pt; padding-bottom: 0; line-height: 1.2;">  <span style="color: #000000; font-size: 13pt;"> Điện thoại: 0868.074.115 – 0902.904.587</span></p>
                    <p style="text-align: center; margin-top: 0pt; padding-top: 0; margin-bottom: 0pt; padding-bottom: 0; line-height: 1.2;">
                        <span style="color: #000000; font-size: 13pt;">Email: xetnghiemleuyen@gmail.com</span> <span style="display: inline-block; height: 1em;"><span style="display: none;">.</span></span></p>
                </td>
            </tr>
        </table>
    </div>
    <div class="row">
        <table>
            <tbody>
            <tr>
                <td width="200px"><p></p> Họ tên: {{$testnhanh->Patient->hoten}}</td>
                <td width="200px">Năm sinh: {{$testnhanh->Patient->namsinh}}</td>
                <td width="200px">Giới tinh:
                    @if($testnhanh->Patient->gioitinh == 1)
                        Nam
                    @else
                        Nữ
                    @endif
                </td>
            </tr>
            <tr>
                <td>Địa chỉ: {{$testnhanh->Patient->diachi}}</td>
            </tr>
            <tr>
                <td>Điện thoại: {{$testnhanh->Patient->dienthoai}}</td>
            </tr>
            <tr>
                <td>Loại mẫu: Dịch tỵ hầu</td>
            </tr>
            </tbody>
        </table>
    </div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên xét nghiệm</th>
            <th>Kết quả</th>
            <th>Đơn vị</th>
            <th>Trị số bình thường</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Test nhanh kháng nguyên Sars-cov-2</td>
            <td>{{$testnhanh->ketqua}}</td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>

</body>

</html>
