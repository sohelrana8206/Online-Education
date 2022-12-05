@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Referral Package</span> List</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    @can('referral-package-create')
                    <a href="{{url('referralPackageCreate')}}" class="btn btn-info"><i class="fa fa-plus"></i> Add New</a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Referral Package List</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Referral Package List</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Package Title</th>
                    <th>Price</th>
                    <th>Package Duration</th>
                    <th>Package Details</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($package as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->title}}</td>
                        <td>{{$items->price}}</td>
                        <td>{{$items->duration.' Months'}}</td>
                        <td class="text-justify"><?=$items->details?></td>
                        <td width="15%" class="text-center">
                            @can('edit-package')
                            <a href="{{url('referralPackageEdit/'.$items->id)}}" class="btn btn-info btn-sm" data-popup="tooltip" title="Edit Referral Package" data-placement="top"><i class="fa fa-pencil"></i></a>
                            @endcan
                            @can('delete-package')
                            <a style="cursor: pointer" class="btn btn-danger btn-sm delRefPack" data-href="{{url('deleteReferralPackage')}}" data-id="{{$items->id}}" data-popup="tooltip" title="Delete" data-placement="top"><i class="fa fa-trash"></i></a>
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
