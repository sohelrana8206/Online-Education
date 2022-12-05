@extends('templates/backend_master')
@section('content')

<style>
    .media .profile-thumb img {
        width: 100px !important;
        height: 100px !important;
        border: 3px solid #fff;
        -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
    }
    .tab-content .tab-pane{
        padding-top: 20px;
    }
    .empty-message {
        text-align: center;
        font-size: 16px;
        padding: 40px 80px 10px 80px;
        color: #90a4ae !important;
        overflow: hidden;
    }
    .empty-message i.icon {
        display: block;
        font-size: 42px;
        margin: 0px 0px 0px 0px;
        color: #ffffff;
    }
    .empty-message i.icon:before {
        height: 84px;
        width: 84px;
        background-color: #f7f7f7;
        display: inline-block;
        border-radius: 100px;
        padding-top: 20px;
        color: #81c784;
        margin-bottom: 20px;
    }
    .empty-message p {
        font-size: 16px;
        color: #595959 !important;
    }
    .btn-gray, .btn-gray:focus {
        background-color: #ffffff;
        color: #0B6041;
        margin-bottom: 10px;
        border: 2px solid #e0e0e0;
        padding: 10px 15px;
        font-weight: 600;
    }
    .btn-gray:hover {
        background-color: #ffffff;
        color: #0B6041;
        border: 2px solid #0B6041;
        box-shadow: none !important;
    }
    #aca-qua-add-form,
    .aca-update,
    #tra-qua-add-form,
    #spe-qua-add-form,
    #emp-qua-add-form,
    #pro-qua-add-form
    {
        display: none;
    }
    .form-input input,
    .form-input textarea,
    .form-input select{
        display: none;
    }
    .text-right{
        margin-top: 20px !important;
    }
</style>

        <!-- Main content -->
<div class="content-wrapper">


    <!-- Cover area -->
    <div class="profile-cover">

        @if($user->personal_information->cover_image != '')
            <?php $cover_image = $user->personal_information->cover_image; ?>
        @else
            <?php $cover_image = 'public/admin-assets/images/cover3.jpg'; ?>
        @endif

        <div class="profile-cover-img" style="background-image: url('{{asset($cover_image)}}')"></div>
        <div class="media">
            <div class="media-left">
                <a href="#" class="profile-thumb" data-toggle="modal" data-target="#profile_picture">
                    @if($user->personal_information->image != '')
                        <?php $profile_image = $user->personal_information->image; ?>
                    @else
                        <?php $profile_image = 'public/admin-assets/images/profile-pic.png'; ?>
                    @endif
                    <img src="{{asset($profile_image)}}" class="img-circle img-md" alt="">
                </a>
            </div>

            <div class="media-body">
                <h1>{{auth()->user()->name}} <small class="display-block"><strong><?=str_replace('"','',auth()->user()->roles->pluck('name'))?></strong></small></h1>
            </div>
            <div class="media-right media-middle">
                <ul class="list-inline list-inline-condensed no-margin-bottom text-nowrap">
                    <li><a href="#" class="btn btn-default" data-toggle="modal" data-target="#cover_photo"><i class="icon-file-picture position-left"></i> Cover image</a></li>
                    <li><a href="#" class="btn btn-default" data-toggle="modal" data-target="#profile_picture"><i class="icon-file-picture position-left"></i> Profile Picture</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /cover area -->


    <!-- Cover Photo Upload modal -->
    <div id="cover_photo" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('uploadCoverPhoto')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Upload Cover Photo</h5>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="uploader">
                                        <label class="text-danger">image size 1300x350 px</label>
                                        <input type="file" name="cover_photo" class="file-styled" required>
                                        <input type="hidden" name="personal_id" value="{{$user->personal_information->id}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Cover Photo Upload modal -->

    <!-- Cover Photo Upload modal -->
    <div id="profile_picture" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('uploadProfilePicture')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Upload Profile Picture</h5>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="uploader">
                                        <label class="text-danger">image size 250x300 px</label>
                                        <input type="file" name="profile_picture" class="file-styled" required>
                                        <input type="hidden" name="personal_id" value="{{$user->personal_information->id}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Cover Photo Upload modal -->


    <!-- Toolbar -->
    <div class="navbar navbar-default navbar-xs content-group">
        <ul class="nav navbar-nav visible-xs-block">
            <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
        </ul>

        <div class="navbar-collapse collapse" id="navbar-filter">
            <ul class="nav navbar-nav">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            </ul>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-gear"></i> Settings <span class="visible-xs-inline-block position-right"> Options</span> <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#" data-toggle="modal" data-target="#cover_photo"><i class="icon-image2"></i> Update cover Image</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#profile_picture"><i class="icon-image2"></i> Update Profile Pic</a></li>
                            <li><a href="#"><i class="icon-key"></i> Change Password</a></li>
                            <li><a href="#"><i class="icon-mention"></i> Change Email</a></li>
                            <li><a href="{{url('profilePDF/'.encrypt($user->personal_information->user->id))}}" target="_blank"><i class="icon-mention"></i> Profile PDF</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /toolbar -->


    <!-- Content area -->
    <div class="content">

        <!-- Profile Wizard -->
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified nav-tabs-icon">
                            <li class="active"><a href="#justified-top-icon-tab1" data-toggle="tab" aria-expanded="true"><i class="icon-user"></i> Personal<br>Information</a></li>
                            <li class=""><a href="#justified-top-icon-tab2" data-toggle="tab" aria-expanded="false"><i class="icon-graduation2"></i> Academic<br>Qualifications</a></li>
                            <li class=""><a href="#justified-top-icon-tab3" data-toggle="tab" aria-expanded="false"><i class="icon-library2"></i> Training<br>Summery</a></li>
                            <li class=""><a href="#justified-top-icon-tab4" data-toggle="tab" aria-expanded="false"><i class="icon-reading"></i> Special<br>Qualification</a></li>
                            <li class=""><a href="#justified-top-icon-tab5" data-toggle="tab" aria-expanded="false"><i class="icon-briefcase"></i> Employment<br>History</a></li>
                            <li class=""><a href="#justified-top-icon-tab6" data-toggle="tab" aria-expanded="false"><i class="icon-user-tie"></i> Professional<br>Qualification</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="justified-top-icon-tab1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default border-grey">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">Personal Information</h4>
                                                <div class="heading-elements">
                                                    <a  style="cursor: pointer" class="dropdown-toggle btnEditAca" data-toggle="dropdown"><i class="icon-pencil5"></i> Edit</a>
                                                </div>
                                            </div>

                                            <div class="panel-body">
                                                <div class="aca_box form-input">
                                                    <form action="{{url('updatePersonalInfo')}}" method="post">
                                                        @csrf
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td><strong>Name:</strong> <span>{{$user->personal_information->user->name}}</span><input type="text" class="form-control" name="name" value="{{$user->personal_information->user->name}}" required></td>
                                                                <td><strong>Mobile:</strong> +880<span>{{$user->personal_information->mobile}}</span><input type="tel" maxlength="10" class="form-control" name="mobile" value="{{$user->personal_information->mobile}}" required></td>
                                                                <td><strong>Date of Birth:</strong> <span>{{date('d F, Y',strtotime($user->personal_information->birth_date))}}</span><input type="date" class="form-control" name="birth_date" value="{{date('Y-m-d',strtotime($user->personal_information->birth_date))}}" required></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Father's Name:</strong> <span>{{$user->personal_information->fathers_name}}</span><input type="text" class="form-control" name="father_name" value="{{$user->personal_information->fathers_name}}" required></td>
                                                                <td><strong>Mother's Name:</strong> <span>{{$user->personal_information->mothers_name}}</span><input type="text" class="form-control" name="mother_name" value="{{$user->personal_information->mothers_name}}" required></td>
                                                                <td>
                                                                    <strong>Gender:</strong> <span>{{$user->personal_information->gender}}</span>
                                                                    <select class="form-control" name="gender" required>
                                                                        <option @if($user->personal_information->gender == 'Men') {{'selected="selected"'}} @endif value="Man">Man</option>
                                                                        <option @if($user->personal_information->gender == 'Women') {{'selected="selected"'}} @endif value="Women">Women</option>
                                                                        <option @if($user->personal_information->gender == 'Women') {{'selected="selected"'}} @endif value="Women">None</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Marital Status:</strong> <span>{{$user->personal_information->marital_status}}</span>
                                                                    <select class="form-control" name="marital_status" required>
                                                                        <option @if($user->personal_information->marital_status == 'Married') {{'selected="selected"'}} @endif value="Married">Married</option>
                                                                        <option @if($user->personal_information->marital_status == 'Unmarried') {{'selected="selected"'}} @endif value="Unmarried">Unmarried</option>
                                                                    </select>
                                                                </td>
                                                                <td><strong>Nationality:</strong> <span>{{$user->personal_information->nationality}}</span><input type="text" class="form-control" name="nationality" value="{{$user->personal_information->nationality}}" required></td>
                                                                <td><strong>National ID NO:</strong> <span>{{$user->personal_information->national_id_no}}</span><input type="text" class="form-control" name="nid" value="{{$user->personal_information->national_id_no}}" required></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Religion:</strong> <span>{{$user->personal_information->religion}}</span><input type="text" class="form-control" name="religion" value="{{$user->personal_information->religion}}" required></td>
                                                                <td><strong class="text-area">Permanent Address:</strong> <span>{{$user->personal_information->permanent_address}}</span><textarea class="form-control" name="permanent_address">{{$user->personal_information->permanent_address}}</textarea></td>
                                                                <td><strong>Home District:</strong> <span>{{$user->personal_information->home_district}}</span><input type="text" class="form-control" name="home_district" value="{{$user->personal_information->home_district}}" required></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong class="text-area">Present Address:</strong> <span>{{$user->personal_information->present_address}}</span><textarea class="form-control" name="present_address">{{$user->personal_information->present_address}}</textarea></td>
                                                                <td><strong>Upazila:</strong> <span>{{$user->personal_information->upazila}}</span><input type="text" class="form-control" name="upazila" value="{{$user->personal_information->upazila}}" required></td>
                                                                <td><strong>Current Location:</strong> <span>{{$user->personal_information->current_location}}</span><input type="text" class="form-control" name="current_location" value="{{$user->personal_information->current_location}}" required></td>
                                                            </tr>
                                                        </table>

                                                        <div class="text-right aca-update">
                                                            <input type="hidden" name="piID" value="{{$user->personal_information->id}}">
                                                            <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="justified-top-icon-tab2">

                                @if(count($user->academic_qualification) > 0)
                                    <?php $acc_counter = 1; ?>
                                    @foreach($user->academic_qualification as $aca)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default border-grey">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">Academic Qualification <?=$acc_counter?></h4>
                                                    <div class="heading-elements">
                                                        <a style="cursor: pointer" class="dropdown-toggle btnEditAca" data-toggle="dropdown"><i class="icon-pencil5"></i> Edit</a>
                                                    </div>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="aca_box form-input">
                                                        <form action="{{url('updateAcademic')}}" method="post">
                                                            @csrf

                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td><strong>Exam Title:</strong> <span>{{$aca->exam_title}}</span><input type="text" class="form-control" name="exam_title" value="{{$aca->exam_title}}" required></td>
                                                                    <td><strong>Board/University:</strong> <span>{{$aca->board_university}}</span><input type="text" class="form-control" name="board_university" value="{{$aca->board_university}}" required></td>
                                                                    <td><strong>Group/Major:</strong> <span>{{$aca->major}}</span><input type="text" class="form-control" name="major" value="{{$aca->major}}" required></td>
                                                                    <td><strong>Institute Name:</strong> <span>{{$aca->institute}}</span><input type="text" class="form-control" name="institute" value="{{$aca->institute}}" required></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Result:</strong> <span>{{$aca->result}}</span><input type="text" class="form-control" name="result" value="{{$aca->result}}" required></td>
                                                                    <td colspan="2"><strong>Passing Year:</strong> <span>{{$aca->passing_year}}</span><input type="text" class="form-control" name="passing_year" value="{{$aca->passing_year}}" required></td>
                                                                </tr>
                                                            </table>

                                                            <div class="text-right aca-update">
                                                                <input type="hidden" name="acaID" value="{{$aca->id}}">
                                                                <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $acc_counter++; ?>
                                    @endforeach
                                <div id="noData_aca">
                                    <button class="btn btn-gray m-t-10" id="btnAdd_aca"><i class="icon-plus3"></i>&nbsp;Add Academic Qualification</button>
                                </div>
                                @else
                                    <div class="empty-message m-t-40" id="noData_aca" style="display:block">
                                        <i class="icon icon-graduation2"></i>

                                        <p>
                                            Currently no data exists! Please click on the following button to add your Academic Qualifications.
                                        </p>
                                        <button class="btn btn-gray m-t-10" id="btnAdd_aca"><i class="icon-plus3"></i>&nbsp;Add Academic Qualification</button>
                                    </div>
                                @endif
                                    <div id="aca-qua-add-form">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="{{url('addAcademic')}}" method="post">
                                                    @csrf
                                                    <div class="panel panel-flat">
                                                        <div class="panel-heading">
                                                            <h5 class="panel-title">Academic Qualification Add Form</h5>
                                                        </div>

                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Exam Title<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="exam_title" placeholder="Exam Title" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Group/Major<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="major" placeholder="Group/Major" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Board/University<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="board_university" placeholder="Board/University" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Institute Name<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="institute" placeholder="Institute Name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Result<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="result" placeholder="Result" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Passing Year<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="passing_year" placeholder="Passing Year" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="text-right">
                                                                <button type="submit" class="btn btn-primary">Add <i class="icon-arrow-right14 position-right"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <button class="btn btn-gray m-t-10" disabled><i class="icon-plus3"></i>&nbsp;Add Academic Qualification</button>
                                    </div>
                            </div>

                            <div class="tab-pane" id="justified-top-icon-tab3">

                                @if(count($user->training_information) > 0)
                                    <?php $training_counter = 1; ?>
                                    @foreach($user->training_information as $training)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default border-grey">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">Training Summery <?=$training_counter?></h4>
                                                        <div class="heading-elements">
                                                            <a style="cursor: pointer" class="dropdown-toggle btnEditAca" data-toggle="dropdown"><i class="icon-pencil5"></i> Edit</a>
                                                        </div>
                                                    </div>

                                                    <div class="panel-body">
                                                        <div class="aca_box form-input">
                                                            <form action="{{url('updateTraining')}}" method="post">
                                                                @csrf

                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <td><strong>Training Title:</strong> <span>{{$training->training_title}}</span><input type="text" class="form-control" name="training_title" value="{{$training->training_title}}" required></td>
                                                                        <td colspan="2"><strong>Topic:</strong> <span>{{$training->topic}}</span><input type="text" class="form-control" name="topic" value="{{$training->topic}}" required></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Institute:</strong> <span>{{$training->institute}}</span><input type="text" class="form-control" name="institute" value="{{$training->institute}}" required></td>
                                                                        <td colspan="2"><strong>Country:</strong> <span>{{$training->country}}</span><input type="text" class="form-control" name="country" value="{{$training->country}}" required></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Location:</strong> <span>{{$training->location}}</span><input type="text" class="form-control" name="location" value="{{$training->location}}" required></td>
                                                                        <td><strong>Year:</strong> <span>{{$training->year}}</span><input type="text" class="form-control" name="year" value="{{$training->year}}" required></td>
                                                                        <td><strong>Duration:</strong> <span>{{$training->duration}}</span><input type="text" class="form-control" name="duration" value="{{$training->duration}}" required></td>
                                                                    </tr>
                                                                </table>

                                                                <div class="text-right aca-update">
                                                                    <input type="hidden" name="traID" value="{{$training->id}}">
                                                                    <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $training_counter++; ?>
                                    @endforeach
                                    <div id="noData_tra">
                                        <button class="btn btn-gray m-t-10" id="btnAdd_tra"><i class="icon-plus3"></i>&nbsp;Add Training Information</button>
                                    </div>
                                @else
                                    <div class="empty-message m-t-40" id="noData_spe" style="display:block">
                                        <i class="icon icon-library2"></i>

                                        <p>
                                            Currently no data exists! Please click on the following button to add your Training Information.
                                        </p>
                                        <button class="btn btn-gray m-t-10" id="btnAdd_tra"><i class="icon-plus3"></i>&nbsp;Add Training Information</button>
                                    </div>
                                @endif
                                    <div id="tra-qua-add-form">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="{{url('addTraining')}}" method="post">
                                                    @csrf
                                                    <div class="panel panel-flat">
                                                        <div class="panel-heading">
                                                            <h5 class="panel-title">Training Summery Add Form</h5>
                                                        </div>

                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Training Title<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="training_title" placeholder="Training Title" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Topic<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="topic" placeholder="Topic" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Institute Name<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="institute" placeholder="Institute Name" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Country<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="country" placeholder="Country" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Location<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="location" placeholder="Location" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Year<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="year" placeholder="Year" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Duration<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="duration" placeholder="Duration" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="text-right">
                                                                <button type="submit" class="btn btn-primary">Add <i class="icon-arrow-right14 position-right"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <button class="btn btn-gray m-t-10" disabled><i class="icon-plus3"></i>&nbsp;Add Training Information</button>
                                    </div>
                            </div>

                            <div class="tab-pane" id="justified-top-icon-tab4">

                                @if(count($user->special_qualification) > 0)
                                    <?php $special_counter = 1; ?>
                                    @foreach($user->special_qualification as $special)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default border-grey">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">Special Qualification <?=$special_counter?></h4>
                                                        <div class="heading-elements">
                                                            <a style="cursor: pointer" class="dropdown-toggle btnEditAca" data-toggle="dropdown"><i class="icon-pencil5"></i> Edit</a>
                                                        </div>
                                                    </div>

                                                    <div class="panel-body">
                                                        <div class="aca_box form-input">
                                                            <form action="{{url('updateSpecial')}}" method="post">
                                                                @csrf

                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <td><strong>Qualification Name:</strong> <span>{{$special->qualification_name}}</span><input type="text" class="form-control" name="qualification_name" value="{{$special->qualification_name}}" required></td>
                                                                        <td><strong>Qualification Details:</strong> <span>{{$special->qualification_details}}</span><textarea class="form-control" name="qualification_details">{{$special->qualification_details}}</textarea></td>
                                                                    </tr>
                                                                </table>

                                                                <div class="text-right aca-update">
                                                                    <input type="hidden" name="speID" value="{{$special->id}}">
                                                                    <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $special_counter++; ?>
                                    @endforeach
                                    <div id="noData_spe">
                                        <button class="btn btn-gray m-t-10" id="btnAdd_spe"><i class="icon-plus3"></i>&nbsp;Add Special Qualification</button>
                                    </div>
                                @else
                                    <div class="empty-message m-t-40" id="noData_spe" style="display:block">
                                        <i class="icon icon-reading"></i>

                                        <p>
                                            Currently no data exists! Please click on the following button to add your Special Qualification.
                                        </p>
                                        <button class="btn btn-gray m-t-10" id="btnAdd_spe" onclick="getAddform('aca','');"><i class="icon-plus3"></i>&nbsp;Add Special Qualification</button>
                                    </div>
                                @endif
                                    <div id="spe-qua-add-form">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="{{url('addSpecial')}}" method="post">
                                                    @csrf
                                                    <div class="panel panel-flat">
                                                        <div class="panel-heading">
                                                            <h5 class="panel-title">Special Qualification Add Form</h5>
                                                        </div>

                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Qualification Name<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="qualification_name" placeholder="Qualification Name" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Qualification Details<span class="text-danger">*</span></label>
                                                                        <textarea class="form-control" name="qualification_details"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="text-right">
                                                                <button type="submit" class="btn btn-primary">Add <i class="icon-arrow-right14 position-right"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <button class="btn btn-gray m-t-10" disabled><i class="icon-plus3"></i>&nbsp;Add Special Qualification</button>
                                    </div>
                            </div>

                            <div class="tab-pane" id="justified-top-icon-tab5">

                                @if(count($user->employment_history) > 0)
                                    <?php $employment_counter = 1; ?>
                                    @foreach($user->employment_history as $employment)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default border-grey">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">Employment History <?=$employment_counter?></h4>
                                                        <div class="heading-elements">
                                                            <a style="cursor: pointer" class="dropdown-toggle btnEditAca" data-toggle="dropdown"><i class="icon-pencil5"></i> Edit</a>
                                                        </div>
                                                    </div>

                                                    <div class="panel-body">
                                                        <div class="aca_box form-input">
                                                            <form action="{{url('updateEmployment')}}" method="post">
                                                                @csrf

                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <td><strong>Company Name:</strong> <span>{{$employment->company_name}}</span><input type="text" class="form-control" name="company_name" value="{{$employment->company_name}}" required></td>
                                                                        <td><strong>Company Business:</strong> <span>{{$employment->company_business}}</span><input type="text" class="form-control" name="company_business" value="{{$employment->company_business}}" required></td>
                                                                        <td><strong>Designation:</strong> <span>{{$employment->designation}}</span><input type="text" class="form-control" name="designation" value="{{$employment->designation}}" required></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Department:</strong> <span>{{$employment->department}}</span><input type="text" class="form-control" name="department" value="{{$employment->department}}" required></td>
                                                                        <td colspan="2"><strong>Responsibility:</strong> <span>{{$employment->responsibility}}</span><textarea class="form-control" name="responsibility" required>{{$employment->responsibility}}</textarea></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Start Date:</strong> <span>{{date('d F, Y',strtotime($employment->start_date))}}</span><input type="date" class="form-control" name="start_date" value="{{date('Y-m-d',strtotime($employment->start_date))}}" required></td>
                                                                        <td><strong>End Date:</strong> @if($employment->end_date == '') {{'Continue'}} @else <span>{{date('d F, Y',strtotime($employment->end_date))}}</span> @endif <input type="date" class="form-control" name="end_date" value="@if($employment->end_date != ''){{date('Y-m-d',strtotime($employment->end_date))}} @endif"></td>
                                                                        <td><strong>Company Address:</strong> <span>{{$employment->company_address}}</span><textarea class="form-control" name="company_address" required>{{$employment->company_address}}</textarea></td>
                                                                    </tr>
                                                                </table>

                                                                <div class="text-right aca-update">
                                                                    <input type="hidden" name="empID" value="{{$employment->id}}">
                                                                    <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $employment_counter++; ?>
                                    @endforeach
                                    <div id="noData_emp">
                                        <button class="btn btn-gray m-t-10" id="btnAdd_emp"><i class="icon-plus3"></i>&nbsp;Add Employment History</button>
                                    </div>
                                @else
                                    <div class="empty-message m-t-40" id="noData_emp" style="display:block">
                                        <i class="icon icon-briefcase"></i>

                                        <p>
                                            Currently no data exists! Please click on the following button to add your Employment History.
                                        </p>
                                        <button class="btn btn-gray m-t-10" id="btnAdd_emp"><i class="icon-plus3"></i>&nbsp;Add Employment History</button>
                                    </div>
                                @endif
                                    <div id="emp-qua-add-form">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="{{url('addEmployment')}}" method="post">
                                                    @csrf
                                                    <div class="panel panel-flat">
                                                        <div class="panel-heading">
                                                            <h5 class="panel-title">Employment History Add Form</h5>
                                                        </div>

                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Company Name<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="company_name" placeholder="Company Name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Company Business<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="company_business" placeholder="Company Business" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Designation Name<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="designation" placeholder="Designation" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Department<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="department" placeholder="Department" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Responsibility<span class="text-danger">*</span></label>
                                                                        <textarea class="form-control" name="responsibility" required></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Start Date<span class="text-danger">*</span></label>
                                                                        <input type="date" class="form-control" name="start_date" placeholder="Start Date" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>End Date<span class="text-danger">*</span></label>
                                                                        <input type="date" class="form-control" name="end_date" placeholder="End Date">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Company Address<span class="text-danger">*</span></label>
                                                                        <textarea class="form-control" name="company_address" required></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="text-right">
                                                                <button type="submit" class="btn btn-primary">Add <i class="icon-arrow-right14 position-right"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <button class="btn btn-gray m-t-10" disabled><i class="icon-plus3"></i>&nbsp;Add Employment History</button>
                                    </div>
                            </div>

                            <div class="tab-pane" id="justified-top-icon-tab6">

                                @if(count($user->professional_qualification) > 0)
                                    <?php $professional_counter = 1; ?>
                                    @foreach($user->professional_qualification as $professional)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default border-grey">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">Professional Qualification <?=$professional_counter?></h4>
                                                        <div class="heading-elements">
                                                            <a style="cursor: pointer" class="dropdown-toggle btnEditAca" data-toggle="dropdown"><i class="icon-pencil5"></i> Edit</a>
                                                        </div>
                                                    </div>

                                                    <div class="panel-body">
                                                        <div class="aca_box form-input">
                                                            <form action="{{url('updateProfessional')}}" method="post">
                                                                @csrf

                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <td><strong>Certificate Name:</strong> <span>{{$professional->certificate_name}}</span><input type="text" class="form-control" name="certificate_name" value="{{$professional->certificate_name}}" required></td>
                                                                        <td colspan="2"><strong>Institute:</strong> <span>{{$professional->institute}}</span><input type="text" class="form-control" name="institute" value="{{$professional->institute}}" required></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Location:</strong> <span>{{$professional->location}}</span><input type="text" class="form-control" name="location" value="{{$professional->location}}" required></td>
                                                                        <td><strong>Form Date:</strong> <span>{{date('d F, Y',strtotime($professional->form_date))}}</span><input type="date" class="form-control" name="form_date" value="{{date('Y-m-d',strtotime($professional->form_date))}}" required></td>
                                                                        <td><strong>To Date:</strong> <span>{{date('d F, Y',strtotime($professional->to_date))}}</span><input type="date" class="form-control" name="to_date" value="{{date('Y-m-d',strtotime($professional->to_date))}}" required></td>
                                                                    </tr>
                                                                </table>

                                                                <div class="text-right aca-update">
                                                                    <input type="hidden" name="proID" value="{{$professional->id}}">
                                                                    <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $professional_counter++; ?>
                                    @endforeach
                                    <div id="noData_pro">
                                        <button class="btn btn-gray m-t-10" id="btnAdd_pro"><i class="icon-plus3"></i>&nbsp;Add Professional Qualification</button>
                                    </div>
                                @else
                                    <div class="empty-message m-t-40" id="noData_pro" style="display:block">
                                        <i class="icon icon-user-tie"></i>

                                        <p>
                                            Currently no data exists! Please click on the following button to add your Professional Qualification.
                                        </p>
                                        <button class="btn btn-gray m-t-10" id="btnAdd_pro"><i class="icon-plus3"></i>&nbsp;Add Professional Qualification</button>
                                    </div>
                                @endif
                                    <div id="pro-qua-add-form">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="{{url('addProfessional')}}" method="post">
                                                    @csrf
                                                    <div class="panel panel-flat">
                                                        <div class="panel-heading">
                                                            <h5 class="panel-title">Professional Qualification Add Form</h5>
                                                        </div>

                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Certificate Name<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="certificate_name" placeholder="Certificate Name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Institute Name<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="institute" placeholder="Institute Name" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Location<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="location" placeholder="Location" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Form Date<span class="text-danger">*</span></label>
                                                                        <input type="date" class="form-control" name="form_date" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>To Date<span class="text-danger">*</span></label>
                                                                        <input type="date" class="form-control" name="to_date" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="text-right">
                                                                <button type="submit" class="btn btn-primary">Add <i class="icon-arrow-right14 position-right"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <button class="btn btn-gray m-t-10" disabled><i class="icon-plus3"></i>&nbsp;Add Professional Qualification</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Profile Wizard -->

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection