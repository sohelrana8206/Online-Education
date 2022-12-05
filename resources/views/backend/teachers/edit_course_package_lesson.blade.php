<form action="{{url('updateCoursePackageLesson/'.$data->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Course Package Lesson Edit Form</h6>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Package Lesson Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="package_lesson_title" value="{{$data->package_lesson_title}}" placeholder="Package Lesson Title" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Package Lesson Duration</label>
                    <input type="text" class="form-control" name="package_lesson_duration" value="{{$data->package_lesson_duration}}" placeholder="Package Lesson Duration">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Package Lesson Start Date</label>
                    <input type="date" class="form-control" name="package_lesson_start_date" value="{{date('Y-m-d',strtotime($data->package_lesson_start_date))}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Package Lesson Description</label>
                    <textarea class="form-control" name="package_lesson_description" id="editor"><?=$data->package_lesson_description?></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-success">Update Package Lesson</button>
    </div>
</form>
