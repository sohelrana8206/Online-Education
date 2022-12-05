@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Referral Agent</span> List</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Referral Agent List</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Referral Agent List</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Package Name</th>
                    <th>Referral Code</th>
                    <th>Commission Rate</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($agent as $items)
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
                        <td>{{$items->referral_package->title}}</td>
                        <td><?=$items->referral_code?></td>
                        <td><?=$items->commission_rate.'%'?></td>
                        <td width="15%" class="text-center">
                            @can('edit-package')
                            <a href="{{url('editCommissionRate/'.$items->id)}}" class="btn btn-info btn-sm" data-popup="tooltip" title="Edit Agent Commission Rate" data-placement="top"><i class="fa fa-pencil"></i></a>
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
