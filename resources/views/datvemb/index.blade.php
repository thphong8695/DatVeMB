@extends('layouts.default')


@section('content')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Đặt vé Management</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đặt vé Management</li>
        </ol>
    </div>
    
</div>
<div class="row">
    <div class="card">
        <div class="card-body">
            {!! Form::open(array('route' => 'datvemb.store','method'=>'post','id'=>'formDVMB')) !!}

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 mt-2" >Ngày bắt đầu</label>
                            {!! Form::text('from', app('request')->input('from'), array('placeholder' => 'Ngày bắt đầu','class' => 'form-control url_params col-md-9','id'=>'datepickerFrom')) !!}
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 mt-2">Ngày hiện tại</label>
                            {!! Form::text('to', app('request')->input('to'), array('placeholder' => 'Ngày hiện tại','class' => 'form-control url_params col-md-9','id'=>'datepickerTo')) !!}
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 mt-2">SĐT gọi lên</label>
                            {!! Form::text('sdt_goilen', app('request')->input('sdt_goilen'), array('placeholder' => 'Số điện thoại gọi lên','class' => 'form-control url_params  col-md-9','id'=>'sdt_goilen')) !!}
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
                            {!! Form::text('sdt_lienhe', app('request')->input('sdt_lienhe'), array('placeholder' => 'Số điện thoại liên hệ','class' => 'form-control url_params col-md-9','id'=>'sdt_lienhe')) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 mt-2">Hãng bay</label>
                            {!! Form::select('hangbay_id',$hangbay,app('request')->input('hangbay_id'),['class'=>'form-control url_params col-md-9','id'=>'hangbay_id','placeholder'=>'Chọn Hãng bay']) !!}
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
                            {!! Form::select('loaive',['Một chiều' => 'Một chiều','Khứ hồi'=>'Khứ hồi'],app('request')->input('loaive'),['class'=>'form-control url_params col-md-9','id'=>'loaive','placeholder'=>'Chọn loại vé']) !!}
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
                            {!! Form::select('soluong_nguoilon',$soluong,app('request')->input('soluong_nguoilon'),['class'=>'form-control url_params col-md-7','id'=>'soluong_nguoilon','placeholder'=>'Chọn số lượng']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-5 mt-2">Trẻ em 2 - 12 tuổi</label>
                            {!! Form::select('soluong_treem',$soluong,app('request')->input('soluong_treem'),['class'=>'form-control url_params col-md-7','id'=>'soluong_treem','placeholder'=>'Chọn số lượng']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 mt-2">Trẻ em < 2</label>
                            {!! Form::select('soluong_embe',$soluong,app('request')->input('soluong_embe'),['class'=>'form-control url_params col-md-9','id'=>'soluong_embe','placeholder'=>'Chọn số lượng']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 mt-2">Mã đặt chổ</label>
                            {!! Form::text('madatcho', app('request')->input('madatcho'), array('placeholder' => 'Mã đặt chổ','class' => 'form-control url_params col-md-9','id'=>'madatcho')) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 mt-2">TK thanh toán</label>
                            {!! Form::text('taikhoanthanhtoan', app('request')->input('taikhoanthanhtoan'), array('placeholder' => 'Tài khoản thanh toán','class' => 'form-control url_params col-md-9','id'=>'taikhoanthanhtoan')) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 mt-2">Tên khách hàng</label>
                            {!! Form::text('tenkhachhang', app('request')->input('tenkhachhang'), array('placeholder' => 'Tên khách hàng','class' => 'form-control url_params col-md-9','id'=>'tenkhachhang')) !!}
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
                            {!! Form::select('tinhtrangve',['Bình thường' => 'Bình thường','Hot/Vip'=>'Hot/Vip'],app('request')->input('tinhtrangve'),['class'=>'form-control url_params col-md-9','placeholder'=>'Chọn tình trạng','id'=>'tinhtrangve']) !!}
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
                            {!! Form::textarea('thongtinkhac', app('request')->input('thongtinkhac'), ['class'=>'form-control url_params col-md-10 mr-auto','id'=>'thongtinkhac', 'rows' => 2,'placeholder'=>'Thông tin khác']) !!}
                        </div>

                    </div>
                </div>

                
            </div>
            <div class="text-center">
                <button type="submit" id='searchDatVe' class="btn btn-success">Tìm kiếm</button>
                @can('datvemb-create')
                    <button type="submit" class="btn btn-info">Thêm mới</button>
                @endcan
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" >
                    <thead>
                      <tr>
                         <th>No</th>
                         <th>Thời gian đặt</th>
                         <th>Tên khách hàng</th>
                         <th>SĐT gọi lên</th>
                         <th>SĐT liên hệ</th>
                         <th>Hãng bay</th>
                         <th>Tình trạng vé</th>
                         <th>Trạng thái</th>
                         <th width="170px">Action</th>
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
                        <td>{{ $value->sdt_lienhe}}</td>
                        <td>
                            @if($value->HangBay)
                                {{ $value->HangBay->name }}
                            @endif
                        </td>
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
                        <td>
                            @can('datvemb-list')
                                <button class="btn btn-primary" data-id="{{ $value->id }}" id="editDatVe">Chi tiết</button>
                            @endcan
                            @can('datvemb-updatett')
                            <a class="btn btn-info" href="{{ route('datvemb.edit',$value->id) }}">Edit</a>
                        @endcan
                            @can('datvemb-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['datvemb.destroy', $value->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger show_confirm']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $datvemb->links() }}
            </div>
        </div>
    </div>
</div>
<!-- Large Modal -->
<div id="EditModal" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header pd-x-20">
                <h6 class="modal-title">Thông tin đặt vé</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(array('route' => 'datvemb.updateModal','method'=>'post','id'=>'formDVMB')) !!}
            <div class="modal-body pd-20">
                
                <div class="row">
                    <input type="hidden" name="id" id="id_modal">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4">SĐT gọi lên</label>
                                <span class="col-md-8" id="sdt_goilen_modal"></span>
                               
                            </div>
                         </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4" >SĐT liên hệ</label>
                                <span class="col-md-8" id="sdt_lienhe_modal"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4">Hãng bay</label>
                                <span class="col-md-8" id="hangbay_id_modal"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4">Loại vé</label>
                                <span class="col-md-8" id="loaive_modal"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-6">Người lớn</label>
                                <span class="col-md-6" id="soluong_nguoilon_modal"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-6">Trẻ em 2 - 12 tuổi</label>
                                <span class="col-md-6" id="soluong_treem_modal"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-6">Trẻ em < 2</label>
                                <span class="col-md-6" id="soluong_embe_modal"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4">Mã đặt chổ</label>
                                <span class="col-md-8" id="madatcho_modal"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4">Tài khoản thanh toán</label>
                                <span class="col-md-8" id="taikhoanthanhtoan_modal"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4">Tên khách hàng</label>
                                <span class="col-md-8" id="tenkhachhang_modal"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4">Tình trạng vé</label>
                                <span class="col-md-8" id="tinhtrangve_modal"></span>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="thongtinkhac_modal" disabled="" rows="2"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Lịch sử trao đổi</label>
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <textarea class="form-control" id="lichsutraodoi_modal" disabled="" rows="3"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    @canany(['datvemb-edit', 'datvemb-updatett'])
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nội dung trao đổi</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" name="lichsutraodoi" rows="2"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endcanany
                    @can('datvemb-edit')
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Kết quả</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control" id="ketqua_modal" name="ketqua">
                                        <option value="Mới nhập">Mới nhập</option>
                                        <option value="Chờ xử lý">chờ xử lý</option>
                                        <option value="ok">OK</option>
                                        <option value="nok">NOK</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endcan
                    
                </div>
                
            </div><!-- modal-body -->
            <div class="modal-footer">
                @canany(['datvemb-edit', 'datvemb-updatett'])
                    <button type="submit" class="btn btn-primary">Save changes</button>
                @endcanany
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
@endsection
@include('datvemb.ajax')
