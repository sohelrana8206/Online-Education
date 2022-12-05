@extends('templates/inner_frontend_master')
@section('content')

    <style>
        #myBtnContainer{
            margin-bottom: 25px;
        }
        .row > .column {
            padding: 8px;
        }
        .column {
            float: left;
            width: 33.33%;
            display: none; /* Hide all elements by default */
        }
        .content {
            background-color: white;
            padding: 10px;
        }
        .show {
            display: block;
        }
        .btn.active {
            background-color: #666;
            color: white;
        }
    </style>

    <!-- Start Page Title Area -->
    <div class="page-title">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <h3>{{$subCat->last()->course_secondary_category->secondary_category_name}}</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <section class="courses-area ptb-25">
        <div class="container">

            <div id="myBtnContainer">
                <button class="btn btn-info active" onclick="filterSelection('all')"> Show all</button>
                @foreach($subCat as $sub)
                    <button class="btn btn-info" onclick="filterSelection({{$sub->id}})"> {{$sub->sub_category_name}}</button>
                @endforeach
            </div>
            <div class="row">
                @foreach($data as $item)
                    <div class="column {{$item->course_sub_category_id}}">
                        <div class="content">
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
                                    <strong> <i style="color: #e60c3d" class="icofont-file-fill"></i> {{$item->sub_category_name}}</strong>
                                    <p>
                                        <strong><i style="color: #e60c3d" class="icofont-read-book"></i> {{$item->institution_type_name}}</strong>
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
                                        @if($item->course_discount_rate > 0)
                                            <span>tk{{$item->course_fee}}</span>
                                        @endif
                                        tk{{$item->course_discounted_cost}}
                                    </h4>
                                    <h4><a href="{{url('fullCourseDetails/'.encrypt($item->id))}}" class="btn btn-primary">Read More</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
