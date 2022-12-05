<form action="{{url('storePackageBatch')}}" method="post">
    @csrf
    <div class="modal-header bg-brown">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Package Batch Add Form</h6>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Package Batch Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="course_package_batch_title" placeholder="Package Batch Name" required>
                </div>
            </div>
        </div>
        <input type="hidden" name="package_id" value="{{$package_id}}">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-brown">Add Batch</button>
    </div>
</form>
