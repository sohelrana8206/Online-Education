@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Course Quiz</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Course Quiz</li>
            </ul>

            <ul class="breadcrumb-elements">
                <li><a href="{{url('ChatRoom')}}" target="_blank"><i class="icon-bubbles2 position-left"></i> Live Chat</a></li>
                <li><a href="{{url('studentPackageQuiz')}}"><i class="icon-screen3 position-left"></i> Course Quiz</a></li>
                <li><a href="{{url('studentPackageAssignment')}}"><i class="icon-file-text position-left"></i> Course Assignment</a></li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Course Quiz</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Quiz Name</th>
                    <th>Time Duration</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($data as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->quiz_name}}</td>
                        <td>{{$items->time_duration}} Minutes</td>
                        <td class="text-center">
                            @if($isSubmitQuiz == 0)
                                <a href="{{url('startPackageQuizExam/'.encrypt($items->id))}}" class="btn btn-info btn-sm" data-popup="tooltip" title="Start Quiz Exam" data-placement="top">Start Exam</a>
                            @else
                                @if(in_array($items->id,$isSubmitQuiz))
                                    <strong>Done</strong>
                                @else
                                    <a href="{{url('startPackageQuizExam/'.encrypt($items->id))}}" class="btn btn-info btn-sm" data-popup="tooltip" title="Start Quiz Exam" data-placement="top">Start Exam</a>
                                @endif
                            @endif
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
