@extends('layouts.default')


@section('content')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Hãng Bay Management</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Hãng Bay Management</li>
        </ol>
    </div>
    <div class="page-rightheader ml-auto d-lg-flex d-none">
        <div class="btn-group mb-0">
            @can('hangbay-create')
                <a class="btn btn-success" href="{{ route('hangbay.create') }}"> Create New Hãng Bay</a>
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
                     <th>Slug</th>
                     <th width="150px">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($hangbay as $key => $value)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->slug }}</td>
                    <td>
                        @can('hangbay-edit')
                            <a class="btn btn-primary" href="{{ route('hangbay.edit',$value->id) }}">Edit</a>
                        @endcan
                        @can('hangbay-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['hangbay.destroy', $value->id],'style'=>'display:inline']) !!}
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