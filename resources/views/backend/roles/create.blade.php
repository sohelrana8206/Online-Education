@extends('templates/backend_master')
@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Role Create</span> Form</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{route('roles.index')}}" class="btn btn-info"><i class="fa fa-list"></i> Role List</a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li><a href="{{route('roles.index')}}">Role List</a></li>
                <li class="active">Role Create Form</li>
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
                <form method="post" action="{{route('roles.store')}}">
                    @csrf
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Role Add Form</h5>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label>Role Name</label>
                                <input type="text" class="form-control" name="role_name" placeholder="Permission Name">
                            </div>

                            <h4>Permissions:</h4>

                            <div class="row mb-20">
                                @foreach($permission as $value)
                                    <div class="col-md-3">
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name styled')) }}
                                            {{ $value->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Add Role <i class="icon-arrow-right14 position-right"></i></button>
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
