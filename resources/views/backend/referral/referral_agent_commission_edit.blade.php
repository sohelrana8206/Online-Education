@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Referral Commission</span> Edit</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li><a href="{{url('referralAgent')}}"><i class="icon-home2 position-left"></i> Referral Agent List</a></li>
                <li class="active">Referral Commission Edit</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">


        <!-- Registration form -->
        <form style="margin-bottom: 50px" action="{{url('referralCommissionUpdate/'.$data->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Referral Commission Edit</h5>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Referral Commission<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="referral_commission" value="{{$data->commission_rate}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
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
