@extends('templates/backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Role</span> List</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    @can('role-create')
                    <a href="{{route('roles.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> Add New</a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Role List</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Role List</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Role Name</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($roles as $items)
                    <tr>
                        <td>{{$counter}}</td>
                        <td>{{$items->name}}</td>
                        <td class="text-center">
                            @can('role-details')
                            <a class="btn btn-primary btn-sm" href="{{route('roles.show',$items->id)}}" data-popup="tooltip" title="View" data-placement="top"><i class="fa fa-eye"></i></a>
                            @endcan
                            @can('role-edit')
                            <a class="btn btn-info btn-sm" href="{{route('roles.edit',$items->id)}}" data-popup="tooltip" title="Edit" data-placement="top"><i class="fa fa-pencil"></i></a>
                            @endcan
                            @can('role-delete')
                            <a style="cursor: pointer" class="btn btn-danger btn-sm delRole" data-href="{{url('deleteRole')}}" data-id="{{$items->id}}" data-popup="tooltip" title="Delete" data-placement="top"><i class="fa fa-trash"></i></a>
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
