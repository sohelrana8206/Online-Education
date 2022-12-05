@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Suspended Students</span> List</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Suspended Students List</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Suspended Students List</h5>
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
                            @can('user-approve')
                            <a class="btn btn-info btn-sm approveUsers" data-href="{{url('approveUsers')}}" data-id="{{$items->id}}" data-popup="tooltip" title="Approve Students" data-placement="top"><i class="fa fa-check"></i></a>
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
        <!-- /basic datatable -->

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection
