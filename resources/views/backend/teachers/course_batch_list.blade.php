<div class="modal-header bg-brown">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Course Batch List</h6>
</div>

<div class="modal-body">
    <table class="table table-bordered table-danger">
        <thead>
        <tr>
            <th>SR NO</th>
            <th>Course Batch Name</th>
            <th>Status</th>
            <th width="30%" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        @foreach($data as $items)
            <tr>
                <td><?=$counter?></td>
                <td>{{$items->course_batch_title}}</td>
                <td>
                    @if($items->status == 1)
                        <label class="badge badge-success">Active</label>
                    @else
                        <label class="badge badge-success">Closed</label>
                    @endif
                </td>
                <td class="text-center">
                    @if($items->status == 1)
                        @can('edit-course-batch')
                        <a style="cursor: pointer" data-href="{{url('editCourseBatch')}}" data-id="{{$items->id}}" class="btn btn-info btn-sm editCourseBatch" data-popup="tooltip" title="Edit Course Batch" data-placement="top"><i class="fa fa-pencil"></i></a>
                        @endcan

                        @can('course-quiz')
                        <a style="cursor: pointer" data-href="{{url('courseQuiz')}}" data-id="{{$items->id}}" class="btn bg-success-600 btn-sm courseQuiz" data-popup="tooltip" title="View Course Quiz" data-placement="top"><i class="fa fa-desktop"></i></a>
                        @endcan

                        @can('course-assignment')
                        <a style="cursor: pointer" data-href="{{url('courseAssignment')}}" data-id="{{$items->id}}" class="btn bg-brown btn-sm courseAssignment" data-popup="tooltip" title="View Course Assignment" data-placement="top"><i class="fa fa-file"></i></a>
                        @endcan

                        @can('course-batch-student-mapping')
                        <a style="cursor: pointer" data-href="{{url('courseBatchStudentMapping')}}" data-id="{{$items->id}}" class="btn btn-warning btn-sm courseBatchStudentMapping" data-popup="tooltip" title="View Students of Batch" data-placement="top"><i class="fa fa-user-plus"></i></a>
                        @endcan

                        @can('close-course-batch')
                        <a style="cursor: pointer" data-href="{{url('closeCourseBatch')}}" data-id="{{$items->id}}" class="btn btn-danger btn-sm closeCourseBatch" data-popup="tooltip" title="Close Batch" data-placement="top"><i class="fa fa-close"></i></a>
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
    @can('add-course-batch')
    <a style="cursor: pointer" data-href="{{url('addCourseBatch')}}" data-id="{{$course_id}}" class="btn bg-brown addCourseBatch">Add New Batch</a>
    @endcan
</div>