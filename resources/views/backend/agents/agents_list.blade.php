@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Active Agents</span> List</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Active Agents List</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Active Agents List</h5>
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
                @foreach($data as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->name}}</td>
                        <td>{{$items->email}}</td>
                        <td>{{$items->personal_information->mobile}}</td>
                        <td>{{$items->personal_information->home_district}}</td>
                        <td>{{$items->personal_information->upazila}}</td>
                        <td class="text-center">
                            @can('user-profile')
                            <a href="{{url('profilePDF/'.encrypt($items->id))}}" class="btn btn-info btn-sm" data-popup="tooltip" title="View Profile" data-placement="top" target="_blank"><i class="fa fa-user"></i></a>
                            @endcan
                            @can('suspend-user')
                            <a class="btn btn-warning btn-sm suspendUsers" data-href="{{url('suspendUsers')}}" data-id="{{$items->id}}" data-popup="tooltip" title="Suspend Agents" data-placement="top"><i class="fa fa-remove"></i></a>
                            @endcan
                            @can('referred-student')
                            <a style="cursor: pointer" data-href="{{url('agentReferredStudent')}}" data-id="{{$items->id}}" class="btn btn-primary btn-sm agentReferredStudent" data-popup="tooltip" title="View Students of Batch" data-placement="top"><i class="fa fa-user-plus"></i></a>
                            @endcan
                            @can('user-delete')
                            <a style="cursor: pointer" class="btn btn-danger btn-sm delUser" data-href="{{url('deleteUser')}}" data-id="{{$items->id}}" data-popup="tooltip" title="Delete" data-placement="top"><i class="fa fa-trash"></i></a>
                            @endcan
                            @can('payment-history')
                            <a style="cursor: pointer" class="btn btn-success btn-sm paymentHistory" data-href="{{url('paymentHistory')}}" data-id="{{$items->id}}" data-popup="tooltip" title="Payment History" data-placement="top"><i class="fa fa-money"></i></a>
                            @endcan
                        </td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->

        <div id="course_cost_modal" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="course-cost">

                </div>
            </div>
        </div>

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection
