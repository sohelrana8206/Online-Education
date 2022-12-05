@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Course Package</span> Create form</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{url('coursePackageList')}}" class="btn btn-info"><i class="fa fa-list"></i> Course Package List</a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Course Package Create form</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">


        <!-- Registration form -->
        <form style="margin-bottom: 50px" action="{{url('coursePackageStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Course Package Create Form</h5>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Package Title</label>
                                <input type="text" class="form-control" name="package_title" placeholder="Package Title" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Package Sub Title</label>
                                <input type="text" class="form-control" name="package_sub_title" placeholder="Package Sub Title" required>
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
                                <select multiple="multiple" data-placeholder="Enter Sub Categories" class="select" name="course_sub_category_id" id="subcategory">
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
                                <label>Package Duration(Days)</label>
                                <input type="number" class="form-control" name="package_duration" placeholder="Package Duration" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Package Image</label>
                                <input type="file" class="form-control" name="package_image" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Package Details</label>
                            <textarea class="form-control" id="editor" name="package_details"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Package Requirement</label>
                            <textarea class="form-control" id="editor1" name="package_requirement"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Package Component</label>
                            <textarea class="form-control" id="editor2" name="package_component"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Package Benefit</label>
                            <textarea class="form-control" id="editor3" name="package_benefit"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Package Content</label>
                            <textarea class="form-control" id="editor4" name="package_content"></textarea>
                        </div>
                    </div>

                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary">Create Package <i class="icon-arrow-right14 position-right"></i></button>
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
