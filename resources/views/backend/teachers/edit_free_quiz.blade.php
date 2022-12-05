@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Free Quiz</span> Edit form</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{url('freeQuizSetting')}}" class="btn btn-info"><i class="fa fa-list"></i> Free Quiz Setting</a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Free Quiz Edit form</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">


        <!-- Registration form -->
        <form style="margin-bottom: 50px" action="{{url('updateFreeQuiz/'.encrypt($data->id))}}" method="post">
            @csrf
            @method('PUT')
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Free Quiz Edit Form</h5>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quiz Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="quiz_name" value="{{$data->quiz_name}}" placeholder="Quiz Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Time Duration(Minutes)<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="time_duration" value="{{$data->time_duration}}" placeholder="Time Duration(Minute)" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Course Primary Category</label>
                                <select class="select" id="primaryCat" data-href="{{url('secondaryCat')}}">
                                    <option>Select Primary Category</option>
                                    @foreach($primary_cat as $item)
                                        <option @if($item->id == $data->course_sub_category->course_secondary_category->course_primary_category->id) {{'selected="selected"'}} @endif value="{{$item->id}}">{{$item->primary_category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Course Secondary Category</label>
                                <select class="select" name="secondaryCategory" id="subCat" data-href="{{url('subCat')}}">
                                    <option>Select Secondary Category</option>
                                    @foreach($sec_cat as $sec)
                                        <option @if($sec->id == $data->course_sub_category->course_secondary_category->id) {{'selected="selected"'}} @endif value="{{$sec->id}}">{{$sec->secondary_category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Course Sub Category</label>
                                <select class="select" name="course_sub_category_id" id="subcategory">
                                    <option>Select Sub Category</option>
                                    @foreach($sub_cat as $sub)
                                        <option @if($sub->id == $data->course_sub_category->id) {{'selected="selected"'}} @endif value="{{$sub->id}}">{{$sub->sub_category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary">Update Free Quiz <i class="icon-arrow-right14 position-right"></i></button>
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
