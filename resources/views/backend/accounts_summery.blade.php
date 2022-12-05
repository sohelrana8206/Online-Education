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

            @if(!empty($referral_code))
                <div class="col-lg-4">

                    <!-- Current server load -->
                    <div class="panel bg-pink-400">
                        <div class="panel-body text-center">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3 class="no-margin">{{$totalOutstanding}}/-</h3>
                                    My Referral Outstanding
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
            @endif

            @can('total-payment')
                <div class="col-lg-4">

                    <!-- Members online -->
                    <div class="panel bg-green-400">
                        <div class="panel-body text-center">
                            <h3 class="no-margin">{{$totalPayment}}</h3>
                            Total Payment
                        </div>
                    </div>
                    <!-- /members online -->

                </div>
            @endcan

            @can('total-income')
                <div class="col-lg-4">

                    <!-- Members online -->
                    <div class="panel bg-teal-400">
                        <div class="panel-body text-center">
                            <h3 class="no-margin">{{$totalIncome}}</h3>
                            Total Income
                        </div>
                    </div>
                    <!-- /members online -->

                </div>
            @endcan

        </div>

        @can('pending-payment-request')
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Pending Payment Request</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Applicant Name</th>
                    <th>User</th>
                    <th>Mobile</th>
                    <th>Amount</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($pendingPaymentRequest as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->user->name}}</td>
                        <td>
                            @if(!empty($items->user->getRoleNames()))
                                @foreach($items->user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>{{$items->user->personal_information->mobile}}</td>
                        <td>{{$items->amount}}</td>
                        <td class="text-center">
                            @can('approve-payment-request')
                            <a class="btn btn-info btn-sm approvePaymentRequest" data-href="{{url('paymentRequestModal')}}" data-id="{{$items->id}}" data-request="{{$items->amount}}" data-popup="tooltip" title="Approve Payment Request" data-placement="top"><i class="fa fa-check"></i></a>
                            @endcan
                        </td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
        @endcan

        @can('income-summery')
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Income Summery</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Date</th>
                    <th>Origin Amount</th>
                    <th width="15%">Received Amount</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($totalIncomeList as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{date('d F, Y',strtotime($items->created_at))}}</td>
                        <td>{{$items->origin_cost}}/-</td>
                        <td>{{$items->amount}}/-</td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
        @endcan

        @can('payment-summery')
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Payment Summery</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Request Date</th>
                    <th>Payment Date</th>
                    <th>User</th>
                    <th width="15%">Requested Amount</th>
                    <th width="15%">Paid Amount</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($totalPaymentList as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{date('d F, Y',strtotime($items->created_at))}}</td>
                        <td>{{date('d F, Y',strtotime($items->updated_at))}}</td>
                        <td>
                            @if(!empty($items->user->getRoleNames()))
                                @foreach($items->user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>{{$items->amount}}/-</td>
                        <td>{{$items->paid_amount}}/-</td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
        @endcan

        {{--MODAL--}}
        <div class="modal fade" id="payment-request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Payment Request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="payment-request-body"></div>
                </div>
            </div>
        </div>
        {{--MODAL--}}

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection
