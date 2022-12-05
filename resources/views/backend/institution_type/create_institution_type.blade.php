@extends('templates/backend_master')
@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Institution Type Add</span> Form</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{url('institutionType')}}" class="btn btn-info"><i class="fa fa-list"></i> Institution Type List</a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li><a href="{{url('institutionType')}}">Institution Type List</a></li>
                <li class="active">Institution Type Add Form</li>
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
                    <form style="margin-bottom: 50px" action="{{url('institutionTypeStore')}}" method="post">
                        @csrf
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Institution Type Add Form</h5>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Institution Type Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="institution_type_name" placeholder="Institution Type Name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary">Add Institution Type <i class="icon-arrow-right14 position-right"></i></button>
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
