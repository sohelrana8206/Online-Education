<form action="{{url('storeTeachersCommission')}}" method="post">
    @csrf
    <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Teachers Commission</h6>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Commission Rate(%)</label>
                    <input type="number" class="form-control" id="commission_rate" name="commission_rate" value="{{ ($data) ? $data->commission_rate : 0 }}">
                </div>
            </div>
        </div>
        <input type="hidden" name="teacher_id" value="{{$id}}">
        @if(!empty($data))
            <input type="hidden" name="commission_id" value="{{$data->id}}">
        @endif
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-primary">Update Commission</button>
    </div>
</form>