@extends('templates/backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Course Secondary Category</span> - List</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    @can('user-create')
                    <a href="{{url('createSecondaryCategory')}}" class="btn btn-info"><i class="fa fa-plus"></i> Add Secondary Category</a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Course Secondary Category List</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Course Secondary Category List</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Secondary Category Name</th>
                    <th>Primary Category Name</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($data as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->secondary_category_name}}</td>
                        <td>{{$items->course_primary_category->primary_category_name}}</td>
                        <td width="15%" class="text-center">
                            @can('edit-course-secondary-category')
                            <a href="{{url('editSecondaryCategory/'.$items->id)}}" class="btn btn-info btn-sm" data-popup="tooltip" title="Edit Secondary Category" data-placement="top"><i class="fa fa-pencil"></i></a>
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
