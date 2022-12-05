@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Video Library</span> List</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    @can('create-video-library')
                    <a href="{{url('addVideoLibrary')}}" class="btn btn-info"><i class="fa fa-plus"></i> Add New Video Library</a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Video Library List</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Video Library List</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Video Title</th>
                    <th>Course Category</th>
                    <th>Status</th>
                    <th width="25%" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($data as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->video_title}}</td>
                        <td>
                            <strong>{{$items->course_sub_category->course_secondary_category->course_primary_category->primary_category_name}}</strong> <i class="fa fa-arrow-right"></i>
                            <strong>{{$items->course_sub_category->course_secondary_category->secondary_category_name}}</strong> <i class="fa fa-arrow-right"></i>
                            <strong>{{$items->course_sub_category->sub_category_name}}</strong>
                        </td>
                        <td>
                            @if($items->status == 1)
                                <label class="badge badge-success">Active</label>
                            @else
                                <label class="badge badge-success">Inactive</label>
                            @endif
                        </td>
                        <td class="text-center">
                            <a style="cursor: pointer" data-href="{{$items->video_url}}" class="btn btn-danger btn-sm showVideo" data-popup="tooltip" title="View Video" data-placement="top"><i class="icon-play"></i></a>

                            @can('delete-Video')
                            <a style="cursor: pointer" data-href="{{url('deleteVideo')}}" data-id="{{$items->id}}" class="btn btn-danger btn-sm deleteVideo" data-popup="tooltip" title="Delete PDF" data-placement="top"><i class="fa fa-trash"></i></a>
                            @endcan
                        </td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->

        <div id="video-show-modal" class="modal fade">
            <div class="modal-dialog">
                <div style="text-align: center" class="modal-content" id="show-video">

                </div>
            </div>
        </div>

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection
