<!-- Vertical form options -->
<div class="row">
    <div class="col-md-12">
    <!-- Basic layout-->
        <form>
            @csrf
            <div class="panel panel-flat">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Paid Payment Requested Amount</label>
                                <input type="text" class="form-control" name="request_amount" value="{{$request_amount}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Paid Amount</label>
                                <input type="text" class="form-control" name="paid_amount" id="paid_amount">
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="button" class="btn btn-primary paidPartialPayment" data-href="{{url('approvePaymentRequest')}}" data-id="{{$id}}">Approve Partial Payment</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /basic layout -->

    </div>
</div>
<!-- /vertical form options -->
