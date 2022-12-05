@extends('templates/backend_master')

@section('content')
<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Teachers</span> - Dashboard</h4>
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
                <div class="col-lg-2">

                    <!-- Members online -->
                    <div class="panel bg-teal-400">
                        <div class="panel-body text-center">
                            <h3 class="no-margin">{{count($totalEnrolledStudent['courseStudent']) + count($totalEnrolledStudent['packageStudent'])}}</h3>
                            Total Enrolled <br>Student
                        </div>
                    </div>
                    <!-- /members online -->

                </div>

                <div class="col-lg-2">

                    <!-- Members online -->
                    <div class="panel bg-green-400">
                        <div class="panel-body text-center">
                            <h3 class="no-margin">{{count($outputArray['student'])}}</h3>
                            Total Referred <br>Student
                        </div>
                    </div>
                    <!-- /members online -->

                </div>

                <div class="col-lg-2">

                    <!-- Today's revenue -->
                    <div class="panel bg-blue-400">
                        <div class="panel-body text-center">
                            <h3 class="no-margin">{{count($totalOutputArray['student'])}}</h3>
                            Today's Referred <br>Student
                        </div>
                    </div>
                    <!-- /today's revenue -->

                </div>

                <div class="col-lg-2">

                    <!-- Today's revenue -->
                    <div class="panel bg-warning-400">
                        <div class="panel-body text-center">
                            <h3 class="no-margin">{{count($todayEnrolledStudent['courseStudent']) + count($todayEnrolledStudent['packageStudent'])}}</h3>
                            Today's Enrolled <br>Student
                        </div>
                    </div>
                    <!-- /today's revenue -->

                </div>

                <div class="col-lg-2">

                    <!-- Members online -->
                    <div class="panel bg-brown-400">
                        <div class="panel-body text-center">
                            <h3 class="no-margin">{{count($totalActiveCourse) + count($totalActivePackage)}}</h3>
                            Total Active <br>Course & Package
                        </div>
                    </div>
                    <!-- /members online -->

                </div>

                <div class="col-lg-2">

                    <!-- Current server load -->
                    <div class="panel bg-pink-400">
                        <div class="panel-body text-center">
                            <h3 class="no-margin">{{$totalOutstanding}}/-</h3>
                            Total <br>Outstanding
                        </div>
                    </div>
                    <!-- /current server load -->

                </div>
            </div>

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Today's Enrolled Student List</h5>
                </div>

                <table class="table datatable-basic">
                    <thead>
                    <tr>
                        <th>SR NO</th>
                        <th>Enrollment Type</th>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Student Phone</th>
                        <th>Home District</th>
                        <th>Upazila</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $counter = 1; ?>
                     @foreach($todayEnrolledStudent['courseStudent'] as $items)
                         <tr>
                             <td><?=$counter?></td>
                             <td>{{$items->type}}</td>
                             <td>{{$items->studentname}}</td>
                             <td>{{$items->studentemail}}</td>
                             <td>{{$items->mobile}}</td>
                             <td>{{$items->home_district}}</td>
                             <td>{{$items->upazila}}</td>
                         </tr>
                         <?php $counter++; ?>
                     @endforeach
                    @foreach($todayEnrolledStudent['packageStudent'] as $item)
                         <tr>
                             <td><?=$counter?></td>
                             <td>{{$item->type}}</td>
                             <td>{{$item->studentname}}</td>
                             <td>{{$item->studentemail}}</td>
                             <td>{{$item->mobile}}</td>
                             <td>{{$item->home_district}}</td>
                             <td>{{$item->upazila}}</td>
                         </tr>
                         <?php $counter++; ?>
                     @endforeach
                    </tbody>
                </table>
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

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->
@endsection
