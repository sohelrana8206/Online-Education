@extends('templates.backend_master')

@section('content')

    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Course Package</span> Details</h4>
                </div>
            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                    <li class="active">Course Details</li>
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

                                <ul class="nav nav-lg nav-tabs nav-tabs-bottom nav-tabs-toolbar no-margin">
                                    <li class="active"><a href="#course-overview" data-toggle="tab"><i class="icon-menu7 position-left"></i> Overview</a></li>
                                    <li><a href="#course-attendees" data-toggle="tab"><i class="icon-people position-left"></i> Attendees</a></li>
                                    <li><a href="#course-schedule" data-toggle="tab"><i class="icon-calendar3 position-left"></i> Schedule</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="course-overview">
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
                                                        <td>{{date('M d, Y',strtotime($lesson->package_lesson_start_date))}}</td>
                                                    </tr>
                                                    <?php $counter ++; ?>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="course-attendees">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">James Alexander</h6>
                                                                <span class="text-muted">Lead developer</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Nathan Jacobson</h6>
                                                                <span class="text-muted">Lead UX designer</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Margo Baker</h6>
                                                                <span class="text-muted">Sales manager</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Barbara Walden</h6>
                                                                <span class="text-muted">SEO specialist</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Hanna Dorman</h6>
                                                                <span class="text-muted">UX/UI designer</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Benjamin Loretti</h6>
                                                                <span class="text-muted">Network engineer</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Vanessa Aurelius</h6>
                                                                <span class="text-muted">Front end guru</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">William Brenson</h6>
                                                                <span class="text-muted">Chief officer</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Lucy North</h6>
                                                                <span class="text-muted">UX/UI designer</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Vicky Barna</h6>
                                                                <span class="text-muted">Network engineer</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Hugo Bills</h6>
                                                                <span class="text-muted">Front end guru</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Tony Gurrano</h6>
                                                                <span class="text-muted">CEO and Founder</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Jeremy Victorino</h6>
                                                                <span class="text-muted">Marketing specialist</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Monica Smith</h6>
                                                                <span class="text-muted">Financial officer</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Bastian Miller</h6>
                                                                <span class="text-muted">Web developer</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Jordana Mills</h6>
                                                                <span class="text-muted">Designer</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Buzz Brenson</h6>
                                                                <span class="text-muted">Business developer</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Zachary Willson</h6>
                                                                <span class="text-muted">Network engineer</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">William Miles</h6>
                                                                <span class="text-muted">Front end dev</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img src="assets/images/placeholder.jpg" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="media-body">
                                                                <h6 class="media-heading">Freddy Walden</h6>
                                                                <span class="text-muted">Marketing specialist</span>
                                                            </div>

                                                            <div class="media-right media-middle">
                                                                <ul class="icons-list">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
                                                                            <li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
                                                                            <li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><i class="icon-history pull-right"></i> History</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-center content-group pt-20">
                                                <ul class="pagination">
                                                    <li class="disabled"><a href="#">&larr;</a></li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><span>...</span></li>
                                                    <li><a href="#">58</a></li>
                                                    <li><a href="#">59</a></li>
                                                    <li><a href="#">&rarr;</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="course-schedule">
                                        <div class="panel-body">
                                            <div class="schedule"></div>
                                        </div>
                                    </div>
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
                                            <label class="control-label no-margin text-semibold">Status:</label>
                                            <div class="pull-right">
                                                @if($data->is_package_verified == 0)
                                                    <label class="badge bg-blue">Pending</label>
                                                @elseif($data->is_package_verified == 1)
                                                    <label class="badge bg-blue">Approved</label>
                                                @else
                                                    <label class="badge bg-blue">Rejected</label>
                                                @endif
                                            </div>
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
                                            <div class="pull-right"><a href="#">{{auth()->user()->name}}</a></div>
                                        </div>
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
