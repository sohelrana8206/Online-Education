<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="{{url('public/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/css/icofont.min.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/css/classy-nav.min.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/css/animate.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/css/responsive.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FCTB - Academy</title>
    <link rel="icon" type="image/png" href="{{url('public/assets/img/favicon.png')}}" />

    <style>
        .classynav ul li{
            padding: 10px;
        }

        .classynav .dropdown li{
            padding: 0;
        }

        .classynav ul li a{
            color: #FFFFFF !important;
        }
        .classynav .dropdown li a{
            color: #000 !important;
        }

        .light .has-down .dd-arrow::before,
        .light .has-down .dd-arrow::after{
            background-color: #fff;
        }

        .main-header-area .classynav ul li a.active, .main-header-area .classynav ul li a:hover {
            color: #e60c3d !important;
        }
        .main-header-area .classynav ul li a.active, .main-header-area .classynav ul li a:hover {
            color: #e60c3d !important;
        }

        .ptb-10{
            margin-top: 10px;
        }
        .ptb-25{
            margin-top: 25px;
        }
    </style>
</head>
<body>
<div class="preloader-area">
    <div class="loader">
        <div class="dots">
            <i class="dots-item dots-item-move-down"></i> <i class="dots-item dots-item-move-left"></i> <i class="dots-item dots-item-move-left"></i> <i class="dots-item dots-item-move-left"></i>
            <i class="dots-item dots-item-move-left"></i> <i class="dots-item dots-item-move-down"></i> <i class="dots-item dots-item-move-right"></i> <i class="dots-item dots-item-move-right"></i>
            <i class="dots-item dots-item-move-down"></i> <i class="dots-item dots-item-move-up"></i> <i class="dots-item dots-item-move-down"></i> <i class="dots-item dots-item-move-up"></i> <i class="dots-item"></i>
            <i class="dots-item dots-item-move-down"></i> <i class="dots-item dots-item-move-up"></i> <i class="dots-item dots-item-move-down"></i> <i class="dots-item dots-item-move-up"></i>
            <i class="dots-item dots-item-move-left"></i> <i class="dots-item dots-item-move-left"></i> <i class="dots-item dots-item-move-up"></i> <i class="dots-item dots-item-move-right"></i>
            <i class="dots-item dots-item-move-right"></i> <i class="dots-item dots-item-move-right"></i> <i class="dots-item dots-item-move-right"></i> <i class="dots-item dots-item-move-up"></i>
        </div>
    </div>
</div>
<div class="main-header-area header-sticky">
    <div class="container">
        <div class="classy-nav-container breakpoint-off">
            <nav class="classy-navbar justify-content-between" id="EduStudyNav">
                <a class="nav-brand" href="{{url('')}}"><img src="{{url('public/assets/img/logo.png')}}" alt="logo" /></a>
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <div class="classy-menu">
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <div class="classynav">
                        <ul>
                            <li><a href="{{url('')}}">Home</a></li>
                            <li><a href="{{url('aboutUs')}}" class="{{ request()->is('*aboutUs*') ? 'active' : '' }}">About Us</a></li>
                            <li><a href="#" class="{{ request()->is('*categoryCourses*') ? 'active' : '' }}">Courses</a>
                                <ul class="dropdown">
                                    @foreach($cat as $item)
                                        <li><a href="{{url('categoryCourses/'.$item->id)}}">{{$item->primary_category_name}}</a>
                                            <ul class="dropdown">
                                                <?php
                                                $priCatID = $item->id;
                                                $filtered = $secCat->filter(function ($value, $key) use ($priCatID) {
                                                    return $value->course_primary_category_id == $priCatID;
                                                });
                                                ?>
                                                @foreach($filtered as $value)
                                                    <li><a href="{{url('categoryCourses/'.$value->id)}}">{{$value->secondary_category_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{url('termsCondition')}}" class="{{ request()->is('*termsCondition*') ? 'active' : '' }}">Terms and condition </a></li>
                            <li><a href="{{url('privacyPolicy')}}" class="{{ request()->is('*privacyPolicy*') ? 'active' : '' }}">Privacy policy </a></li>
                            <li><a href="{{url('contact')}}" class="{{ request()->is('*contact*') ? 'active' : '' }}">Contact</a></li>
                            <li><a href="{{url('user_register')}}">Registration</a></li>
                            <li><a href="{{url('admin')}}">Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
