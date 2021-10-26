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
            <td><a target="_blank" href="lims/testnhanh/bill/{{$tn->id}}"><i class="fas fa-print"></i> </a></td>
        </tr>
    @endforeach
