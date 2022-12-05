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

<body class="login-container">


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div style="margin-top: 50px" class="content">

                <!-- Error title -->
                <div class="text-center content-group">
                    <?=$message?>
                </div>
                <!-- /error title -->


                <!-- Error content -->
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
                        <form action="#" class="main-search">
                            <div class="input-group content-group">
                                <input type="text" class="form-control input-lg" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn bg-slate-600 btn-icon btn-lg"><i class="icon-search4"></i></button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{url('')}}" class="btn btn-primary btn-block content-group"><i class="icon-circle-left2 position-left"></i> Go to Home</a>
                                </div>

                                <div class="col-sm-6">
                                    <a href="#" class="btn btn-default btn-block content-group"><i class="icon-menu7 position-left"></i> Advanced search</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /error wrapper -->


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
