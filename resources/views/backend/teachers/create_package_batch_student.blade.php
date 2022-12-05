@if(count($data) > 0)
    <form action="{{url('storePackageBatchStudent')}}" method="post">
        @csrf
        <div class="modal-header bg-brown">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title">Add Student</h6>
        </div>

        <div class="modal-body">
            <div class="row">
                @foreach($data as $item)
                    <div class="col-md-4">
                        <label>{{ Form::checkbox('studentID[]', $item->studentID, false, array('class' => 'name styled')) }}
                            {{ $item->studentname }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="modal-footer">
            <input type="hidden" name="batchID" value="{{$batch_id}}">
            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            <button type="submit" class="btn bg-brown">Add Students</button>
        </div>
    </form>
@else
    <div class="modal-header bg-brown">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Add Student</h6>
    </div>

    <div class="modal-body">
        <div class="row">
            <h3 style="text-align: center">All Students are Mapped to the Batch.</h3>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
    </div>
@endif