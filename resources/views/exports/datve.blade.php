<html>

<body>

<table style="font-family: 'Times New Roman', Times, serif; ">
    <thead>
        <tr>
            <th colspan="10" >DANH SÁCH ĐẶT VÉ:</th>
        </tr>
        <tr>
            <th colspan="10" >
                @if($from < $to)   
                    Từ {{date('d-m-Y',strtotime($from))}} đến {{date('d-m-Y',strtotime($to))}}
                @else
                    Từ {{date('d-m-Y',strtotime($to))}} đến {{date('d-m-Y',strtotime($from))}}
                @endif
            </th>
        </tr>
    </thead>
   
</table>

<table class="table table-striped table-bordered" >
    <thead>
      <tr>
         <th>No</th>
         <th>Thời gian đặt</th>
         <th>Tên khách hàng</th>
         <th>SĐT gọi lên</th>
         <th>SĐT liên hệ</th>
         <th>Số lượng người lớn</th>
         <th>Số lượng trẻ em</th>
         <th>Số lượng em bé</th>
         <th>Loại vé</th>
         <th>Hãng bay</th>
         <th>Mã đặt chổ</th>
         <th>Tài khoản thanh toán</th>
         <th>Thông tin khác</th>
         <th>Tình trạng vé</th>
         <th>Trạng thái</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($datvemb as $key => $value)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>
            @if($value->User)
                {{ $value->User->username }}
            @endif
            <br>
            {{ date('d-m-Y H:i a',strtotime($value->thoigiandat)) }}
        </td>
        <td>{{ $value->tenkhachhang }}</td>
        <td>{{ $value->sdt_goilen }}</td>
        <td>{{ $value->sdt_lienhe }}</td>
        <td>{{ $value->soluong_nguoilon }}</td>
        <td>{{ $value->soluong_treem }}</td>
        <td>{{ $value->soluong_embe }}</td>
        <td>{{ $value->loaive }}</td>
        <td>
            @if($value->HangBay)
                {{ $value->HangBay->name }}
            @endif
        </td>
        <td>{{ $value->madatcho }}</td>
        <td>{{ $value->taikhoanthanhtoan }}</td>
        <td>{{ $value->thongtinkhac }}</td>
        <td>{{ $value->tinhtrangve }}</td>
        <td>
            @if($value->ketqua == "Mới nhập")
                <span class="btn btn-primary">{{ $value->ketqua }}</span>
            @elseif($value->ketqua == "Chờ xử lý")
                <span class="btn btn-info">{{ $value->ketqua }}</span>
            @elseif($value->ketqua == "ok") 
                <span class="btn btn-success">OK</span>
            @elseif($value->ketqua == "nok") 
                <span class="btn btn-danger">NOK</span>
            @endif
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

 </body>
