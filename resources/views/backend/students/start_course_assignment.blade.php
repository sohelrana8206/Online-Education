<form action="{{url('submitCourseAssignment')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Course Assignment Submit Form</h6>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Upload Assignment(PDF Only)<span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="assignment" required>
                </div>
            </div>
        </div>
        <input type="hidden" name="assignment_id" value="{{$id}}">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-info">Submit Assignment</button>
    </div>
</form>
