@extends('layouts.default')


@section('content')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Xuất file</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="{{  route('datvemb.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Xuất file</li>
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


{!! Form::open(array('route' => 'datvemb.postExport','method'=>'get')) !!}
<div class="row">
    <div class="card-body">    
        <div class="form-group">
            <strong>Ngày bắt đầu:</strong>
            {!! Form::text('from', null, array('placeholder' => 'Ngày bắt đầu','class' => 'form-control','data-toggle'=>'datepicker','autocomplete'=>'off')) !!}
        </div>
        <div class="form-group">
            <strong>Ngày kết thúc:</strong>
            {!! Form::text('to', null, array('placeholder' => 'Ngày kết thúc','class' => 'form-control','data-toggle'=>'datepicker','autocomplete'=>'off')) !!}
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
{!! Form::close() !!}


@endsection
