<div class="modal-header bg-primary">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Student Marks List</h6>
</div>

<div class="modal-body">
    <table class="table table-bordered datatable-basic">
        <thead>
        <tr>
            <th>SR NO</th>
            <th>Exam Name</th>
            <th>Full Marks</th>
            <th>Obtained Marks</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1;$full_marks = 0;$obtained_marks = 0; ?>
        @foreach($data as $items)
            <tr>
                <td><?=$counter?></td>
                <td>{{$items->exam_name}}</td>
                <td>
                    <?php
                        $full_marks = $full_marks + $items->full_marks;
                        echo $items->full_marks;
                    ?>
                </td>
                <td>
                    <?php
                        $obtained_marks = $obtained_marks + $items->obtained_marks;
                        echo $items->obtained_marks;
                    ?>
                </td>
            </tr>
            <?php $counter++; ?>
        @endforeach
        <tr>
            <td colspan="2"><strong>Total</strong></td>
            <td><strong>{{$full_marks}}</strong></td>
            <td><strong>{{$obtained_marks}}</strong></td>
        </tr>
        </tbody>
    </table>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
    @can('add-student-mark')
    <a style="cursor: pointer" data-href="{{url('addStudentMarks')}}" data-id="{{$courseID->course_id}}" data-stdID="{{$stdID}}" class="btn bg-primary addStudentMarks">Add Marks</a>
    @endcan
</div>