<form action="{{url('updatePackageAssignment/'.$data->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="modal-header bg-brown">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Package Assignment Edit Form</h6>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" value="{{$data->title}}" placeholder="Title" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Submit Last Date<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="submit_last_date" value="{{date('Y-m-d',strtotime($data->submit_last_date))}}" placeholder="Submit Last Date" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Details</label>
                    <textarea class="form-control" name="details" id="editor"><?=$data->details?></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-brown">Update Package Assignment</button>
    </div>
</form>
