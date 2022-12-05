<form action="{{url('updateCourseLesson/'.$data->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Course Lesson Edit Form</h6>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Lesson Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="lesson_title" value="{{$data->lesson_title}}" placeholder="Lesson Title" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Lesson Duration</label>
                    <input type="text" class="form-control" name="lesson_duration" value="{{$data->lesson_duration}}" placeholder="Lesson Duration">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Lesson Start Date</label>
                    <input type="date" class="form-control" name="lesson_start_date" value="{{date('Y-m-d',strtotime($data->lesson_start_date))}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Lesson Description</label>
                    <textarea class="form-control" name="lesson_description" id="editor"><?=$data->lesson_description?></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-success">Update Course Lesson</button>
    </div>
</form>
