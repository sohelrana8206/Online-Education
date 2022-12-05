@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Course Assignment</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Course Assignment</li>
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
                <h5 class="panel-title">Course Assignment</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Assignment Title</th>
                    <th>Assignment Details</th>
                    <th>Assignment Submit Last Date</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($data as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->title}}</td>
                        <td><?=$items->details?></td>
                        <td><?=date('d F, Y',strtotime($items->submit_last_date))?></td>
                        <td class="text-center">
                            @if($isSubmitAssignment == 0)
                                <a style="cursor: pointer" data-href="{{url('startPackageAssignment')}}" data-id="{{$items->id}}" class="btn btn-info btn-sm startPackageAssignment" data-popup="tooltip" title="Submit Assignment" data-placement="top">Submit Assignment</a>
                            @else
                                @if(in_array($items->id,$isSubmitAssignment))
                                    <strong>Done</strong>
                                @else
                                    <a style="cursor: pointer" data-href="{{url('startPackageAssignment')}}" data-id="{{$items->id}}" class="btn btn-info btn-sm startPackageAssignment" data-popup="tooltip" title="Submit Assignment" data-placement="top">Submit Assignment</a>
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
