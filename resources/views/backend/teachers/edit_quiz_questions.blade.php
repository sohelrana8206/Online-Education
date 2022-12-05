<form action="{{url('updateCourseQuizQuestion/'.$data->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Course Quiz Question Edit Form</h6>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Question<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="question" value="{{$data->question}}" placeholder="Question" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Option One<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="option_one" value="{{$data->option_one}}" placeholder="Option One" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Option Two<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="option_two" value="{{$data->option_two}}" placeholder="Option Two" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Option Three</label>
                    <input type="text" class="form-control" name="option_three" value="{{$data->option_three}}" placeholder="Option Three">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Option Four</label>
                    <input type="text" class="form-control" name="option_four" value="{{$data->option_four}}" placeholder="Option Four">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Answer</label>
                    <input type="text" class="form-control" name="answer" value="{{$data->answer}}" placeholder="Answer" required>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-success">Update Question</button>
    </div>
</form>
