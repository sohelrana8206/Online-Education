@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Mark Sheet</span></h4>
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
                @else
                    <li><a href="{{url('teacherEvaluation/'.encrypt($courseData->id.'_course'))}}"><i class="icon-user-check position-left"></i> Teacher Evaluation</a></li>
                    <li><a href="{{url('courseReview/'.encrypt($courseData->id.'_package'))}}"><i class="icon-comment position-left"></i> Course Reviews</a></li>
                    <li><a href="{{url('studentPackageQuiz')}}"><i class="icon-screen3 position-left"></i> Course Quiz</a></li>
                    <li><a href="{{url('studentPackageAssignment')}}"><i class="icon-file-text position-left"></i> Course Assignment</a></li>
                @endif
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Mark Sheet</h5>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Exam Name</th>
                    <th>Full Marks</th>
                    <th>Obtained Marks</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1;$full_marks = 0;$obtained_marks = 0; ?>
                @foreach($data as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->exam_name}}</td>
                        <td>
                            <?php
                            $full_marks = $full_marks + $items->full_marks;
                            echo $items->full_marks;
                            ?>
                        </td>
                        <td>
                            <?php
                            $obtained_marks = $obtained_marks + $items->obtained_marks;
                            echo $items->obtained_marks;
                            ?>
                        </td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                <tr>
                    <td colspan="2"><strong>Total</strong></td>
                    <td><strong>{{$full_marks}}</strong></td>
                    <td><strong>{{$obtained_marks}}</strong></td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection
