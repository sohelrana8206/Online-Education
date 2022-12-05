@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Free Quiz</span> Setting</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    @can('create-free-quiz')
                    <a href="{{url('createFreeQuiz')}}" class="btn btn-info"><i class="fa fa-plus"></i> Add New Quiz</a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Free Quiz Setting</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Free Quiz Setting</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Quiz Name</th>
                    <th>Time Duration</th>
                    <th>Course Category</th>
                    <th>Status</th>
                    <th width="15%" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($data as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->quiz_name}}</td>
                        <td>{{$items->time_duration}} Minutes</td>
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
                            @can('free-quiz-questions')
                            <a href="{{url('freeQuizQuestions/'.encrypt($items->id))}}" class="btn btn-info btn-sm" data-popup="tooltip" title="Free Quiz Questions" data-placement="top"><i class="fa fa-list"></i></a>
                            @endcan

                            @can('edit-free-quiz')
                            <a href="{{url('editFreeQuiz/'.encrypt($items->id))}}" class="btn btn-primary btn-sm" data-popup="tooltip" title="Edit Free Quiz" data-placement="top"><i class="fa fa-pencil"></i></a>
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
