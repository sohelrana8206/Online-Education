@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Pending Course Fee Payment</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Pending Course Fee Payment</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">
        @foreach($unPaidCourseFee as $item)
            @if($courseType == 'course')
                <div class="panel panel-info panel-bordered">
                    <div class="panel-heading">
                        <h6 class="panel-title"><?=$item->course->course_title?></h6>
                    </div>

                    <div class="panel-body">
                        <form action="{{url('pay')}}" method="post">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <p> <b>Course Fee</b> </p>
                                    <div class="form-group">
                                        <input type="hidden" value="{{$item->id}}" name="enrollmentID">
                                        <input type="number" class="form-control" name="price" value="<?=$item->course->course_cost->last()->course_discounted_cost?>" readonly />
                                        <input type="hidden" class="form-control" name="origin_price" value="<?=$item->course->course_cost->last()->course_fee?>" readonly />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">PAY NOW</button>
                            <a style="cursor: pointer;color: #FFFFFF" data-id="{{$item->id}}" data-href="{{url('deleteEnrollment')}}" class="btn btn-raised btn-danger btn-round waves-effect deleteEnrollment">CANCEL</a>
                        </form>
                    </div>
                </div>
            @else
                <div class="panel panel-info panel-bordered">
                    <div class="panel-heading">
                        <h6 class="panel-title"><?=$item->course_package->package_title?></h6>
                    </div>

                    <div class="panel-body">
                        <form action="{{url('pay')}}" method="post">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <p> <b>Package Fee</b> </p>
                                    <div class="form-group">
                                        <input type="hidden" value="{{$item->id}}" name="enrollmentID">
                                        <input type="number" class="form-control" name="price" value="<?=$item->course_package->course_package_cost->last()->package_discounted_cost?>" readonly />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">PAY NOW</button>
                            <a style="cursor: pointer;color: #FFFFFF" data-id="{{$item->id}}" data-href="{{url('deleteEnrollment')}}" class="btn btn-raised btn-danger btn-round waves-effect deleteEnrollment">CANCEL</a>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection
