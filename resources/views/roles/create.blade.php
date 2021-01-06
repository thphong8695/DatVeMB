@extends('layouts.default')


@section('content')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Create Role </h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item" ><a href="{{ route('roles.index') }}">Role Management</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Role</li>
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


{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="card-body">    
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            <div class="row">
                @foreach($permission as $value)
                <div class="col-md-4">
                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                    {{ $value->name }}</label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
{!! Form::close() !!}

@endsection