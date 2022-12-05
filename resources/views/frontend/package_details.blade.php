@extends('templates/inner_frontend_master')
@section('content')

    <style>
        .course-details-tabs #tabs>li {
            display: inline-block;
            padding: 12px 15px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            background: #eaeaea;
        }
        .discount{
            text-decoration: line-through;
            opacity: 0.4;
        }
    </style>

    <!-- Start Page Title Area -->
    <div class="page-title">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <h3>Package Details</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Course Details Area -->
    <section class="course-details-area ptb-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="courses-details">

                        <div class="courses-details-img">
                            <img width="100%" src="{{asset($data->package_image)}}" alt="courses-details">
                        </div>

                        <h3>{{$data->package_title}}</h3>

                        <p>{{$data->package_subtitle}}</p>

                        <i style="color: #e60c3d" class="icofont-file-fill"></i>
                        <?php
                        $sub_cat = explode(',',$data->course_sub_category_id);

                        $counter = 1;
                        foreach($sub_cat as $catID){
                            $filtered = $subCat->filter(function ($value, $key) use ($catID) {
                                return $value->id == $catID;
                            });

                            $cat_info = $filtered->last();
                            if($counter == 1){
                                echo '<i class="fa fa-book"></i> <strong>'.$cat_info->course_secondary_category->course_primary_category->primary_category_name.'</strong> >
                            <strong>'.$cat_info->course_secondary_category->secondary_category_name.'</strong>';
                            }
                            echo ' <label style="margin-right: 5px" class="badge badge-primary">'.$cat_info->sub_category_name.'</label>';

                            $counter++;
                        }
                        ?>

                        <p>
                            <strong><i style="color: #e60c3d" class="icofont-read-book"></i> Institution Type: <span>{{$data->institution_type->institution_type_name}}</span></strong>
                        </p>

                        <div class="course-details-tabs">
                            <ul id="tabs">
                                <li class="active" id="tab_1">Description</li>
                                <li class="inactive" id="tab_2">Course Requirements</li>
                                <li class="inactive" id="tab_3">Course Component</li>
                                <li class="inactive" id="tab_4">Course Benefit</li>
                                <li class="inactive" id="tab_5">Course Content</li>
                            </ul>

                            <div class="content show" id="tab_1_content">
                                <h4 class="title">Course overview</h4>
                                <?=$data->package_details?>
                            </div>

                            <div class="content" id="tab_2_content">
                                <h4 class="title">Course Requirements</h4>
                                <?=$data->package_requirement?>
                            </div>

                            <div class="content" id="tab_3_content">
                                <h4 class="title">Course Component</h4>
                                <?=$data->package_component?>
                            </div>

                            <div class="content" id="tab_4_content">
                                <h4 class="title">Course Benefit</h4>
                                <?=$data->package_benefit?>
                            </div>

                            <div class="content" id="tab_5_content">
                                <h4 class="title">Course Content</h4>
                                <?=$data->package_content?>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
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
                                        <td>{{date('M d, Y',strtotime($lesson->package_lesson_start_date))}}</td>
                                    </tr>
                                    <?php $counter ++; ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="side-bar mb-0">
                        <div class="single-widget features-box">
                            <h3 class="title">Course Features</h3>

                            <ul>
                                <li><i class="icofont-file-fill"></i> Lessons <span>{{count($data->course_package_lesson)}} lessons</span></li>

                                <li><i class="icofont-clock-time"></i> Duration <span>{{$data->package_duration.' Days'}}</span></li>

                                <li><i class="icofont-clock-time"></i> Registration Last date <span>{{date('d M, Y',strtotime($data->course_package_cost->last()->package_registration_last_date))}}</span></li>

                                <li><i class="icofont-clock-time"></i> Course Start date <span>{{date('d M, Y',strtotime($data->course_package_cost->last()->package_start_date))}}</span></li>

                                <li><i class="icofont-checked"></i> Trainer <span>{{$data->user->name}}</span></li>

                                <li><i class="icofont-price"></i> Price  <span class="discount">tk{{$data->course_package_cost->last()->package_fee}}</span><span> tk{{$data->course_package_cost->last()->package_discounted_cost}} </span></li>
                            </ul>

                            <a style="display: block" href="{{url('course_register/'.encrypt($data->id.'_package'))}}" class="btn btn-primary">Apply Now</a>
                        </div>

                        <div class="single-widget latest-courses">
                            <h3 class="title">Latest Courses</h3>

                            @foreach($latestCourse as $latest)
                                <div class="single-latest-courses">
                                    <div class="img">
                                        <a href="{{url('fullPackageDetails/'.encrypt($latest->id))}}"><img src="{{asset($latest->package_image)}}" alt="FCTB Academy"></a>
                                    </div>

                                    <div class="content">
                                        <h4><a href="{{url('fullPackageDetails/'.encrypt($latest->id))}}">{{$latest->package_title}}</a></h4>

                                        <p><span>tk{{$latest->course_package_cost->last()->package_fee}}</span> tk{{$latest->course_package_cost->last()->package_discounted_cost}}</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Course Details Area -->

@endsection