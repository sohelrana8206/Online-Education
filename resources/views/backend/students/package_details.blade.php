@extends('templates.backend_master')

@section('content')

    <style>
        .discount{
            text-decoration: line-through;
            opacity: 0.4;
        }
    </style>

    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Package</span> Details</h4>
                </div>
            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                    <li class="active">Package Details</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">
            <div class="row">
                <div class="col-md-9">
                    <!-- Detached content -->
                    <div class="container-detached">
                        <div class="content-detached">

                            <!-- Course overview -->
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h6 class="panel-title text-semibold">{{$data->package_title}}</h6>
                                    <small>{{$data->package_sub_title}}</small><br>

                                    <?php
                                    $sub_cat = explode(',',$data->course_sub_category_id);

                                    $counter = 1;
                                    foreach($sub_cat as $catID){
                                        $filtered = $subCat->filter(function ($value, $key) use ($catID) {
                                            return $value->id == $catID;
                                        });

                                        $cat_info = $filtered->last();
                                        if($counter == 1){
                                            echo '<i class="fa fa-book"></i> <strong>'.$cat_info->course_secondary_category->course_primary_category->primary_category_name.'</strong> <i class="fa fa-arrow-right"></i>
                            <strong>'.$cat_info->course_secondary_category->secondary_category_name.'</strong> <i class="fa fa-arrow-right"></i>';
                                        }
                                        echo ' <label style="margin-right: 5px" class="badge badge-primary">'.$cat_info->sub_category_name.'</label>';

                                        $counter++;
                                    }
                                    ?>
                                </div>

                                <div class="panel-body">
                                    <div class="content-group-lg list-icon-style">
                                        <div class="content-group text-center">
                                            <img src="{{asset($data->package_image)}}" class="img-responsive" alt="FCTB Academy">
                                        </div>
                                        <h6 class="text-semibold">Package overview</h6>
                                        <p><?=$data->package_details?></p>
                                    </div>

                                    <div class="content-group-lg list-icon-style">
                                        <h6 class="text-semibold">Package Requirements</h6>
                                        <p><?=$data->package_requirement?></p>
                                    </div>

                                    <div class="content-group-lg list-icon-style">
                                        <h6 class="text-semibold">Package Component</h6>
                                        <p><?=$data->package_component?></p>
                                    </div>

                                    <div class="content-group-lg list-icon-style">
                                        <h6 class="text-semibold">Package Benefit</h6>
                                        <p><?=$data->package_benefit?></p>
                                    </div>

                                    <div class="content-group-lg list-icon-style">
                                        <h6 class="text-semibold">Package Content</h6>
                                        <p><?=$data->package_content?></p>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th width="12%">Lessons</th>
                                            <th width="15%">Name</th>
                                            <th width="53%">Description</th>
                                            <th width="10%">Duration</th>
                                            <th width="10%">Start Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $counter = 1; ?>
                                        @foreach($data->course_package_lesson as $lesson)
                                            <tr>
                                                <td>Lesson {{$counter}}</td>
                                                <td><a href="#">{{$lesson->package_lesson_title}}</a></td>
                                                <td><?=$lesson->package_lesson_description?></td>
                                                <td>{{$lesson->package_lesson_duration}}</td>
                                                <td>{{date('d M, Y',strtotime($lesson->package_lesson_start_date))}}</td>
                                            </tr>
                                            <?php $counter ++; ?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /course overview -->

                        </div>
                    </div>
                    <!-- /detached content -->
                </div>
                <div class="col-md-3">
                    <!-- Detached sidebar -->
                    <div class="sidebar-detached">
                        <div class="sidebar sidebar-default sidebar-separate">
                            <div class="sidebar-content">

                                <!-- Course details -->
                                <div class="sidebar-category">
                                    <div class="category-title">
                                        <span>Package details</span>
                                        <ul class="icons-list">
                                            <li><a href="#" data-action="collapse"></a></li>
                                        </ul>
                                    </div>

                                    <div class="category-content">

                                        <div class="form-group">
                                            <label class="control-label no-margin text-semibold">Duration:</label>
                                            <div class="pull-right">{{$data->package_duration.' Days'}}</div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label no-margin text-semibold">Institution Type:</label>
                                            <div class="pull-right">{{$data->institution_type->institution_type_name}}</div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label no-margin text-semibold">Reg. Last date:</label>
                                            <div class="pull-right">{{date('d M, Y',strtotime($data->course_package_cost->last()->package_registration_last_date))}}</div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label no-margin text-semibold">Course Start date:</label>
                                            <div class="pull-right">{{date('d M, Y',strtotime($data->course_package_cost->last()->package_start_date))}}</div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label no-margin text-semibold">Lessons:</label>
                                            <div class="pull-right">{{count($data->course_package_lesson)}} lessons</div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label no-margin text-semibold">Trainer:</label>
                                            <div class="pull-right">{{$data->user->name}}</div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label no-margin text-semibold">Price:</label>
                                            <div class="pull-right text-danger-600"><span class="discount">tk{{$data->course_package_cost->last()->package_fee}}</span><span> tk{{$data->course_package_cost->last()->package_discounted_cost}} </span></div>
                                        </div>
                                        <a style="display: block" href="{{url('purchasePackage/'.encrypt($data->id))}}" class="btn btn-warning">Purchase</a>
                                    </div>
                                </div>
                                <!-- /course details -->

                            </div>
                        </div>
                    </div>
                    <!-- /detached sidebar -->
                </div>
            </div>

        </div>
        <!-- /content area -->

    </div>

@endsection
