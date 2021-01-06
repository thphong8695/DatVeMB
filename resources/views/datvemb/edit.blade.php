@extends('layouts.default')


@section('content')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Edit Đặt vé</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item" ><a href="{{ route('datvemb.index') }}">Đặt vé Management</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Đặt vé</li>
        </ol>
    </div>
   
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


{!! Form::model($datvemb, ['method' => 'PATCH','route' => ['datvemb.update', $datvemb->id]]) !!}
<div class="row">
    <div class="card-body">    
        <div class="row">
            
            <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3 mt-2">SĐT gọi lên</label>
                        {!! Form::text('sdt_goilen', null, array('placeholder' => 'Số điện thoại gọi lên','class' => 'form-control url_params  col-md-9','id'=>'sdt_goilen')) !!}
                        @error('sdt_goilen')
                            <span class="col-md-9 ml-auto" style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                 </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3 mt-2">SĐT liên hệ</label>
                        {!! Form::text('sdt_lienhe', null, array('placeholder' => 'Số điện thoại liên hệ','class' => 'form-control url_params col-md-9','id'=>'sdt_lienhe')) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3 mt-2">Hãng bay</label>
                        {!! Form::select('hangbay_id',$hangbay,null,['class'=>'form-control url_params col-md-9','id'=>'hangbay_id','placeholder'=>'Chọn Hãng bay']) !!}
                        @error('hangbay_id')
                            <span class="col-md-9 ml-auto" style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3 mt-2">Loại vé</label>
                        {!! Form::select('loaive',['Một chiều' => 'Một chiều','Khứ hồi'=>'Khứ hồi'],null,['class'=>'form-control url_params col-md-9','id'=>'loaive','placeholder'=>'Chọn loại vé']) !!}
                        @error('loaive')
                            <span class="col-md-9 ml-auto" style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-5 mt-2">Người lớn</label>
                        {!! Form::select('soluong_nguoilon',$soluong,null,['class'=>'form-control url_params col-md-7','id'=>'soluong_nguoilon','placeholder'=>'Chọn số lượng']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-5 mt-2">Trẻ em 2 - 12 tuổi</label>
                        {!! Form::select('soluong_treem',$soluong,null,['class'=>'form-control url_params col-md-7','id'=>'soluong_treem','placeholder'=>'Chọn số lượng']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3 mt-2">Trẻ em < 2</label>
                        {!! Form::select('soluong_embe',$soluong,null,['class'=>'form-control url_params col-md-9','id'=>'soluong_embe','placeholder'=>'Chọn số lượng']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3 mt-2">Mã đặt chổ</label>
                        {!! Form::text('madatcho', null, array('placeholder' => 'Mã đặt chổ','class' => 'form-control url_params col-md-9','id'=>'madatcho')) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3 mt-2">TK thanh toán</label>
                        {!! Form::text('taikhoanthanhtoan', null, array('placeholder' => 'Tài khoản thanh toán','class' => 'form-control url_params col-md-9','id'=>'taikhoanthanhtoan')) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3 mt-2">Tên khách hàng</label>
                        {!! Form::text('tenkhachhang', null, array('placeholder' => 'Tên khách hàng','class' => 'form-control url_params col-md-9','id'=>'tenkhachhang')) !!}
                        @error('tenkhachhang')
                            <span class="col-md-9 ml-auto" style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3 mt-2">Tình trạng vé</label>
                        {!! Form::select('tinhtrangve',['Bình thường' => 'Bình thường','Hot/Vip'=>'Hot/Vip'],null,['class'=>'form-control url_params col-md-9','placeholder'=>'Chọn tình trạng','id'=>'tinhtrangve']) !!}
                        @error('tinhtrangve')
                            <span class="col-md-9 ml-auto" style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2 mt-2">Thông tin khác</label>
                        {!! Form::textarea('thongtinkhac', null, ['class'=>'form-control url_params col-md-10 mr-auto','id'=>'thongtinkhac', 'rows' => 2,'placeholder'=>'Thông tin khác']) !!}
                    </div>

                </div>
            </div>

            
        </div>
  
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
{!! Form::close() !!}


@endsection
