<form action="{{url('storeCourseQuiz')}}" method="post">
    @csrf
    <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Course Quiz Add Form</h6>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Quiz Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="quiz_name" placeholder="Quiz Name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Time Duration(Minutes)<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="time_duration" placeholder="Time Duration(Minute)" required>
                </div>
            </div>
        </div>
        <input type="hidden" name="batch_id" value="{{$batch_id}}">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-success">Add Course Quiz</button>
    </div>
</form>
