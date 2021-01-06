@extends('layouts.default')


@section('content')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">User Management</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Management</li>
        </ol>
    </div>
    <div class="page-rightheader ml-auto d-lg-flex d-none">
        <div class="btn-group mb-0">
            @can('user-create')
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
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
                 
                 <th>User Name</th>
                 <th>Email</th>
                 <th>Roles</th>
                 <th width="170px">Action</th>
               </tr>
              </thead>
              <tbody>
               @foreach ($data as $key => $user)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    @if(!empty($user->getRoleNames()))
                      @foreach($user->getRoleNames() as $v)
                         <label class="badge badge-success">{{ $v }}</label>
                      @endforeach
                    @endif
                  </td>
                  <td>

                     <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                     @can('user-edit')
                     @if($user->id == Auth::user()->id || $user->hasAnyRole(['Admin']))
                          <button disabled="" class="btn btn-primary">Edit</button>
                          <button disabled="" class="btn btn-danger">Delete</button>
                      @else
                      <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                      {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger show_confirm']) !!}
                        
                      {!! Form::close() !!}
                      @endif
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
