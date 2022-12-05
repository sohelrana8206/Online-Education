<form action="{{url('storeStudentPackageMark')}}" method="post">
    @csrf
    <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Student Mark Add Form</h6>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Exam Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="exam_name" placeholder="Exam Name" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Full Marks<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="full_marks" placeholder="Full Marks" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Obtained Marks</label>
                    <input type="text" class="form-control" name="obtained_marks" placeholder="Obtained Marks">
                </div>
            </div>
        </div>
        <input type="hidden" name="package_id" value="{{$package_id}}">
        <input type="hidden" name="stdID" value="{{$stdID}}">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-primary">Add Marks</button>
    </div>
</form>
