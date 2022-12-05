@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Accounts</span> Summery</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Accounts Summery</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <div class="row">
            <div class="col-lg-4">

                <!-- Members online -->
                <div class="panel bg-teal-400">
                    <div class="panel-body">
                        <h3 class="no-margin">{{$totalCommission}}/-</h3>
                        Total Earning
                    </div>
                </div>
                <!-- /members online -->

            </div>

            <div class="col-lg-4">

                <!-- Today's revenue -->
                <div class="panel bg-blue-400">
                    <div class="panel-body">
                        <h3 class="no-margin">{{$commissionPaid}}/-</h3>
                        Total Withdraw
                    </div>
                </div>
                <!-- /today's revenue -->

            </div>

            <div class="col-lg-4">

                <!-- Current server load -->
                <div class="panel bg-pink-400">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 class="no-margin">{{$totalOutstanding}}/-</h3>
                                Total Outstanding
                            </div>
                            <div class="col-md-4">
                                @if($totalOutstanding > 0 && empty($withdrawRequest))
                                    <a data-href="{{url('withdrawRequest')}}" data-amount="{{$totalOutstanding}}" class="btn btn-default withdrawRequest">Withdraw</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /current server load -->

            </div>
        </div>

        @if(!empty($withdrawRequest))
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Pending Withdraw Request</h5>
                </div>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th width="15%">Commission</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{date('d F, Y',strtotime($withdrawRequest->created_at))}}</td>
                        <td>{{$withdrawRequest->amount}}/-</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        @endif

        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">My All Commissions</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Date</th>
                    <th width="15%">Commission</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($earnings['income'] as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{date('d F, Y',strtotime($items['date']))}}</td>
                        <td>{{$items['commission']}}/-</td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Commission Withdraw List</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Month Name</th>
                    <th width="20%">Total Withdraw</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($monthlyWithdraw as $value)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{date('F, Y',strtotime($value->created_at))}}</td>
                        <td>{{$value->totalWithdraw}}/-</td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection