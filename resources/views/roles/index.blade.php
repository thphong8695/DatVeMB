@extends('layouts.default')


@section('content')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Role Management</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Role Management</li>
        </ol>
    </div>
    <div class="page-rightheader ml-auto d-lg-flex d-none">
        <div class="btn-group mb-0">
            @can('role-create')
                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>
        
    </div>
</div>

<div class="row">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                  <tr>
                     <th>No</th>
                     <th>Name</th>
                     <th width="280px">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                        @endcan
                        @can('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger show_confirm']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




@endsection