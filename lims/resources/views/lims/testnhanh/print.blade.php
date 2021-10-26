<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả xét nghiệm</title>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <style>
        p {
            color: black;
            font-size: 1.4rem;
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
            padding-right: 1em;
            padding-bottom: 1em;
        }
        .footer{
            position: absolute;
            bottom:0;
            width: 100%;
            height: 15%;
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
<div class="container ">
    <div class="row justify-content-center">
        <table>
            <tr>
                <td><img width="200" src="{{asset('/image/lims/print/logo_lu.png')}}" alt="Logo Lê Uyên"></td>
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
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="ml-auto mr-4 p-2 text-center">
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($testnhanh->code, 'C39')}}" alt="barcode" /><br><br>
            <p>{{$testnhanh->code}}</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <table>
            <tr>
                <h1>KẾT QUẢ XÉT NGHIỆM</h1>
            </tr>
        </table>
    </div>
    <div class="row hanhchanh">
        <table>
            <tbody>
            <tr>
                <td>Họ tên: <strong>{{$testnhanh->Patient->hoten}}</strong></td>
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
                <td>Loại mẫu: Dịch tỵ hầu</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <table id="example" class="table table-bordered" style="width:100%;">
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
                <td><strong>Test nhanh kháng nguyên Covid-19</strong></td>
                <td>
                    @if($testnhanh->ketqua== 0 & $testnhanh->ketqua !="")
                        <strong>Âm tính</strong>
                    @endif
                    @if($testnhanh->ketqua== 1)
                        <span class="text-danger">Dương tính</span>
                    @endif
                </td>
                <td></td>
                <td><strong>Âm tính</strong></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <p style="text-align: left">
            *** Lưu ý: Kết quả chỉ có giá trị tại thời điểm xét nghiệm, do đó cần tiếp tục theo dõi diễn tiến bệnh (mệt
            mỏi, khó thở, mất khứu giác, mất vị giác,…) Thực hiện các biện pháp phòng dịch, tuân thủ 5K theo quy định.
            Kết quả test nhanh chỉ có giá trị sàng lọc ban đầu Covid-19
        </p>
    </div>
    <div class="footer">
        <div class="row">
            <div class="ml-auto mr-4 p-2 text-center">
                <p>Cần Thơ, {{ now()->hour }} giờ {{ now()->minute }}phút ngày {{now()->day }} tháng {{now()->month }} năm {{now()->year}}</p>
                <p><strong>Người thực hiện</strong></p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <p>{{$user_login->name}}</p>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('jqueryPrint/jQuery.print.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $.print('body')
    });
</script>
</body>
</html>
