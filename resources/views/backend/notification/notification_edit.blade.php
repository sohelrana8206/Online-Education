@extends('templates/backend_master')
@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Notification Edit</span> Form</h4>
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
                <li class="active">Notification Edit Form</li>
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
                    <form style="margin-bottom: 50px" action="{{url('notificationUpdate/'.$data->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Notification Edit Form</h5>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Notification Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="notification_title" value="{{$data->notification_title}}" placeholder="Notification Title" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Publish Date<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="publish_date" value="{{date('Y-m-d',strtotime($data->publish_date))}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Notification For<span class="text-danger">*</span></label>
                                            <select multiple="multiple" data-placeholder="Notification For" name="role_id[]" class="select-icons" required>
                                                <?php
                                                $roleID = explode(',',$data->role_id)
                                                ?>
                                                    <option @if(in_array(4,$roleID)) {{'selected="selected"'}} @endif value="4">Admin</option>
                                                    <option @if(in_array(5,$roleID)) {{'selected="selected"'}} @endif value="5">Teacher</option>
                                                    <option @if(in_array(6,$roleID)) {{'selected="selected"'}} @endif value="6">Agent</option>
                                                    <option @if(in_array(7,$roleID)) {{'selected="selected"'}} @endif value="7">Student</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Notification Details<span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="notification_details" required><?=$data->notification_details?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary">Update Notification <i class="icon-arrow-right14 position-right"></i></button>
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
