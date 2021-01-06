@extends('layouts.default')


@section('content')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Profile</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </div>
   
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Có lỗi!</strong> Bạn chưa nhập đầy đủ thông tin hoặc sai định dạng.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<!-- END PAGE BREADCRUMBS -->
<!-- BEGIN PAGE CONTENT INNER -->

<!-- Row -->
<div class="row">
    <div class="col-xl-3 col-lg-5 col-md-12">
        <div class="card ">
            <div class="card-body">
                <div class="inner-all">
                    <ul class="list-unstyled">
                        
                        <li class="text-center">
                            <h4 class="text-capitalize mt-3 mb-0">{{ $profile->name }}</h4>
                            <p class="text-muted text-capitalize">
                            @if(!empty($profile->getRoleNames()))
                                @foreach($profile->getRoleNames() as $v)
                                   <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                              @endif
                            </p>
                            <p class="text-muted text-capitalize">
                                {{ $profile->email }}
                            </p>
                            <p class="text-muted text-capitalize">
                                {{ $profile->phone }}
                            </p>
                        </li>
                       
                       
                    </ul>
                </div>
            </div>
        </div>

    </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
    <div class="col-xl-9 col-lg-7 col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-pane active">
                            <form role="form" action="{{route('profile.update')}}" method="post" enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" placeholder="Họ & tên" class="form-control" value="{{$profile->username}}" readonly="" name="username" /> 
                                </div>
                                <div class="form-group">
                                    <label>Họ & tên</label>
                                    <input type="text" placeholder="Họ & tên" class="form-control" value="{{$profile->name}}" name="name" /> 
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" placeholder="Email" class="form-control" value="{{$profile->email}}" name="email" /> 
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" placeholder="số điện thoại" name="phone" value="{{$profile->phone}}" class="form-control" /> 
                                </div>
                                

                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" name="password"  /> 
                                </div>
                                <div class="form-group">
                                    <label>Re-type New Password</label>
                                    <input type="password" class="form-control" name="confirm-password"   /> 
                                </div>
                               

                                <div class="margiv-top-10">
                                    <button class="btn btn-success" type="submit">Thay đổi</button>
                                    <button class="btn btn-secondary" type="reset">Xóa</button>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- END PROFILE CONTENT -->
    </div>


@endsection
@section('script')

@endsection

