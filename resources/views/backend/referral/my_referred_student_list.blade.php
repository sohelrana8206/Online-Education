@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">My Referred Student</span> List</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">My Referred Student List</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">My Referred Student List</h5>
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
                    <th>Enrolment Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($outputArray['student'] as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->studentname}}</td>
                        <td>{{$items->studentemail}}</td>
                        <td>{{$items->mobile}}</td>
                        <td>{{$items->home_district}}</td>
                        <td>{{$items->upazila}}</td>
                        <td>
                            @if($items->is_payment == 1)
                                {{'Enrolled'}}
                            @else
                                {{'Pending'}}
                            @endif
                        </td>
                        <td>
                            <a href="{{url('profilePDF/'.encrypt($items->studentID))}}" class="btn btn-info btn-sm" data-popup="tooltip" title="View Profile" data-placement="top" target="_blank"><i class="fa fa-user"></i></a>
                        </td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection
