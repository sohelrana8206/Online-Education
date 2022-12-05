@extends('templates/inner_frontend_master')
@section('content')

        <!-- Start Page Title Area -->
<div class="page-title">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <h3>All Packages</h3>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<section class="courses-area ptb-100">
    <div class="container">
        <div class="row">
            @foreach($data as $package)
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