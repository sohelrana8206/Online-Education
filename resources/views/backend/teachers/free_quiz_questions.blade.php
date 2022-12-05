@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Free Quiz</span> Questions</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    @can('create-free-quiz-questions')
                    <a href="{{url('createFreeQuizQuestions/'.encrypt($id))}}" class="btn btn-info"><i class="fa fa-plus"></i> Add New Quiz Questions</a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Free Quiz Questions</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Free Quiz Questions</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Questions</th>
                    <th>Option One</th>
                    <th>Option Two</th>
                    <th>Option Three</th>
                    <th>Option Four</th>
                    <th>Answer</th>
                    <th width="15%" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($data as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->questions}}</td>
                        <td>{{$items->option_one}}</td>
                        <td>{{$items->option_two}}</td>
                        <td>{{$items->option_three}}</td>
                        <td>{{$items->option_four}}</td>
                        <td>{{$items->answer}}</td>
                        <td class="text-center">
                            @can('edit-free-quiz-questions')
                            <a href="{{url('editFreeQuizQuestion/'.encrypt($items->id))}}" class="btn btn-primary btn-sm" data-popup="tooltip" title="Edit Free Quiz" data-placement="top"><i class="fa fa-pencil"></i></a>
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
