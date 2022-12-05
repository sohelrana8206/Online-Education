<div class="modal-header bg-success">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Student Course Assignment</h6>
</div>

<div class="modal-body">
    <table class="table table-bordered datatable-basic">
        <thead>
        <tr>
            <th>SR NO</th>
            <th>Assignment Title</th>
            <th>Assignment Details</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1;?>
        @foreach($data as $items)
            <tr>
                <td><?=$counter?></td>
                <td>{{$items->course_assignment->title}}</td>
                <td><?=$items->course_assignment->details?></td>
                <td>
                    @if(!empty($items->assignment))
                        <a href="{{$items->assignment}}" class="btn btn-info" target="_blank">Open</a>
                    @else
                        <strong>Not Submitted</strong>
                    @endif
                </td>
            </tr>
            <?php $counter++; ?>
        @endforeach
        </tbody>
    </table>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
</div>