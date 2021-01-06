@extends('layouts.default')


@section('content')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Show Role {{ $role->name }}</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item" ><a href="{{ route('roles.index') }}">Role Management</a></li>
            <li class="breadcrumb-item active" aria-current="page">Show Role {{ $role->name }}</li>
        </ol>
    </div>
   
</div>


<div class="row">
    <div class="card-body">    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }},</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@endsection