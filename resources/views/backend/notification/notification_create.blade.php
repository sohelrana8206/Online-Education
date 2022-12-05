@extends('templates/backend_master')
@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Notification Add</span> Form</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{url('notificationList')}}" class="btn btn-info"><i class="fa fa-list"></i> Notification List</a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li><a href="{{url('notificationList')}}">Notification List</a></li>
                <li class="active">Notification Add Form</li>
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
                    <form style="margin-bottom: 50px" action="{{url('notificationStore')}}" method="post">
                        @csrf
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Notification Add Form</h5>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Notification Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="notification_title" placeholder="Notification Title" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Publish Date<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="publish_date" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Notification For<span class="text-danger">*</span></label>
                                        <select multiple="multiple" data-placeholder="Notification For" name="role_id[]" class="select-icons" required>
                                            <option value="4">Admin</option>
                                            <option value="5">Teacher</option>
                                            <option value="6">Agent</option>
                                            <option value="7">Student</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Notification Details<span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="editor" name="notification_details" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Add Notification <i class="icon-arrow-right14 position-right"></i></button>
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
