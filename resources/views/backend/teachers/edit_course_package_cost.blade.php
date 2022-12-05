<form action="{{url('updateCoursePackageCost/'.$data->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="modal-header bg-warning">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Package Cost Edit Form</h6>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Package Fee<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="package_fee" name="package_fee" value="{{$data->package_fee}}" placeholder="Package Fee" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Package Discount Rate</label>
                    <input type="text" class="form-control" id="package_discount_rate" value="{{$data->package_discount_rate}}" name="package_discount_rate" placeholder="Package Discount Rate">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Registration Last Date</label>
                    <input type="date" class="form-control" name="package_registration_last_date" value="{{date('Y-m-d',strtotime($data->package_registration_last_date))}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Package Start Date</label>
                    <input type="date" class="form-control" name="package_start_date" value="{{date('Y-m-d',strtotime($data->package_start_date))}}">
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-warning">Update Package Cost</button>
    </div>
</form>
