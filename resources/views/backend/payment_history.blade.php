<div class="modal-header bg-success">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Payment History</h6>
</div>

<div class="modal-body">
    <table class="table table-bordered table-danger">
        <thead>
        <tr>
            <th>SR NO</th>
            <th>Withdraw Request Date</th>
            <th>Payment Date</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        @foreach($data as $items)
            <tr>
                <td><?=$counter?></td>
                <td>{{date('d F, Y',strtotime($items->created_at))}}</td>
                <td>{{date('d F, Y',strtotime($items->updated_at))}}</td>
                <td>{{$items->amount}}/-</td>
            </tr>
            <?php $counter++; ?>
        @endforeach
        </tbody>
    </table>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
</div>