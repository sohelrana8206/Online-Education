@extends('templates/backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Users</span> - List</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    @can('user-create')
                    <a href="{{url('addUser')}}" class="btn btn-info"><i class="fa fa-plus"></i> Add New User</a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">User List</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">User List</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>User Role</th>
                    <th>Last Login</th>
                    <th>Login Ip</th>
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
                        <td>
                            @if(!empty($items->getRoleNames()))
                                @foreach($items->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if(!empty($items->last_login_at))
                                {{date('d F, Y h:i:s a',strtotime($items->last_login_at))}}
                            @endif
                        </td>
                        <td>{{$items->last_login_ip}}</td>
                        <td class="text-center">
                            @can('suspend-user')
                            <a class="btn btn-warning btn-sm suspendUsers" data-href="{{url('suspendUsers')}}" data-id="{{$items->id}}" data-popup="tooltip" title="Suspend User" data-placement="top"><i class="fa fa-remove"></i></a>
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
