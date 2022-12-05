@extends('templates/frontend_master')
@section('content')
    <div id="search-area">
        <button type="button" class="close">×</button>
        <form><input type="search" value="" placeholder="Search Kewword(s)" /> <button type="submit" class="btn btn-primary">Search</button></form>
    </div>
    <div class="main-home-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="home-content">
                        <h1>Learn a new skill from online courses</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <form><input class="form-control" placeholder="Search courses..." /> <button type="submit" class="btn btn-primary">Search</button></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="boxes-area">
        <div class="container">
            <div class="boxes-inner-content">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-box">
                            <img src="{{url('public/assets/img/technology.jpg')}}" alt="technology" />
                            <div class="box-content">
                                <h3>Technology</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-box">
                            <img src="{{url('public/assets/img/business.jpg')}}" alt="business" />
                            <div class="box-content">
                                <h3>Business</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                        <div class="single-box">
                            <img src="{{url('public/assets/img/management.jpg')}}" alt="management" />
                            <div class="box-content">
                                <h3>Management</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="fun-fact">
                        <h3><span class="count">2500</span>+</h3>
                        <h5>Students</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="fun-fact">
                        <h3><span class="count">100</span>+</h3>
                        <h5>Teachers</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="fun-fact">
                        <h3><span class="count">55</span>+</h3>
                        <h5>Winnings Awards</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="fun-fact">
                        <h3><span class="count">1236</span>+</h3>
                        <h5>Certified Students</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="popular-courses-area ptb-100">
        <div class="top-divider"></div>
        <div class="container">
            <div class="section-title">
                <h3>Popular Courses</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco .</p>
            </div>
            <div class="row">
                @foreach($data as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="courses-item">
                            <div class="courses-img">
                                <img src="{{asset($item->course_image)}}" alt="FCTB Academy">
                            </div>

                            <div class="courses-content">
                                <h3><a href="{{url('fullCourseDetails/'.encrypt($item->id))}}">
                                        <?php
                                        $string = strip_tags($item->course_title);
                                        if (strlen($string) > 80) {
                                            $stringCut = substr($string, 0, 80);
                                            $string = substr($stringCut, 0, strrpos($stringCut, ' '));
                                        }
                                        echo $string.' ...';
                                        ?>
                                    </a></h3>
                                <strong><i style="color: #e60c3d" class="icofont-file-fill"></i> {{$item->course_sub_category->course_secondary_category->course_primary_category->primary_category_name}}</strong>
                                <strong> <i style="color: #e60c3d" class="icofont-file-fill"></i> {{$item->course_sub_category->course_secondary_category->secondary_category_name}}</strong>
                                <strong> <i style="color: #e60c3d" class="icofont-file-fill"></i> {{$item->course_sub_category->sub_category_name}}</strong>
                                <p>
                                    <strong><i style="color: #e60c3d" class="icofont-read-book"></i> {{$item->institution_type->institution_type_name}}</strong>
                                    <strong style="float:right"><i style="color: #e60c3d" class="icofont-clock-time"></i> {{$item->course_duration.' Days'}}</strong>
                                </p>

                                <p>
                                    <?php
                                    $string = strip_tags($item->course_details);
                                    if (strlen($string) > 200) {
                                        $stringCut = substr($string, 0, 200);
                                        $string = substr($stringCut, 0, strrpos($stringCut, ' '));
                                    }
                                    echo $string.' ...';
                                    ?>
                                </p>
                            </div>

                            <div class="courses-content-bottom">
                                <h4 class="price">
                                    @if($item->course_cost->last()->course_discount_rate > 0)
                                        <span>tk{{$item->course_cost->last()->course_fee}}</span>
                                    @endif
                                    tk{{$item->course_cost->last()->course_discounted_cost}}
                                </h4>
                                <h4><a href="{{url('fullCourseDetails/'.encrypt($item->id))}}" class="btn btn-primary">Read More</a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-lg-12 col-md-12">
                    <div class="view-all text-center">
                        <a href="{{url('allCourses')}}" class="btn btn-primary">View All Courses <i class="icofont-rounded-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-courses-area ptb-100">
        <div class="top-divider"></div>
        <div class="container">
            <div class="section-title">
                <h3>Popular Packages</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco .</p>
            </div>
            <div class="row">
                @foreach($dataPackage as $package)
                    <div class="col-lg-4 col-md-6">
                        <div class="courses-item">
                            <div class="courses-img">
                                <img src="{{asset($package->package_image)}}" alt="FCTB Academy">
                            </div>

                            <div class="courses-content">
                                <h3><a href="{{url('fullPackageDetails/'.encrypt($package->id))}}">
                                        <?php
                                        $string = strip_tags($package->package_title);
                                        if (strlen($string) > 80) {
                                            $stringCut = substr($string, 0, 80);
                                            $string = substr($stringCut, 0, strrpos($stringCut, ' '));
                                        }
                                        echo $string.' ...';
                                        ?>
                                    </a></h3>
                                <?php
                                $sub_cat = explode(',',$package->course_sub_category_id);

                                foreach($sub_cat as $catID){
                                    $filtered = $subCat->filter(function ($value, $key) use ($catID) {
                                        return $value->id == $catID;
                                    });

                                    $cat_info = $filtered->last();

                                    echo '<label style="margin-right: 5px" class="badge badge-primary">'.$cat_info->sub_category_name.'</label>';
                                }
                                ?>

                                <p>
                                    <strong><i style="color: #e60c3d" class="icofont-read-book"></i> {{$package->institution_type->institution_type_name}}</strong>
                                    <strong style="float:right"><i style="color: #e60c3d" class="icofont-clock-time"></i> {{$package->package_duration.' Days'}}</strong>
                                </p>

                                <p>
                                    <?php
                                    $string = strip_tags($package->package_details);
                                    if (strlen($string) > 200) {
                                        $stringCut = substr($string, 0, 200);
                                        $string = substr($stringCut, 0, strrpos($stringCut, ' '));
                                    }
                                    echo $string.' ...';
                                    ?>
                                </p>
                            </div>

                            <div class="courses-content-bottom">
                                <h4 class="price">
                                    @if($package->course_package_cost->last()->package_discount_rate > 0)
                                        <span>tk{{$package->course_package_cost->last()->package_fee}}</span>
                                    @endif
                                    tk{{$package->course_package_cost->last()->package_discounted_cost}}
                                </h4>
                                <h4><a href="{{url('fullPackageDetails/'.encrypt($package->id))}}" class="btn btn-primary">Read More</a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-lg-12 col-md-12">
                    <div class="view-all text-center">
                        <a href="{{url('allPackages')}}" class="btn btn-primary">View All Package <i class="icofont-rounded-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="why-choose-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12"><div class="image"></div></div>
                <div class="col-lg-6 col-md-12">
                    <div class="why-choose ptb-100">
                        <h3>Why Choose Us</h3>
                        <div class="single-choose">
                            <div class="icon"><i class="icofont-book-alt"></i></div>
                            <div class="content">
                                <h4>Popular Courses</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            </div>
                        </div>
                        <div class="single-choose">
                            <div class="icon"><i class="icofont-teacher"></i></div>
                            <div class="content">
                                <h4>Qualified Teachers</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            </div>
                        </div>
                        <div class="single-choose mb-0">
                            <div class="icon"><i class="icofont-support"></i></div>
                            <div class="content">
                                <h4>24/7 Online Support</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="teacher-area ptb-100">
        <div class="container">
            <div class="section-title">
                <h3>Our Teacher</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco .</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="teacher-box">
                        <div class="pic"><img src="{{url('public/assets/img/teacher-one.jpg')}}" alt="teacher" /> <a href="#" class="view-profile">View Profile</a></div>
                        <div class="teacher-content">
                            <h3 class="title"><a href="#">Jasika Pearl</a></h3>
                            <span class="post">Web Developer</span>
                            <ul>
                                <li>
                                    <a href="#"><i class="icofont-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="teacher-box">
                        <div class="pic"><img src="{{url('public/assets/img/teacher-two.jpg')}}" alt="teacher" /> <a href="#" class="view-profile">View Profile</a></div>
                        <div class="teacher-content">
                            <h3 class="title"><a href="#">Oliver Jack</a></h3>
                            <span class="post">Web Developer</span>
                            <ul>
                                <li>
                                    <a href="#"><i class="icofont-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="teacher-box">
                        <div class="pic"><img src="{{url('public/assets/img/teacher-three.jpg')}}" alt="teacher" /> <a href="#" class="view-profile">View Profile</a></div>
                        <div class="teacher-content">
                            <h3 class="title"><a href="#">Aisha Anna</a></h3>
                            <span class="post">Web Developer</span>
                            <ul>
                                <li>
                                    <a href="#"><i class="icofont-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="teacher-box">
                        <div class="pic"><img src="{{url('public/assets/img/teacher-four.jpg')}}" alt="teacher" /> <a href="#" class="view-profile">View Profile</a></div>
                        <div class="teacher-content">
                            <h3 class="title"><a href="#">Harry Jacob</a></h3>
                            <span class="post">Web Developer</span>
                            <ul>
                                <li>
                                    <a href="#"><i class="icofont-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="teacher-box">
                        <div class="pic"><img src="{{url('public/assets/img/teacher-five.jpg')}}" alt="teacher" /> <a href="#" class="view-profile">View Profile</a></div>
                        <div class="teacher-content">
                            <h3 class="title"><a href="#">Isabel Sarah</a></h3>
                            <span class="post">Web Developer</span>
                            <ul>
                                <li>
                                    <a href="#"><i class="icofont-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="teacher-box">
                        <div class="pic"><img src="{{url('public/assets/img/teacher-six.jpg')}}" alt="teacher" /> <a href="#" class="view-profile">View Profile</a></div>
                        <div class="teacher-content">
                            <h3 class="title"><a href="#">Oscar Noah</a></h3>
                            <span class="post">Web Developer</span>
                            <ul>
                                <li>
                                    <a href="#"><i class="icofont-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="ctr-area ptb-100">
        <div class="top-divider"></div>
        <div class="bottom-divider"></div>
        <div class="container">
            <div class="ctr-text-content">
                <h1>Units you need background knowledge to study</h1>
                <p>
                    These units have requirements for previous study or background knowledge. Check the unit’s previous study requirements for details. If you have any questions, contact the unit coordinator for the semester you want to
                    study.
                </p>
                <a href="#" class="btn btn-primary">Join Now</a>
            </div>
        </div>
    </div>
    <section class="upcoming-events-area events-two ptb-100">
        <div class="container">
            <div class="section-title">
                <h3>Upcoming Events</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco .</p>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="single-event mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 col-md-6 p-0">
                                <figure>
                                    <a href="#"> <span class="image" style="background-image: url('{{asset("public/assets/img/event-one.jpg")}}');"></span> <img src="{{url('public/assets/img/event-one.jpg')}}" alt="event" /> </a>
                                    <div class="date"><span>18 Jan, 2019</span></div>
                                </figure>
                            </div>
                            <div class="col-lg-6 col-md-6 p-0">
                                <div class="event-content">
                                    <h3>Web Development</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                        ut aliquip ex ea commodo consequat.
                                    </p>
                                    <div class="where-when">
                                        <ul class="pull-left">
                                            <li><span>Where</span></li>
                                            <li>Fort Mason Center Victoria City, Canada</li>
                                        </ul>
                                        <ul>
                                            <li><span>When</span></li>
                                            <li>Sunday</li>
                                            <li>3.30 pm - 6.30 pm</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="btn btn-primary">View Details <i class="icofont-rounded-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="single-event mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 col-md-6 p-0">
                                <div class="event-content">
                                    <h3>Ruby on Rails Framework</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                        ut aliquip ex ea commodo consequat.
                                    </p>
                                    <div class="where-when">
                                        <ul class="pull-left">
                                            <li><span>Where</span></li>
                                            <li>Fort Mason Center Victoria City, Canada</li>
                                        </ul>
                                        <ul>
                                            <li><span>When</span></li>
                                            <li>Sunday</li>
                                            <li>3.30 pm - 6.30 pm</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="btn btn-primary">View Details <i class="icofont-rounded-double-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 p-0">
                                <figure>
                                    <a href="#"> <span class="image" style="background-image: url('{{asset("public/assets/img/event-two.jpg")}}');"></span> <img src="{{url('public/assets/img/event-two.jpg')}}" alt="event" /> </a>
                                    <div class="date"><span>18 Jan, 2019</span></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="single-event mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 col-md-6 p-0">
                                <figure>
                                    <a href="#"> <span class="image" style="background-image: url('{{asset("public/assets/img/event-three.jpg")}}');"></span> <img src="{{url('public/assets/img/event-three.jpg')}}" alt="event" /> </a>
                                    <div class="date"><span>18 Jan, 2019</span></div>
                                </figure>
                            </div>
                            <div class="col-lg-6 col-md-6 p-0">
                                <div class="event-content">
                                    <h3>WordPress Framework</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                        ut aliquip ex ea commodo consequat.
                                    </p>
                                    <div class="where-when">
                                        <ul class="pull-left">
                                            <li><span>Where</span></li>
                                            <li>Fort Mason Center Victoria City, Canada</li>
                                        </ul>
                                        <ul>
                                            <li><span>When</span></li>
                                            <li>Sunday</li>
                                            <li>3.30 pm - 6.30 pm</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="btn btn-primary">View Details <i class="icofont-rounded-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="how-it-works red-bg ptb-100">
        <div class="top-divider"></div>
        <div class="bottom-divider"></div>
        <div class="container">
            <div class="section-title">
                <h3>How It Works<span>?</span></h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="work-process">
                        <i class="icofont-search-document"></i>
                        <h3>Search Courses</h3>
                        <p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel ignota fierent rreloquentiam id.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="work-process">
                        <i class="icofont-info"></i>
                        <h3>View Course Details</h3>
                        <p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel ignota fierent rreloquentiam id.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="work-process">
                        <i class="icofont-like"></i>
                        <h3>Apply, Enroll or Register</h3>
                        <p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel ignota fierent rreloquentiam id.</p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="view-all text-center">
                        <a href="#" class="btn btn-primary">Register Now <i class="icofont-rounded-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonials-area ptb-100">
        <div class="container">
            <div class="section-title">
                <h3>Testimonials</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco .</p>
            </div>
        </div>
        <div class="row m-0">
            <div class="testimonials-slider">
                <div class="col-lg-12 col-md-12">
                    <div class="single-feedback">
                        <img src="{{url('public/assets/img/client1.jpg')}}" alt="client" />
                        <div class="feedback-content">
                            <i class="icofont-quote-left"></i>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat.
                            </p>
                            <h3>Jason Stamtham</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="single-feedback">
                        <img src="{{url('public/assets/img/client2.jpg')}}" alt="client" />
                        <div class="feedback-content">
                            <i class="icofont-quote-left"></i>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat.
                            </p>
                            <h3>Jason Stamtham</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="single-feedback">
                        <img src="{{url('public/assets/img/client3.jpg')}}" alt="client" />
                        <div class="feedback-content">
                            <i class="icofont-quote-left"></i>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat.
                            </p>
                            <h3>Jason Stamtham</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="newsletter-area ptb-100">
        <div class="container">
            <div class="newsletter">
                <h3>Sign up to our newsletter</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                <form><input class="form-control" placeholder="Enter your email address..." /> <button type="submit" class="btn btn-primary">Subscribe Now</button></form>
            </div>
        </div>
    </section>
    <section class="news-area ptb-100">
        <div class="container">
            <div class="section-title">
                <h3>EduField News</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
            </div>
            <div class="row">
                <div class="news-slider">
                    <div class="col-lg-12 col-md-12">
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="#"><img src="{{url('public/assets/img/blog-one.jpg')}}" alt="blog" /></a>
                            </div>
                            <div class="blog-content">
                                <h4>
                                    <span><i class="icofont-ui-user"></i> Posted by <a href="#">Admin</a></span> <span class="date"><i class="icofont-ui-calendar"></i> 18 Jan, 2019</span>
                                </h4>
                                <h3><a href="#">Those Other College Expenses You Aren't Thinking About</a></h3>
                                <a href="#" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="#"><img src="{{url('public/assets/img/blog-two.jpg')}}" alt="blog" /></a>
                            </div>
                            <div class="blog-content">
                                <h4>
                                    <span><i class="icofont-ui-user"></i> Posted by <a href="#">Admin</a></span> <span class="date"><i class="icofont-ui-calendar"></i> 18 Jan, 2019</span>
                                </h4>
                                <h3><a href="#">Excepteur sint occaecat cupidatat non proident quaerat voluptatem.</a></h3>
                                <a href="#" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="#"><img src="{{url('public/assets/img/blog-three.jpg')}}" alt="blog" /></a>
                            </div>
                            <div class="blog-content">
                                <h4>
                                    <span><i class="icofont-ui-user"></i> Posted by <a href="#">Admin</a></span> <span class="date"><i class="icofont-ui-calendar"></i> 18 Jan, 2019</span>
                                </h4>
                                <h3><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h3>
                                <a href="#" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection