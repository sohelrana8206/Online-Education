<form action="{{url('storeCourseBatch')}}" method="post">
    @csrf
    <div class="modal-header bg-brown">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Course Batch Add Form</h6>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Course Batch Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="course_batch_title" placeholder="Course Batch Name" required>
                </div>
            </div>
        </div>
        <input type="hidden" name="course_id" value="{{$course_id}}">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-brown">Add Course Batch</button>
    </div>
</form>
