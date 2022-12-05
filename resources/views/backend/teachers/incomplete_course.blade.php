@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Incomplete Course</span> List</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Incomplete Course List</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Incomplete Course List</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Course Title</th>
                    <th>Course Start Date</th>
                    <th>Course End Date</th>
                    <th>Course Complete Status</th>
                    <th width="5%" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($data as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->course_title}}</td>
                        <td>{{date('d F, Y',strtotime($items->course_start_date))}}</td>
                        <td>{{date('d F, Y',strtotime($items->course_start_date.'+'.$items->course_duration.' Months'))}}</td>
                        <td>
                            @if($items->course_complete_status == 0)
                                <label class="badge badge-warning">Incomplete</label>
                            @else
                                <label class="badge badge-success">Complete</label>
                            @endif
                        </td>
                        <td class="text-center">

                            @if($items->course_complete_status == 0)
                                @can('approve-complete-course')
                                <a style="cursor: pointer" data-href="{{url('approveCompleteCourse')}}" data-id="{{$items->id}}" class="btn bg-info btn-sm approveCompleteCourse" data-popup="tooltip" title="Approve Course Complete" data-placement="top"><i class="fa fa-check"></i></a>
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