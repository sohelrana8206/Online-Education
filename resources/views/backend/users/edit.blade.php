@extends('templates/backend_master')
@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User Edit</span> Form</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{route('users.index')}}" class="btn btn-info"><i class="fa fa-list"></i> User List</a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li><a href="{{route('users.index')}}">User List</a></li>
                <li class="active">User Edit Form</li>
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
                    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">User Edit Form</h5>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" value="{{$user->name}}" name="name" placeholder="User Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="{{$user->email}}" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Role</label>
                                        {!! Form::select('roles', $roles,$userRole, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Update User <i class="icon-arrow-right14 position-right"></i></button>
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
