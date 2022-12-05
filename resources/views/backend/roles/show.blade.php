@extends('templates/backend_master')
@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Role</span> Details</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a class="btn btn-success btn-sm" href="{{route('roles.index')}}">Back <i class="fa fa-share"></i></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li><a href="{{route('roles.index')}}">Role list</a></li>
                <li class="active">Role Details</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <!-- Vertical form options -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">Role :: {{$role->name}}</h4>
                    </div>

                    <div class="panel-body">
                        @foreach($rolePermissions as $permissions)
                            <div class="col-md-3">
                                <div class="list-feed font15"><i class="fa fa-check"></i> {{$permissions->name}}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /vertical form options -->

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection
