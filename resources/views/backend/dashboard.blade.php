@extends('templates/backend_master')

@section('content')
<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Admin</span> - Dashboard</h4>
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
            <div class="col-lg-3">

                <!-- Members online -->
                <div class="panel bg-teal-400">
                    <div class="panel-body text-center">
                        <h3 class="no-margin">{{count($totalEnrolledStudent)}}</h3>
                        Total Enrolled <br>Student
                    </div>
                </div>
                <!-- /members online -->

            </div>

            <div class="col-lg-3">

                <!-- Members online -->
                <div class="panel bg-green-400">
                    <div class="panel-body text-center">
                        <h3 class="no-margin">{{count($totalActiveTeacher)}}</h3>
                        Total Active <br>Teacher
                    </div>
                </div>
                <!-- /members online -->

            </div>

            <div class="col-lg-3">

                <!-- Today's revenue -->
                <div class="panel bg-blue-400">
                    <div class="panel-body text-center">
                        <h3 class="no-margin">{{count($totalActiveAgent)}}</h3>
                        Total Active <br>Agent
                    </div>
                </div>
                <!-- /today's revenue -->

            </div>

            <div class="col-lg-3">

                <!-- Today's revenue -->
                <div class="panel bg-warning-400">
                    <div class="panel-body text-center">
                        <h3 class="no-margin">{{count($todayEnrolledStudent)}}</h3>
                        Today's Enrolled <br>Student
                    </div>
                </div>
                <!-- /today's revenue -->

            </div>
        </div>

            @if(!empty($referral_code))
                <h4>My Referral Information</h4>
                <div class="row">

                    <div class="col-lg-4">

                        <!-- Members online -->
                        <div class="panel bg-green-400">
                            <div class="panel-body text-center">
                                <h3 class="no-margin">{{count($outputArray['student'])}}</h3>
                                Total Referred <br>Student
                            </div>
                        </div>
                        <!-- /members online -->

                    </div>

                    <div class="col-lg-4">

                        <!-- Today's revenue -->
                        <div class="panel bg-blue-400">
                            <div class="panel-body text-center">
                                <h3 class="no-margin">{{count($totalOutputArray['student'])}}</h3>
                                Today's Referred <br>Student
                            </div>
                        </div>
                        <!-- /today's revenue -->

                    </div>

                    <div class="col-lg-4">

                        <!-- Current server load -->
                        <div class="panel bg-pink-400">
                            <div class="panel-body text-center">
                                <h3 class="no-margin">{{$totalOutstanding}}/-</h3>
                                Total Referral <br>Outstanding
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
            @endif

        @can('pending-payment-request')
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Pending Payment Request</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Applicant Name</th>
                    <th>Type</th>
                    <th>Mobile</th>
                    <th>Amount</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($pendingPaymentRequest as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->user->name}}</td>
                        <td>
                            @if(!empty($items->user->getRoleNames()))
                                @foreach($items->user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>{{$items->user->personal_information->mobile}}</td>
                        <td>{{$items->amount}}</td>
                        <td class="text-center">
                            @can('approve-payment-request')
                            <a class="btn btn-info btn-sm approvePaymentRequest" data-href="{{url('paymentRequestModal')}}" data-id="{{$items->id}}" data-request="{{$items->amount}}" data-popup="tooltip" title="Approve Payment Request" data-placement="top"><i class="fa fa-check"></i></a>
                            @endcan
                        </td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
        @endcan

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
                @foreach($todayEnrolledStudent as $items)
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
                </tbody>
            </table>
        </div>

        @can('pending-teacher-list')
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Pending Teachers List</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Teachers Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Home District</th>
                    <th>Upazila</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($pendingNewTeacher as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->name}}</td>
                        <td>{{$items->email}}</td>
                        <td>{{$items->personal_information->mobile}}</td>
                        <td>{{$items->personal_information->home_district}}</td>
                        <td>{{$items->personal_information->upazila}}</td>
                        <td class="text-center">
                            @can('user-approve')
                            <a class="btn btn-info btn-sm approveUsers" data-href="{{url('approveUsers')}}" data-id="{{$items->id}}" data-popup="tooltip" title="Approve Teacher" data-placement="top"><i class="fa fa-check"></i></a>
                            @endcan
                            @can('user-delete')
                            <a style="cursor: pointer" class="btn btn-danger btn-sm delUser" data-href="{{url('deleteUser')}}" data-id="{{$items->id}}" data-popup="tooltip" title="Delete" data-placement="top"><i class="fa fa-trash"></i></a>
                            @endcan
                        </td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
        @endcan

        @can('pending-agent-list')
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Pending Agents List</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Agents Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Home District</th>
                    <th>Upazila</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($pendingNewAgent as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->name}}</td>
                        <td>{{$items->email}}</td>
                        <td>{{$items->personal_information->mobile}}</td>
                        <td>{{$items->personal_information->home_district}}</td>
                        <td>{{$items->personal_information->upazila}}</td>
                        <td class="text-center">
                            @can('user-approve')
                            <a class="btn btn-info btn-sm approveUsers" data-href="{{url('approveUsers')}}" data-id="{{$items->id}}" data-popup="tooltip" title="Approve Agents" data-placement="top"><i class="fa fa-check"></i></a>
                            @endcan
                            @can('user-delete')
                            <a style="cursor: pointer" class="btn btn-danger btn-sm delUser" data-href="{{url('deleteUser')}}" data-id="{{$items->id}}" data-popup="tooltip" title="Delete" data-placement="top"><i class="fa fa-trash"></i></a>
                            @endcan
                        </td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
        @endcan

        {{--MODAL--}}
        <div class="modal fade" id="payment-request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Payment Request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="payment-request-body"></div>
                </div>
            </div>
        </div>
        {{--MODAL--}}
    </div>
    <!-- /content area -->

</div>
<!-- /main content -->
@endsection
