@extends('templates/backend_master')

@section('content')
<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Student</span> - Dashboard</h4>
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
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- NOTIFICATION -->
        @if(!empty($notification))
            <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <h6 class="alert-heading text-semibold">{{$notification['title']}}</h6>
                <?=$notification['details']?>
            </div>
        @endif
        <!-- /NOTIFICATION -->
        @if(count($courseData) > 0)
                <h3>My Active Courses</h3>
            <div class="row">
                @foreach($courseData as $data)
                    @if($data->type == 'course')
                        <div class="col-sm-4">

                            <!-- Widget with rounded icon -->
                            <div class="panel">
                                <div class="panel-body text-center">
                                    <div class="icon-object border-success text-success"><i class="icon-book"></i></div>
                                    <h5 class="text-semibold">{{$data->course->course_title}}</h5>
                                    <p class="mb-15">By {{$data->course->user->name}}</p>
                                    <a href="{{url('courseStart/'.encrypt($data->course->id.'_'.$data->type))}}" class="btn bg-success-400">Enter</a>
                                </div>
                            </div>
                            <!-- /widget with rounded icon -->

                        </div>
                    @else
                        <div class="col-sm-4">

                            <!-- Widget with rounded icon -->
                            <div class="panel">
                                <div class="panel-body text-center">
                                    <div class="icon-object border-success text-success"><i class="icon-book"></i></div>
                                    <h5 class="text-semibold">{{$data->course_package->package_title}}</h5>
                                    <p class="mb-15">By {{$data->course_package->user->name}}</p>
                                    <a href="{{url('courseStart/'.encrypt($data->course_package->id.'_'.$data->type))}}" class="btn bg-success-400">Enter</a>
                                </div>
                            </div>
                            <!-- /widget with rounded icon -->

                        </div>
                    @endif
                @endforeach
            </div>
        @else
                <h3>Find Courses</h3>
                <form style="margin-bottom: 50px" id="search_form" data-href="{{url('courseSearchResult')}}" method="post">
                    @csrf
                    <div class="panel panel-flat">

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
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
                                        <select class="select" name="secondaryCategory" id="subCat" data-href="{{url('subCat')}}">
                                            <option>Select Secondary Category</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="select" name="course_sub_category_id" id="subcategory">
                                            <option>Select Sub Category</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="select" name="institution_type_id" id="institution_type_id">
                                            <option>Select Institution Type</option>
                                            @foreach($institution as $items)
                                                <option value="{{$items->id}}">{{$items->institution_type_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="select" name="type" id="type">
                                            <option>Select Type</option>
                                            <option value="course">Course</option>
                                            <option value="package">Package</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right mt-5">
                                <button class="btn btn-primary findCourse">Find Course <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>

            <div class="course_search_result"></div>
        @endif

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->
@endsection
