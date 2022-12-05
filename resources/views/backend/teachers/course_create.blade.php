@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Course</span> Create form</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{url('courseList')}}" class="btn btn-info"><i class="fa fa-list"></i> Course List</a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Course Create form</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">


        <!-- Registration form -->
        <form style="margin-bottom: 50px" action="{{url('courseStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Course Create Form</h5>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Course Title</label>
                                <input type="text" class="form-control" name="course_title" placeholder="Course Title" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Course Sub Title</label>
                                <input type="text" class="form-control" name="course_sub_title" placeholder="Course Sub Title" required>
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
                                        <option value="{{$item->id}}">{{$item->primary_category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Course Secondary Category</label>
                                <select class="select" name="secondaryCategory" id="subCat" data-href="{{url('subCat')}}">
                                    <option>Select Secondary Category</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Course Sub Category</label>
                                <select class="select" name="course_sub_category_id" id="subcategory">
                                    <option>Select Sub Category</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Institution Type</label>
                                <select class="select" name="institution_type_id">
                                    <option>Select Institution Type</option>
                                    @foreach($institution as $items)
                                        <option value="{{$items->id}}">{{$items->institution_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Course Duration(Days)</label>
                                <input type="number" class="form-control" name="course_duration" placeholder="Course Duration" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Course Image</label>
                                <input type="file" class="form-control" name="course_image" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Course Details</label>
                            <textarea class="form-control" id="editor" name="course_details" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Course Requirement</label>
                            <textarea class="form-control" id="editor1" name="course_requirement" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Course Component</label>
                            <textarea class="form-control" id="editor2" name="course_component" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Course Benefit</label>
                            <textarea class="form-control" id="editor3" name="course_benefit" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Course Content</label>
                            <textarea class="form-control" id="editor4" name="course_content" required></textarea>
                        </div>
                    </div>

                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary">Create Course <i class="icon-arrow-right14 position-right"></i></button>
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
