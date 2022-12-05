@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Referral Package</span> Edit form</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{url('referralPackage')}}" class="btn btn-info"><i class="fa fa-list"></i> Package List</a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li><a href="{{url('referralPackage')}}"><i class="icon-home2 position-left"></i> Referral Package List</a></li>
                <li class="active">Referral Package Edit form</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">


        <!-- Registration form -->
        <form style="margin-bottom: 50px" action="{{url('referralPackageUpdate/'.$data->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Referral Package Edit Form</h5>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Package Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{$data->title}}" placeholder="Package Title" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Package Price<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="price" value="{{$data->price}}" placeholder="Package Price" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Package Duration (Months)<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="duration" value="{{$data->duration}}" placeholder="Package Duration" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Package Details<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="editor" name="details" required>{{$data->details}}</textarea>
                        </div>
                    </div>

                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary">Update Package <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /registration form -->

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection
