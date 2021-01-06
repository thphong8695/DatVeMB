@extends('layouts.default')
@section('content') 
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Dashboard</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li>
        </ol>
    </div>
    <div class="page-rightheader ml-auto d-lg-flex d-none">
        <div class="btn-group mb-0">
            <button type="button" class="btn btn-outline-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#"><i class="fa fa-plus mr-2"></i>Add new Page</a>
                <a class="dropdown-item" href="#"><i class="fa fa-eye mr-2"></i>View the page Details</a>
                <a class="dropdown-item" href="#"><i class="fa fa-edit mr-2"></i>Edit Page</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="fa fa-cog mr-2"></i> Settings</a>
            </div>
        </div>
        <div class="ml-3">
            <span class="sparkline_bar mr-2 float-left"></span>
            <span class="float-left border-">
                <span class="mb-0 mt-1 mr-2">2,978</span><small class="mb-0 mr-3">( Visitors )</small>
            </span>
            <span class="sparkline_bar1 mr-2 float-left"></span>
            <span class="float-left">
                <span class="mb-0 mt-1 mr-2">6,453</span><small class="mb-0"> ( Followers )</small>
            </span>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
</div>
@endsection
