<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FCTB Academy</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{url('public/admin-assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/admin-assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/admin-assets/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/admin-assets/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/admin-assets/css/colors.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{url('public/admin-assets/js/plugins/loaders/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin-assets/js/core/libraries/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin-assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin-assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{url('public/admin-assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript" src="{{url('public/admin-assets/js/core/app.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin-assets/js/pages/login.js')}}"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container login-cover">

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content pb-20">

                <!-- Registration form -->
                <form style="margin-bottom: 50px" action="{{url('registration')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <div class="panel registration-form">
                                <div class="panel-body">
                                    <div class="text-center">
                                        <a class="nav-brand" href="{{url('')}}"><img src="{{url('public/assets/img/logo.png')}}" alt="logo" /></a>
                                        <h5 class="content-group-lg">Create account <small class="display-block">All fields are required</small></h5>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group has-feedback">
                                                <label>Applicant Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" placeholder="Input your Name" required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-plus text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group has-feedback">
                                                <label>Referral Code<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="referral_code" placeholder="Enter Referral Code">
                                                <div class="form-control-feedback">
                                                    <i class="icon-users2 text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label>Email Address<span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" name="email" placeholder="Your email" required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-mention text-muted"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label>Mobile Number<span class="text-danger">*</span></label>
                                                <div style="left: 0;top: 28px;" class="form-control-feedback">
                                                    +880
                                                </div>
                                                <input style="padding-left: 40px;padding-right: 12px;" type="tel" maxlength="10" class="form-control" name="mobile" placeholder="Your Mobile" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label>Date of Birth<span class="text-danger">*</span></label>
                                                <input style="padding-right: 7px" type="date" class="form-control" name="birth-date" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label>Applicant Type<span class="text-danger">*</span></label>
                                                <select name="roles" class="form-control">
                                                    <option value="Student">Student</option>
                                                    <option value="Teacher">Teacher</option>
                                                    <option value="Agent">Agent</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label>Password<span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password" placeholder="Create password" required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-lock text-muted"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label>Confirm Password<span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="confirm-password" placeholder="Repeat password" required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-lock text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label>Home District<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="home-district" placeholder="Home District">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label>Upazila<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="upazila" placeholder="Upazila">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        @if(isset($courseId))
                                            <input type="hidden" name="courseID" value="{{$courseId}}">
                                            <a href="{{url('loginForm',encrypt($courseId))}}" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Back to login form</a>
                                        @else
                                            <a href="{{url('admin')}}" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Back to login form</a>
                                        @endif
                                        <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /registration form -->

                <!-- Footer -->
                <div class="footer text-muted text-center">
                    &copy; 2020. Developed by <a href="https://faizas.com.bd" target="_blank">Faiza's IT Solution</a>
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
