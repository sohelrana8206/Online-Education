@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">My Referral</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">My Referral</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <!-- Widget with rounded icon -->
                <div class="panel">
                    <div class="panel-body text-center">
                        @if(session('referral_code') == 'expired')
                            <h5 class="text-success">Your Referral Package ware <span class="text-danger-700">Expired!</span></h5>
                            <a href="{{url('getReferral')}}" class="btn bg-success-400">Update Referral Package</a>
                        @else
                            <h5 class="text-success">My Referral Commission</h5>
                            <div class="icon-object border-success text-success text-bold">{{$referral_agent->commission_rate}}%</div>
                            <h5 class="text-semibold">My Referral Code: <span id="referral-code">{{$referral_agent->referral_code}}</span></h5>
                            <p class="mb-15">Copy the referral code by clicking <strong>copy referral</strong> button and share to students.</p>
                            <button onclick="copyToClipboard('#referral-code')" class="btn bg-success-400">Copy Referral</button>
                        @endif
                    </div>
                </div>
                <!-- /widget with rounded icon -->
            </div>
        </div>
    </div>
    <!-- /content area -->

    <script>
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).html()).select();
            document.execCommand("copy");
            $temp.remove();
        }
    </script>

</div>
<!-- /main content -->

@endsection
