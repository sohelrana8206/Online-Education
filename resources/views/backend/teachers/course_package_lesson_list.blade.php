<div class="modal-header bg-success">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Course Package Lesson List</h6>
</div>

<div class="modal-body">
    <table class="table table-bordered table-danger">
        <thead>
        <tr>
            <th>SR NO</th>
            <th>Package Lesson Title</th>
            <th>Package Lesson Description</th>
            <th>Package Lesson Duration</th>
            <th>Package Lesson Start Date</th>
            <th width="10%" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        @foreach($data as $items)
            <tr>
                <td><?=$counter?></td>
                <td>{{$items->package_lesson_title}}</td>
                <td><?=$items->package_lesson_description?></td>
                <td>{{$items->package_lesson_duration}}</td>
                <td>
                    @if($items->package_lesson_start_date > 0)
                        {{date('d F, Y',strtotime($items->package_lesson_start_date))}}
                    @endif
                </td>
                <td class="text-center">
                    @can('edit-course-package-lesson')
                    <a style="cursor: pointer" data-href="{{url('editCoursePackageLesson')}}" data-id="{{$items->id}}" class="btn btn-info btn-sm editCourseLesson" data-popup="tooltip" title="Edit Course Lesson" data-placement="top"><i class="fa fa-pencil"></i></a>
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
    @can('add-course-package-lesson')
        <a style="cursor: pointer" data-href="{{url('addCoursePackageLesson')}}" data-id="{{$package_id}}" class="btn bg-success addCourseLesson">Add New Lesson</a>
    @endcan
</div>