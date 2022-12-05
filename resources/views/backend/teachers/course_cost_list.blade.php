<div class="modal-header bg-warning">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Course Cost List</h6>
</div>

<div class="modal-body">
    <table class="table table-bordered table-danger">
        <thead>
        <tr>
            <th>SR NO</th>
            <th>Course Fee</th>
            <th>Course Discount Rate</th>
            <th>Course Fee After Discount</th>
            <th>Registration Last Date</th>
            <th>Course Start Date</th>
            <th width="10%" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        @foreach($data as $items)
            <tr>
                <td><?=$counter?></td>
                <td>{{$items->course_fee}}</td>
                <td>{{$items->course_discount_rate}}%</td>
                <td>{{$items->course_discounted_cost}}</td>
                <td>
                    @if($items->course_registration_last_date > 0)
                        {{date('d F, Y',strtotime($items->course_registration_last_date))}}
                    @endif
                </td>
                <td>
                    @if($items->course_start_date > 0)
                        {{date('d F, Y',strtotime($items->course_start_date))}}
                    @endif
                </td>
                <td class="text-center">
                    @if($counter == 1)
                        @can('edit-course-cost')
                        <a style="cursor: pointer" data-href="{{url('editCourseCost')}}" data-id="{{$items->id}}" class="btn btn-info btn-sm editCourseCost" data-popup="tooltip" title="Edit Course Cost" data-placement="top"><i class="fa fa-pencil"></i></a>
                        @endcan
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
    @if(empty($data))
        @can('add-course-cost')
            <a style="cursor: pointer" data-href="{{url('addCourseCost')}}" data-id="{{$course_id}}" class="btn bg-warning addCourseCost">Add New Cost</a>
        @endcan
    @endif
</div>