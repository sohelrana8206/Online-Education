@extends('templates/backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Users Activities</span> Log</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Users Activities Log</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Users Activities Log</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Model Name</th>
                    <th>Description</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th class="text-center">Changes</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($data as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items['log_name']}}</td>
                        <td>{{$items['description']}}</td>
                        <td>{{$items['causer']['name']}}</td>
                        <td>{{$items['causer']['email']}}</td>
                        <td>
                            <?php
                                echo '<pre>';
                                print_r($items['properties']);
                            ?>
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
