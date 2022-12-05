<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FCTB Academy</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{url('public/admin-assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/admin-assets/css/icons/fontawesome/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/admin-assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/admin-assets/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/admin-assets/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/admin-assets/css/colors.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/admin-assets/css/custom.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{url('public/admin-assets/js/plugins/loaders/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin-assets/js/core/libraries/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin-assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin-assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{url('public/admin-assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin-assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin-assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript" src="{{url('public/admin-assets/js/core/app.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin-assets/js/pages/datatables_basic.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin-assets/js/pages/form_layouts.js')}}"></script>
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <script src="{{asset('public/admin-assets/js/custom.js')}}"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{url('dashboard')}}"><img src="{{url('public/admin-assets/images/logo-admin.png')}}" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
        <p class="navbar-text">
            @if(session()->has('referral_code'))
                @if (!empty(session('referral_code')))
                    @if(session('referral_code') == 'expired')
                        <span class="label bg-success"><a style="color: #fff;" href="{{url('getReferral')}}">Update Referral Package</a> </span>
                    @else
                        <span class="label bg-success">Referral ID: {{session('referral_code')}}</span>
                    @endif
                @else
                    <span class="label bg-success"><a style="color: #fff;" href="{{url('getReferral')}}">Get Referral</a> </span>
                @endif
            @endif
        </p>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    @if(!empty(session('profile_pic')))
                        <?php $profile_pic = session('profile_pic'); ?>
                    @else
                        <?php $profile_pic = 'public/admin-assets/images/profile-pic.png'; ?>
                    @endif
                    <img src="{{asset($profile_pic)}}" alt="">
                    <span>{{auth()->user()->name}}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{url('userProfile')}}"><i class="icon-user-plus"></i> My profile</a></li>
                    <li><a href="{{url('myNotifications')}}"> <i class="icon-comment-discussion"></i> Notification</a></li>
                    <li class="divider"></li>
                    <li><a href="{{url('logout')}}"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">
