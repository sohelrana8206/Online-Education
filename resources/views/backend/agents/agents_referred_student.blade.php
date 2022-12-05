<div class="modal-header bg-primary">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Referred Student List</h6>
</div>

<div class="modal-body">
    @if(empty($data))
        <h5 class="text-center text-danger-700">Referral Package Not Purchase Yet.</h5>
    @else
        <table class="table table-bordered table-danger">
            <thead>
            <tr>
                <th>SR NO</th>
                <th>Students Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Home District</th>
                <th>Upazila</th>
                <th>Registration Date</th>
            </tr>
            </thead>
            <tbody>
            <?php $counter = 1; ?>
            @foreach($data as $items)
                <tr>
                    <td>{{$counter}}</td>
                    <td>{{$items->user->name}}</td>
                    <td>{{$items->user->email}}</td>
                    <td>{{$items->user->personal_information->mobile}}</td>
                    <td>{{$items->user->personal_information->home_district}}</td>
                    <td>{{$items->user->personal_information->upazila}}</td>
                    <td>{{date('d F, Y',strtotime($items->created_at))}}</td>
                </tr>
                <?php $counter++; ?>
            @endforeach
            </tbody>
        </table>
    @endif
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
</div>