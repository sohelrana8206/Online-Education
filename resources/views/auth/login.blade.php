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
    <script type="text/javascript" src="{{url('public/admin-assets/js/plugins/forms/validation/validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin-assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript" src="{{url('public/admin-assets/js/core/app.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin-assets/js/pages/login_validation.js')}}"></script>
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

                <!-- Form with validation -->
                <form method="post" action="{{url('login')}}" class="form-validate">
                    @csrf
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <a class="nav-brand" href="{{url('')}}"><img src="{{url('public/assets/img/logo.png')}}" alt="logo" /></a>
                            <div style="padding: 15px;margin-bottom: 0" class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                            <h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>

                            @error('email')
                            <div class="alert alert-warning no-border">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                                <span class="text-semibold">Warning!</span> {{ $message }}
                            </div>
                            @enderror
                            @error('password')
                            <div class="alert alert-warning no-border">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                                <span class="text-semibold">Warning!</span> {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="email" class="form-control" placeholder="Email" name="email" required="required">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group login-options">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" class="styled" checked="checked">
                                        Remember
                                    </label>
                                </div>

                                <div class="col-sm-6 text-right">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if(isset($courseId))
                            <input type="hidden" name="courseID" value="{{$courseId}}">
                        @endif

                        <div class="form-group">
                            <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                </form>
                <!-- /form with validation -->

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
