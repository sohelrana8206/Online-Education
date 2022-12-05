@extends('templates.backend_master')

@section('content')

    <style>
        .discount{
            text-decoration: line-through;
            opacity: 0.4;
        }
    </style>

    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Course</span> Details</h4>
                </div>
            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                    <li class="active">Course Details</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">
            <div class="row">
                <div class="col-md-9">
                    <!-- Detached content -->
                    <div class="container-detached">
                        <div class="content-detached">

                            <!-- Course overview -->
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h6 class="panel-title text-semibold">{{$data->course_title}}</h6>
                                    <small>{{$data->course_sub_title}}</small><br>
                                    <i class="fa fa-book"></i> <strong>{{$data->course_sub_category->course_secondary_category->course_primary_category->primary_category_name}}</strong> <i class="fa fa-arrow-right"></i>
                                    <strong>{{$data->course_sub_category->course_secondary_category->secondary_category_name}}</strong> <i class="fa fa-arrow-right"></i>
                                    <strong>{{$data->course_sub_category->sub_category_name}}</strong>
                                </div>

                                <div class="panel-body">
                                    <div class="content-group-lg list-icon-style">
                                        <div class="content-group text-center">
                                            <img src="{{asset($data->course_image)}}" class="img-responsive" alt="FCTB Academy">
                                        </div>
                                        <h6 class="text-semibold">Course overview</h6>
                                        <p><?=$data->course_details?></p>
                                    </div>

                                    <div class="content-group-lg list-icon-style">
                                        <h6 class="text-semibold">Course Requirements</h6>
                                        <p><?=$data->course_requirement?></p>
                                    </div>

                                    <div class="content-group-lg list-icon-style">
                                        <h6 class="text-semibold">Course Component</h6>
                                        <p><?=$data->course_component?></p>
                                    </div>

                                    <div class="content-group-lg list-icon-style">
                                        <h6 class="text-semibold">Course Benefit</h6>
                                        <p><?=$data->course_benefit?></p>
                                    </div>

                                    <div class="content-group-lg list-icon-style">
                                        <h6 class="text-semibold">Course Content</h6>
                                        <p><?=$data->course_content?></p>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th width="12%">Lessons</th>
                                            <th width="15%">Name</th>
                                            <th width="53%">Description</th>
                                            <th width="10%">Duration</th>
                                            <th width="10%">Start Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $counter = 1; ?>
                                        @foreach($data->course_lesson as $lesson)
                                            <tr>
                                                <td>Lesson {{$counter}}</td>
                                                <td><a href="#">{{$lesson->lesson_title}}</a></td>
                                                <td><?=$lesson->lesson_description?></td>
                                                <td>{{$lesson->lesson_duration}}</td>
                                                <td>{{date('M d, Y',strtotime($lesson->lesson_start_date))}}</td>
                                            </tr>
                                            <?php $counter ++; ?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /course overview -->

                        </div>
                    </div>
                    <!-- /detached content -->
                </div>
                <div class="col-md-3">
                    <!-- Detached sidebar -->
                    <div class="sidebar-detached">
                        <div class="sidebar sidebar-default sidebar-separate">
                            <div class="sidebar-content">

                                <!-- Course details -->
                                <div class="sidebar-category">
                                    <div class="category-title">
                                        <span>Course details</span>
                                        <ul class="icons-list">
                                            <li><a href="#" data-action="collapse"></a></li>
                                        </ul>
                                    </div>

                                    <div class="category-content">

                                        <div class="form-group">
                                            <label class="control-label no-margin text-semibold">Duration:</label>
                                            <div class="pull-right">{{$data->course_duration.' Days'}}</div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label no-margin text-semibold">Institution Type:</label>
                                            <div class="pull-right">{{$data->institution_type->institution_type_name}}</div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label no-margin text-semibold">Reg. Last date:</label>
                                            <div class="pull-right">{{date('d M, Y',strtotime($data->course_cost->last()->course_registration_last_date))}}</div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label no-margin text-semibold">Course Start date:</label>
                                            <div class="pull-right">{{date('d M, Y',strtotime($data->course_cost->last()->course_start_date))}}</div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label no-margin text-semibold">Lessons:</label>
                                            <div class="pull-right">{{count($data->course_lesson)}} lessons</div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label no-margin text-semibold">Trainer:</label>
                                            <div class="pull-right">{{$data->user->name}}</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label no-margin text-semibold">Price:</label>
                                            <div class="pull-right text-danger-600"><span class="discount">tk{{$data->course_cost->last()->course_fee}}</span><span> tk{{$data->course_cost->last()->course_discounted_cost}} </span></div>
                                        </div>
                                        <a style="display: block" href="{{url('purchaseCourse/'.encrypt($data->id))}}" class="btn btn-warning">Purchase</a>
                                    </div>
                                </div>
                                <!-- /course details -->

                            </div>
                        </div>
                    </div>
                    <!-- /detached sidebar -->
                </div>
            </div>

        </div>
        <!-- /content area -->

    </div>

@endsection
