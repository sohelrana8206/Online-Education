@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Teacher Evaluation Form</span></h4>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <form style="margin-bottom: 50px" action="{{url('storeTeacherEvaluation')}}" method="post">
            @csrf
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Teacher Evaluation Form</h5>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Teacher Rating</label>
                                <select class="form-control" name="rating">
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Comments</label>
                                <textarea class="form-control" id="editor" name="comments" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="text-left">
                        <input type="hidden" name="course_id" value="{{$id[0]}}">
                        <input type="hidden" name="type" value="{{$id[1]}}">
                        <button type="submit" class="btn btn-primary">Submit Review <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /basic datatable -->

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection