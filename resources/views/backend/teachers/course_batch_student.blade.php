<div class="modal-header bg-brown">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Course Batch Wise Student</h6>
</div>

<div class="modal-body">
    <table class="table table-bordered table-danger">
        <thead>
        <tr>
            <th>SR NO</th>
            <th>Student Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Home District</th>
            <th width="25%" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        @foreach($data as $items)
            <tr>
                <td><?=$counter?></td>
                <td>{{$items->user->name}}</td>
                <td>{{$items->user->email}}</td>
                <td>{{$items->user->personal_information->mobile}}</td>
                <td>{{$items->user->personal_information->home_district}}</td>
                <td class="text-center">
                    @can('student-quiz-answer')
                    <a style="cursor: pointer" data-href="{{url('studentQuiz')}}" data-id="{{$items->course_batch_id}}" data-stdID="{{$items->user->id}}" class="btn btn-info btn-sm studentQuiz" data-popup="tooltip" title="Quiz" data-placement="top"><i class="fa fa-desktop"></i></a>
                    @endcan
                    @can('student-assignment')
                    <a style="cursor: pointer" data-href="{{url('studentAssignment')}}" data-id="{{$items->user->id}}" class="btn btn-success btn-sm studentAssignment" data-popup="tooltip" title="Assignment" data-placement="top"><i class="fa fa-file"></i></a>
                    @endcan
                    @can('student-marks-list')
                    <a style="cursor: pointer" data-href="{{url('studentMarks')}}" data-id="{{$items->course_batch_id}}" data-stdID="{{$items->user->id}}" class="btn btn-primary btn-sm studentMarks" data-popup="tooltip" title="Student Marks" data-placement="top"><i class="fa fa-file"></i></a>
                    @endcan
                    @can('remove-student-batch')
                    <a style="cursor: pointer" data-href="{{url('removeStudentBatch')}}" data-id="{{$items->id}}" class="btn btn-danger btn-sm removeStudentBatch" data-popup="tooltip" title="Remove Student" data-placement="top"><i class="fa fa-close"></i></a>
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
    @can('add-course-batch-student')
    <a style="cursor: pointer" data-href="{{url('addCourseBatchStudent')}}" data-id="{{$batch_id}}" class="btn bg-brown addCourseBatchStudent">Add New Students</a>
    @endcan
</div>