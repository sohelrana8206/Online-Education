@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Free Quiz Questions</span> Create form</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{url('freeQuizQuestions/'.encrypt($id))}})}}" class="btn btn-info"><i class="fa fa-list"></i> Free Quiz Questions</a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Free Quiz Questions Create form</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">


        <!-- Registration form -->
        <form style="margin-bottom: 50px" action="{{url('storeFreeQuizQuestions/'.encrypt($id))}}" method="post">
            @csrf
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Free Quiz Questions Create Form</h5>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Question</label>
                                <input type="text" class="form-control" name="questions" placeholder="Question" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Option One</label>
                                <input type="text" class="form-control" name="option_one" placeholder="Option One" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Option Two</label>
                                <input type="text" class="form-control" name="option_two" placeholder="Option Two" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Option Three</label>
                                <input type="text" class="form-control" name="option_three" placeholder="Option Three">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Option Four</label>
                                <input type="text" class="form-control" name="option_four" placeholder="Option Four">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Answer</label>
                                <input type="text" class="form-control" name="answer" placeholder="Answer" required>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary">Create Free Quiz Question <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /registration form -->

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection
