@extends('templates/inner_frontend_master')
@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <h3>All Courses</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <section class="courses-area ptb-100">
        <div class="container">
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
                    <div class="pagination-area">
                        <nav aria-label="Page navigation">
                            {{ $data->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection