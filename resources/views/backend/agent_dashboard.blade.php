@extends('templates/backend_master')

@section('content')
<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Agent</span> - Dashboard</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        @if(!empty($referral_agent))
            <!-- NOTIFICATION -->
            @if(!empty(session('package_end_date')))
                <?php
                $date1=date_create(session('package_end_date'));
                $date2=date_create(date('Y-m-d'));
                $diff = date_diff($date2,$date1);
                $package_remaining_day = $diff->format("%a");
                ?>
                @if($package_remaining_day < 7)
                    <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                        <h6 class="alert-heading text-semibold">Update Referral Package</h6>
                        <p>Your Referral Package will <span class="text-danger-700">Expired</span> within {{$package_remaining_day}} days. Please <a href="{{url('getReferral')}}">update Referral Package</a> .</p>
                    </div>
                @endif
            @endif

            @if(!empty($notification))
                <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <h6 class="alert-heading text-semibold">{{$notification['title']}}</h6>
                    <?=$notification['details']?>
                </div>
            @endif
            <!-- /NOTIFICATION -->

            <div class="row">
                <div class="col-lg-4">

                    <!-- Members online -->
                    <div class="panel bg-teal-400">
                        <div class="panel-body">
                            <h3 class="no-margin">{{count($outputArray['student'])}}</h3>
                            Total Referred Student
                        </div>
                    </div>
                    <!-- /members online -->

                </div>

                <div class="col-lg-4">

                    <!-- Today's revenue -->
                    <div class="panel bg-blue-400">
                        <div class="panel-body">
                            <h3 class="no-margin">{{count($totalOutputArray['student'])}}</h3>
                            Today's Referred Student
                        </div>
                    </div>
                    <!-- /today's revenue -->

                </div>

                <div class="col-lg-4">

                    <!-- Current server load -->
                    <div class="panel bg-pink-400">
                        <div class="panel-body">
                            <h3 class="no-margin">{{$totalOutstanding}}/-</h3>
                            Total Outstanding
                        </div>
                    </div>
                    <!-- /current server load -->

                </div>
            </div>

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Today's My Referred Student List</h5>
                </div>

                <table class="table datatable-basic">
                    <thead>
                    <tr>
                        <th>SR NO</th>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Student Phone</th>
                        <th>Home District</th>
                        <th>Upazila</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $counter = 1; ?>
                    @foreach($totalOutputArray['student'] as $items)
                        <tr>
                            <td><?=$counter?></td>
                            <td>{{$items->studentname}}</td>
                            <td>{{$items->studentemail}}</td>
                            <td>{{$items->mobile}}</td>
                            <td>{{$items->home_district}}</td>
                            <td>{{$items->upazila}}</td>
                        </tr>
                        <?php $counter++; ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="container-detached">
                <div class="content-detached">
                    <div class="row">
                        @foreach($referral_package as $item)
                            <div class="col-lg-6">
                                <div class="panel panel-flat blog-horizontal blog-horizontal-2">
                                    <div class="panel-body">
                                        <div class="blog-preview">
                                            <div class="content-group-sm media blog-title stack-media-on-mobile text-left">
                                                <div class="media-body">
                                                    <h4 class="text-semibold no-margin">{{$item->title}}</h4>
                                                </div>

                                                <h5 style="width: 25%" class="text-success media-right no-margin-bottom text-semibold">BDT {{$item->price}}</h5>
                                            </div>

                                            <p><?=$item->details?></p>
                                        </div>
                                    </div>

                                    <div class="panel-footer panel-footer-condensed"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline list-inline-separate heading-text">
                                                <li><i class="icon-alarm position-left"></i> <strong>Package Duration: </strong>{{$item->duration.' Months'}}</li>
                                            </ul>
                                            <form action="{{url('pay')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="price" value="{{$item->price}}">
                                                <input type="hidden" name="origin_price" value="{{$item->price}}">
                                                <input type="hidden" name="packageID" value="{{$item->id}}">
                                                <button type="submit" class="btn btn-info heading-text pull-right">Get Referral Code<i class="icon-arrow-right14 position-right"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->
@endsection
