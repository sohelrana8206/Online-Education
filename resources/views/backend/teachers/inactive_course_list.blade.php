@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Inactive/Rejected Course</span> List</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Inactive/Rejected Course List</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Inactive/Rejected Course List</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Course Title</th>
                    <th>Course Category</th>
                    <th>Course Status</th>
                    <th>Institution Type</th>
                    <th>Teacher</th>
                    <th width="25%" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($data as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->course_title}}</td>
                        <td>
                            <strong>{{$items->course_sub_category->course_secondary_category->course_primary_category->primary_category_name}}</strong> <i class="fa fa-arrow-right"></i>
                            <strong>{{$items->course_sub_category->course_secondary_category->secondary_category_name}}</strong> <i class="fa fa-arrow-right"></i>
                            <strong>{{$items->course_sub_category->sub_category_name}}</strong>
                        </td>
                        <td>
                            @if($items->is_course_verified == 2)
                                <label class="badge badge-success">Rejected</label>
                            @elseif($items->status == 0)
                                <label class="badge badge-success">Inactive</label>
                            @endif
                        </td>
                        <td>{{$items->institution_type->institution_type_name}}</td>
                        <td>{{$items->user->name}}</td>
                        <td class="text-center">
                            @can('view-course')
                            <a href="{{url('courseDetails/'.encrypt($items->id))}}" class="btn btn-primary btn-sm" data-popup="tooltip" title="View Course" data-placement="top"><i class="fa fa-eye"></i></a>
                            @endcan

                            @can('course-cost')
                            <a style="cursor: pointer" data-href="{{url('courseCostList')}}" data-id="{{$items->id}}" class="btn btn-warning btn-sm courseCost" data-popup="tooltip" title="View Course Cost" data-placement="top"><i class="fa fa-dollar"></i></a>
                            @endcan

                            @can('course-lesson')
                            <a style="cursor: pointer" data-href="{{url('courseLessonList')}}" data-id="{{$items->id}}" class="btn btn-success btn-sm courseLesson" data-popup="tooltip" title="View Course Lessons" data-placement="top"><i class="fa fa-book"></i></a>
                            @endcan

                            @if($items->is_course_verified == 2)
                                @can('approve-course')
                                <a style="cursor: pointer" data-href="{{url('approveCourse')}}" data-id="{{$items->id}}" class="btn btn-warning btn-sm approveCourse" data-popup="tooltip" title="Approve Course" data-placement="top"><i class="fa fa-check"></i></a>
                                @endcan
                            @elseif($items->status == 0)
                                @can('activate-course')
                                <a style="cursor: pointer" data-href="{{url('activateCourse')}}" data-id="{{$items->id}}" class="btn btn-info btn-sm activateCourse" data-popup="tooltip" title="Course Activate" data-placement="top"><i class="fa fa-check"></i></a>
                                @endcan
                            @endif
                        </td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->

        <div id="course_cost_modal" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="course-cost">

                </div>
            </div>
        </div>

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection
