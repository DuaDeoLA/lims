<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả xét nghiệm</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
    <style>@page { size: A5 }</style>
    <style>
        p {
            color: black;
            font-size: 1.2rem;
            text-align: center;
            margin-top: 0pt;
            padding-top: 0;
            margin-bottom: 0pt;
            padding-bottom: 0;
            line-height: 1.2;
        }

        th {
            font-size: 1.4rem;
        }

        td {
            font-size: 1.4rem;
        }

        .hanhchanh {
            padding: 1.4rem;
        }

        .hanhchanh td {
            font-size: 1.4rem;
            padding-bottom: 1em;
        }
        table.table-bordered{
            border:1px solid black;
        }
        table.table-bordered > thead > tr > th{
            border:1px solid black;
        }
        table.table-bordered > tbody > tr > td{
            border:1px solid black;
        }
    </style>
</head>

<body>
<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<div class="container " class="A5">
    <section class="sheet padding-10mm">
        <div class="row pl-5">
            <table>
                <tr>
                    <td><img width="100" src="{{asset('/image/lims/print/logo_lu.png')}}" alt="Logo Lê Uyên"></td>
                    <td>
                        <p style="text-align: center; margin-top: 0pt; padding-top: 0; margin-bottom: 0pt; padding-bottom: 0; line-height: 1.2;">
                            <strong><span style="color: #ff0000; font-size: 1.5em;">PHÒNG XÉT NGHIỆM LÊ UYÊN</span></strong>
                        </p>
                        <p style="text-align: center; margin-top: 0pt; padding-top: 0; margin-bottom: 0pt; padding-bottom: 0; line-height: 1.2;">
                            <span style="color: #000000; font-size: 1em;">Địa chỉ: 229AA Nguyễn Văn Cừ, P.An Bình,Q.Ninh Kiều, TP Cần Thơ</span>
                        </p>
                        <p style="text-align: center; margin-top: 0pt; padding-top: 0; margin-bottom: 0pt; padding-bottom: 0; line-height: 1.2;">
                            <span style="color: #000000; font-size: 1em;"> Điện thoại: 0868.074.115 – 0902.904.587</span>
                        </p>
                        <p style="text-align: center; margin-top: 0pt; padding-top: 0; margin-bottom: 0pt; padding-bottom: 0; line-height: 1.2;">
                            <span style="color: #000000; font-size: 1em;">Email: xetnghiemleuyen@gmail.com</span></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($testnhanh->code, 'C39')}}" alt="barcode" />
                        <p>{{$testnhanh->code}}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <h1>BẢNG KÊ XÉT NGHIỆM</h1>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row hanhchanh">
            <table>
                <tbody>
                <tr>
                    <td>Họ tên: <strong>{{$testnhanh->Patient->hoten}}</strong></td>
                </tr>
                <tr>
                    <td>Năm sinh: {{$testnhanh->Patient->namsinh}}</td>
                    <td>Giới tính:
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
                    <td>Chẩn đoán: Test nhanh covid</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="row pl-5">
            <table id="example" class="table-bordered">
                <thead>
                <tr>
                    <th>STT</th>
                    <th style="padding: 1.2em;">Tên xét nghiệm</th>
                    <th style="padding: 1.2em;">Giá tiền</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td style="padding: 1em;"><strong>Test nhanh kháng nguyên Covid-19</strong></td>
                    <td style="padding-right: 2em;padding-left: 2em;"><strong>150.000 đ</strong></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="row m-5">
            <div class="col-sm-12">
                <p>Cần Thơ, {{ now()->hour }} giờ {{ now()->minute }}phút ngày {{now()->day }} tháng {{now()->month }} năm {{now()->year}}</p>
                <p><strong>Người thu tiền</strong></p>
                <br>
                <br>
                <br>
                <br>
                <p>{{$user_login->name}}</p>
            </div>
        </div>
    </section>
</div>
<script src="{{asset('jqueryPrint/jQuery.print.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $.print('body')
    });
</script>
</body>
</html>
