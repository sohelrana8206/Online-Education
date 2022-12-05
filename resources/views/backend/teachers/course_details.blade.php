@extends('templates.backend_master')

@section('content')

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

                                <ul class="nav nav-lg nav-tabs nav-tabs-bottom nav-tabs-toolbar no-margin">
                                    <li class="active"><a href="#course-overview" data-toggle="tab"><i class="icon-menu7 position-left"></i> Overview</a></li>
                                    <li><a href="#course-attendees" data-toggle="tab"><i class="icon-people position-left"></i> Attendees</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="course-overview">
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

                                    <div class="tab-pane fade" id="course-attendees">
                                        <div class="panel-body">
                                            <div class="row">
                                                @foreach($enrollment as $std)
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="panel panel-body">
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        @if(!empty($std->user->personal_information->image))
                                                                            <?php $profile_pic = $std->user->personal_information->image; ?>
                                                                        @else
                                                                            <?php $profile_pic = 'public/admin-assets/images/profile-pic.png'; ?>
                                                                        @endif
                                                                        <img src="{{asset($profile_pic)}}" class="img-circle img-lg" alt="">
                                                                    </a>
                                                                </div>

                                                                <div class="media-body">
                                                                    <h6 class="media-heading">{{$std->user->name}}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
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
                                            <label class="control-label no-margin text-semibold">Status:</label>
                                            <div class="pull-right">
                                                @if($data->is_course_verified == 0)
                                                    <label class="badge bg-blue">Pending</label>
                                                @elseif($data->is_course_verified == 1)
                                                    <label class="badge bg-blue">Approved</label>
                                                @else
                                                    <label class="badge bg-blue">Rejected</label>
                                                @endif
                                            </div>
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
                                            <div class="pull-right"><a href="#">{{auth()->user()->name}}</a></div>
                                        </div>
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
