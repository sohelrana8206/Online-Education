@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Get Referral Package</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Get Referral Packages</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
        <div class="container-detached">
            <div class="content-detached">
                <div class="row">
                    @foreach($referral_package as $item)
                        <div class="col-lg-6">
                            <div class="panel panel-flat blog-horizontal blog-horizontal-2">
                                <div class="panel-body">
                                    <div class="blog-preview">
                                        <div class="content-group-sm media blog-title stack-media-on-mobile text-left">
                                            <div class="media-body">
                                                <h4 class="text-semibold no-margin">{{$item->title}}</h4>
                                            </div>

                                            <h5 style="width: 25%" class="text-success media-right no-margin-bottom text-semibold">BDT {{$item->price}}</h5>
                                        </div>

                                        <p><?=$item->details?></p>
                                    </div>
                                </div>

                                <div class="panel-footer panel-footer-condensed"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline list-inline-separate heading-text">
                                            <li><i class="icon-alarm position-left"></i> <strong>Package Duration: </strong>{{$item->duration.' Months'}}</li>
                                        </ul>
                                        <form action="{{url('pay')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="price" value="{{$item->price}}">
                                            <input type="hidden" name="origin_price" value="{{$item->price}}">
                                            <input type="hidden" name="packageID" value="{{$item->id}}">
                                            <button type="submit" class="btn btn-info heading-text pull-right">Get Referral Code<i class="icon-arrow-right14 position-right"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection
