<div class="modal-header bg-success">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Course Lesson List</h6>
</div>

<div class="modal-body">
    <table class="table table-bordered table-danger">
        <thead>
        <tr>
            <th>SR NO</th>
            <th>Lesson Title</th>
            <th>Lesson Description</th>
            <th>Lesson Duration</th>
            <th>Lesson Start Date</th>
            <th width="10%" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        @foreach($data as $items)
            <tr>
                <td><?=$counter?></td>
                <td>{{$items->lesson_title}}</td>
                <td><?=$items->lesson_description?></td>
                <td>{{$items->lesson_duration}}</td>
                <td>
                    @if($items->lesson_start_date > 0)
                        {{date('d F, Y',strtotime($items->lesson_start_date))}}
                    @endif
                </td>
                <td class="text-center">
                    @can('edit-course-lesson')
                    <a style="cursor: pointer" data-href="{{url('editCourseLesson')}}" data-id="{{$items->id}}" class="btn btn-info btn-sm editCourseLesson" data-popup="tooltip" title="Edit Course Lesson" data-placement="top"><i class="fa fa-pencil"></i></a>
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
    @can('add-course-lesson')
        <a style="cursor: pointer" data-href="{{url('addCourseLesson')}}" data-id="{{$course_id}}" class="btn bg-success addCourseLesson">Add New Lesson</a>
    @endcan
</div>