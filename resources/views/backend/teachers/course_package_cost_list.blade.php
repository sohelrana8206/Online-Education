<div class="modal-header bg-warning">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Course Package Cost List</h6>
</div>

<div class="modal-body">
    <table class="table table-bordered table-danger">
        <thead>
        <tr>
            <th>SR NO</th>
            <th>Package Fee</th>
            <th>Package Discount Rate</th>
            <th>Package Fee After Discount</th>
            <th>Package Registration Last Date</th>
            <th>Package Start Date</th>
            <th width="10%" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        @foreach($data as $items)
            <tr>
                <td><?=$counter?></td>
                <td>{{$items->package_fee}}</td>
                <td>{{$items->package_discount_rate}}%</td>
                <td>{{$items->package_discounted_cost}}</td>
                <td>
                    @if($items->package_registration_last_date > 0)
                        {{date('d F, Y',strtotime($items->package_registration_last_date))}}
                    @endif
                </td>
                <td>
                    @if($items->package_start_date > 0)
                        {{date('d F, Y',strtotime($items->package_start_date))}}
                    @endif
                </td>
                <td class="text-center">
                    @if($counter == 1)
                        @can('edit-course-package-cost')
                        <a style="cursor: pointer" data-href="{{url('editCoursePackageCost')}}" data-id="{{$items->id}}" class="btn btn-info btn-sm editCourseCost" data-popup="tooltip" title="Edit Course Cost" data-placement="top"><i class="fa fa-pencil"></i></a>
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
        @can('add-course-package-cost')
            <a style="cursor: pointer" data-href="{{url('addCoursePackageCost')}}" data-id="{{$package_id}}" class="btn bg-warning addCourseCost">Add New Package Cost</a>
        @endcan
    @endif
</div>