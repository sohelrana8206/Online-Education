@extends('templates/backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Notification</span> - List</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    @can('user-create')
                    <a href="{{url('addNotification')}}" class="btn btn-info"><i class="fa fa-plus"></i> Add New Notification</a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Notification List</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Notification List</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Notification Title</th>
                    <th>Notification Details</th>
                    <th>Publish Date</th>
                    <th>Notification For</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($data as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->notification_title}}</td>
                        <td><?=$items->notification_details?></td>
                        <td><?=date('d F, Y',strtotime($items->publish_date))?></td>
                        <td>
                            <?php
                            $roles = explode(',',$items->role_id);

                            foreach($roles as $roleID){
                                $filtered = $role->filter(function ($value, $key) use ($roleID) {
                                    return $value->id == $roleID;
                                });

                                $role_info = $filtered->last();
                                echo '<label class="badge badge-success">'.$role_info->name.'</label>';
                            }
                            ?>
                        </td>
                        <td width="15%" class="text-center">
                            @can('edit-notification')
                            <a href="{{url('editNotification/'.$items->id)}}" class="btn btn-info btn-sm" data-popup="tooltip" title="Edit Notification" data-placement="top"><i class="fa fa-pencil"></i></a>
                            @endcan
                            @can('close-notification')
                            <a class="btn btn-warning btn-sm closeNotification" data-href="{{url('closeNotification')}}" data-id="{{$items->id}}" data-popup="tooltip" title="Close Notification" data-placement="top"><i class="fa fa-remove"></i></a>
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
