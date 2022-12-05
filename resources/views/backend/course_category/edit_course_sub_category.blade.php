@extends('templates/backend_master')
@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Course Sub Category Edit</span> Form</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li><a href="{{url('courseSubCategory')}}">Course Sub Category List</a></li>
                <li class="active">Course Sub Category Edit Form</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <!-- Vertical form options -->
        <div class="row">
            <div class="col-md-12">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                            <!-- Basic layout-->
                    <form style="margin-bottom: 50px" action="{{url('subCategoryUpdate/'.$data->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Course Sub Category Edit Form</h5>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sub Category Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="sub_category_name" value="{{$data->Sub_category_name}}" placeholder="Sub Category Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Secondary Category</label>
                                            <select class="select" name="course_secondary_category_id">
                                                @foreach($secondary_category as $item)
                                                    <optgroup label="{{$item->course_primary_category->primary_category_name}}">
                                                        <option @if($item->id == $data->course_secondary_category_id) {{'selected="selected"'}} @endif value="{{$item->id}}">{{$item->secondary_category_name}}</option>
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary">Update Category <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /basic layout -->

            </div>
        </div>
        <!-- /vertical form options -->

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection
