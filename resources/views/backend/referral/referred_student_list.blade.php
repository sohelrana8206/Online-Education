@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Referred Student</span> List</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Referred Student List</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Referred Student List</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Agent Name</th>
                    <th>Agent Email</th>
                    <th>Agent Role</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($dataOutput as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items['studentName']}}</td>
                        <td>{{$items['studentEmail']}}</td>
                        <td>{{$items['agentName']}}</td>
                        <td>{{$items['agentEmail']}}</td>
                        <td><label class="badge badge-success">{{$items['agentRole']}}</label></td>
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
