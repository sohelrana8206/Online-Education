@extends('templates/backend_master')
@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Permission Add</span> Form</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{route('permissions.index')}}" class="btn btn-info"><i class="fa fa-list"></i> Permission List</a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li><a href="{{route('permissions.index')}}">Permission List</a></li>
                <li class="active">Permission Add Form</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <!-- Vertical form options -->
        <div class="row">
            <div class="col-md-12">

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

                <!-- Basic layout-->
                <form method="post" action="{{route('permissions.store')}}">
                    @csrf
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Permission Add Form</h5>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label>Permission Name</label>
                                <input type="text" class="form-control" name="permission_name" placeholder="Permission Name">
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Add Permission <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /basic layout -->

            </div>
        </div>
        <!-- /vertical form options -->

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection
