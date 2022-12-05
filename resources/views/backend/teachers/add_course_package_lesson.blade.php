<form action="{{url('storeCoursePackageLesson')}}" method="post">
    @csrf
    <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Course Package Lesson Add Form</h6>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Package Lesson Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="package_lesson_title" placeholder="Package Lesson Title" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Package Lesson Duration</label>
                    <input type="text" class="form-control" name="package_lesson_duration" placeholder="Package Lesson Duration">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Package Lesson Start Date</label>
                    <input type="date" class="form-control" name="package_lesson_start_date">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Package Lesson Description</label>
                    <textarea class="form-control" name="package_lesson_description" id="editor"></textarea>
                </div>
            </div>
        </div>
        <input type="hidden" name="package_id" value="{{$package_id}}">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-success">Add Course Package Lesson</button>
    </div>
</form>
