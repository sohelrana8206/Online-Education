<form action="{{url('updateCourseCost/'.$data->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="modal-header bg-warning">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Course Cost Edit Form</h6>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Course Fee<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="course_fee" name="course_fee" value="{{$data->course_fee}}" placeholder="Course Fee" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Course Discount Rate</label>
                    <input type="text" class="form-control" id="course_discount_rate" value="{{$data->course_discount_rate}}" name="course_discount_rate" placeholder="Course Discount Rate">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Registration Last Date</label>
                    <input type="date" class="form-control" name="course_registration_last_date" value="{{date('Y-m-d',strtotime($data->course_registration_last_date))}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Course Start Date</label>
                    <input type="date" class="form-control" name="course_start_date" value="{{date('Y-m-d',strtotime($data->course_start_date))}}">
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-warning">Update Course Cost</button>
    </div>
</form>
