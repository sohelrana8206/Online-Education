<div class="modal-header bg-brown">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Package Batch List</h6>
</div>

<div class="modal-body">
    <table class="table table-bordered table-danger">
        <thead>
        <tr>
            <th>SR NO</th>
            <th>Package Batch Name</th>
            <th>Status</th>
            <th width="30%" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        @foreach($data as $items)
            <tr>
                <td><?=$counter?></td>
                <td>{{$items->course_package_batch_title}}</td>
                <td>
                    @if($items->status == 1)
                        <label class="badge badge-success">Active</label>
                    @else
                        <label class="badge badge-success">Closed</label>
                    @endif
                </td>
                <td class="text-center">
                    @if($items->status == 1)
                        @can('edit-package-batch')
                        <a style="cursor: pointer" data-href="{{url('editPackageBatch')}}" data-id="{{$items->id}}" class="btn btn-info btn-sm editPackageBatch" data-popup="tooltip" title="Edit Package Batch" data-placement="top"><i class="fa fa-pencil"></i></a>
                        @endcan

                        @can('package-quiz')
                        <a style="cursor: pointer" data-href="{{url('packageQuiz')}}" data-id="{{$items->id}}" class="btn bg-success-600 btn-sm packageQuiz" data-popup="tooltip" title="View Package Quiz" data-placement="top"><i class="fa fa-desktop"></i></a>
                        @endcan

                        @can('package-assignment')
                        <a style="cursor: pointer" data-href="{{url('packageAssignment')}}" data-id="{{$items->id}}" class="btn bg-brown btn-sm packageAssignment" data-popup="tooltip" title="View Package Assignment" data-placement="top"><i class="fa fa-file"></i></a>
                        @endcan

                        @can('course-package-batch-student-mapping')
                        <a style="cursor: pointer" data-href="{{url('packageBatchStudentMapping')}}" data-id="{{$items->id}}" class="btn btn-warning btn-sm packageBatchStudentMapping" data-popup="tooltip" title="View Students of Batch" data-placement="top"><i class="fa fa-user-plus"></i></a>
                        @endcan

                        @can('close-package-batch')
                        <a style="cursor: pointer" data-href="{{url('closePackageBatch')}}" data-id="{{$items->id}}" class="btn btn-danger btn-sm closePackageBatch" data-popup="tooltip" title="Close Batch" data-placement="top"><i class="fa fa-close"></i></a>
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
    @can('add-package-batch')
    <a style="cursor: pointer" data-href="{{url('addPackageBatch')}}" data-id="{{$package_id}}" class="btn bg-brown addCourseBatch">Add New Batch</a>
    @endcan
</div>