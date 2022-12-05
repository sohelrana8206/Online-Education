@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Course Completed Students</span> List</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Course Completed Students List</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Course Completed Students List</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Students Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Home District</th>
                    <th>Upazila</th>
                    <th>Enrolled Date</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($courseData as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->name}}</td>
                        <td>{{$items->email}}</td>
                        <td>{{$items->mobile}}</td>
                        <td>{{$items->home_district}}</td>
                        <td>{{$items->upazila}}</td>
                        <td>{{date('d F, Y',strtotime($items->created_at))}}</td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                @foreach($packageData as $item)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->mobile}}</td>
                        <td>{{$item->home_district}}</td>
                        <td>{{$item->upazila}}</td>
                        <td>{{date('d F, Y',strtotime($item->created_at))}}</td>
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