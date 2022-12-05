<div class="modal-header bg-brown">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Package Assignment</h6>
</div>

<div class="modal-body">
    <table class="table table-bordered datatable-basic">
        <thead>
        <tr>
            <th>SR NO</th>
            <th>Title</th>
            <th>Details</th>
            <th>Submit Last Date</th>
            <th>Status</th>
            <th width="15%" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        @foreach($data as $items)
            <tr>
                <td><?=$counter?></td>
                <td>{{$items->title}}</td>
                <td><?=$items->details?></td>
                <td><?=date('d F, Y',strtotime($items->submit_last_date))?></td>
                <td>
                    @if($items->status == 1)
                        <label class="badge badge-success">Active</label>
                    @else
                        <label class="badge badge-success">Inactive</label>
                    @endif
                </td>
                <td class="text-center">
                    @can('edit-package-assignment')
                    <a style="cursor: pointer" data-href="{{url('editPackageAssignment')}}" data-id="{{$items->id}}" class="btn btn-primary btn-sm editPackageAssignment" data-popup="tooltip" title="Edit Package Assignment" data-placement="top"><i class="fa fa-pencil"></i></a>
                    @endcan
                </td>
            </tr>
            <?php $counter++; ?>
        @endforeach
        </tbody>
    </table>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
    @can('add-package-assignment')
    <a style="cursor: pointer" data-href="{{url('addPackageAssignment')}}" data-id="{{$batch_id}}" class="btn bg-brown addPackageAssignment">Add New Assignment</a>
    @endcan
</div>