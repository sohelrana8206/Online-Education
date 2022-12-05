@extends('templates/backend_master')

@section('content')
        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Course Information</span></h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{url('pdfLibraryStudent')}}" class="btn btn-link btn-float has-text"><i class="icon-file-text3 text-primary"></i> <span>PDF Library</span></a>
                    <a href="{{url('videoLibraryStudent')}}" class="btn btn-link btn-float has-text"><i class="icon-video-camera3 text-danger"></i> <span>Video Library</span></a>
                    <a href="{{url('freeQuizStudent')}}" class="btn btn-link btn-float has-text"><i class="icon-display text-success"></i> <span>Free Quiz</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb-elements">
                <li><a href="{{url('ChatRoom')}}" target="_blank"><i class="icon-bubbles2 position-left"></i> Live Chat</a></li>
                @if($type == 'course')
                    <li><a href="{{url('teacherEvaluation/'.encrypt($courseData->id.'_course'))}}"><i class="icon-user-check position-left"></i> Teacher Evaluation</a></li>
                    <li><a href="{{url('courseReview/'.encrypt($courseData->id.'_course'))}}"><i class="icon-comment position-left"></i> Course Reviews</a></li>
                    <li><a href="{{url('studentCourseQuiz')}}"><i class="icon-screen3 position-left"></i> Course Quiz</a></li>
                    <li><a href="{{url('studentCourseAssignment')}}"><i class="icon-file-text position-left"></i> Course Assignment</a></li>
                    <li><a href="{{url('markSheet/'.encrypt($courseData->id.'_course'))}}"><i class="icon-file-text position-left"></i> Mark Sheet</a></li>
                @else
                    <li><a href="{{url('teacherEvaluation/'.encrypt($courseData->id.'_course'))}}"><i class="icon-user-check position-left"></i> Teacher Evaluation</a></li>
                    <li><a href="{{url('courseReview/'.encrypt($courseData->id.'_package'))}}"><i class="icon-comment position-left"></i> Course Reviews</a></li>
                    <li><a href="{{url('studentPackageQuiz')}}"><i class="icon-screen3 position-left"></i> Course Quiz</a></li>
                    <li><a href="{{url('studentPackageAssignment')}}"><i class="icon-file-text position-left"></i> Course Assignment</a></li>
                    <li><a href="{{url('markSheet/'.encrypt($courseData->id.'_package'))}}"><i class="icon-file-text position-left"></i> Mark Sheet</a></li>
                @endif
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    @if($type == 'course')
        <div class="content">
            <h4>{{$courseData->course_title}}</h4>
            <label class="control-label no-margin text-semibold">Course Start date:</label>
            <strong>{{date('d M, Y',strtotime($courseData->course_cost->last()->course_start_date))}}</strong>
            @if(!empty($courseData->course_batch))
                <br><strong>Batch: {{$courseData->course_batch->course_batch_title}}</strong>
            @endif
            <p>
                <strong>Teacher Name: {{$courseData->user->name}}</strong><br>
            </p>

            <h5>Course Lessons</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="12%">Lessons</th>
                        <th width="15%">Name</th>
                        <th width="53%">Description</th>
                        <th width="10%">Duration</th>
                        <th width="10%">Start Date</th>
                        <th width="10%">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $counter = 1; ?>
                    @foreach($courseData->course_lesson as $lesson)
                        <tr>
                            <td>Lesson {{$counter}}</td>
                            <td><a href="#">{{$lesson->lesson_title}}</a></td>
                            <td><?=$lesson->lesson_description?></td>
                            <td>{{$lesson->lesson_duration}}</td>
                            <td>{{date('M d, Y',strtotime($lesson->lesson_start_date))}}</td>
                            <td>
                                @if(date('Y-m-d') > $lesson->lesson_start_date)
                                    <strong>{{'Completed'}}</strong>
                                @else
                                    <strong>{{'Pending'}}</strong>
                                @endif
                            </td>
                        </tr>
                        <?php $counter ++; ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="content">
            <h4>{{$courseData->package_title}}</h4>
            <label class="control-label no-margin text-semibold">Course Start date:</label>
            <strong>{{date('d M, Y',strtotime($courseData->course_package_cost->last()->package_start_date))}}</strong>
            @if(!empty($courseData->course_package_batch))
                <br><strong>Batch: {{$courseData->course_package_batch->course_package_batch_title}}</strong>
            @endif
            <p>
                <strong>Teacher Name: {{$courseData->user->name}}</strong><br>
            </p>

            <h5>Package Lessons</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="12%">Lessons</th>
                        <th width="15%">Name</th>
                        <th width="53%">Description</th>
                        <th width="10%">Duration</th>
                        <th width="10%">Start Date</th>
                        <th width="10%">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $counter = 1; ?>
                    @foreach($courseData->course_package_lesson as $lesson)
                        <tr>
                            <td>Lesson {{$counter}}</td>
                            <td><a href="#">{{$lesson->package_lesson_title}}</a></td>
                            <td><?=$lesson->package_lesson_description?></td>
                            <td>{{$lesson->package_lesson_duration}}</td>
                            <td>{{date('M d, Y',strtotime($lesson->package_lesson_start_date))}}</td>
                            <td>
                                @if(date('Y-m-d') > $lesson->package_lesson_start_date)
                                    <strong>{{'Completed'}}</strong>
                                @else
                                    <strong>{{'Pending'}}</strong>
                                @endif
                            </td>
                        </tr>
                        <?php $counter ++; ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    <!-- /content area -->

</div>
<!-- /main content -->
@endsection
