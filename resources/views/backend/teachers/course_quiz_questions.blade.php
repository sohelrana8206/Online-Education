<div class="modal-header bg-success">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Course Quiz Questions</h6>
</div>

<div class="modal-body">
    <table class="table table-bordered datatable-basic">
        <thead>
        <tr>
            <th>SR NO</th>
            <th>Questions</th>
            <th>Option One</th>
            <th>Option Two</th>
            <th>Option Three</th>
            <th>Option Four</th>
            <th>Answer</th>
            <th width="15%" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        @foreach($data as $items)
            <tr>
                <td><?=$counter?></td>
                <td>{{$items->question}}</td>
                <td>{{$items->option_one}}</td>
                <td>{{$items->option_two}}</td>
                <td>{{$items->option_three}}</td>
                <td>{{$items->option_four}}</td>
                <td>{{$items->answer}}</td>
                <td class="text-center">
                    @can('edit-course-quiz-questions')
                    <a style="cursor: pointer" data-href="{{url('editCourseQuizQuestion')}}" data-id="{{$items->id}}" class="btn btn-primary btn-sm editCourseQuizQuestion" data-popup="tooltip" title="Edit Question" data-placement="top"><i class="fa fa-pencil"></i></a>
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
    @can('add-course-quiz-question')
    <a style="cursor: pointer" data-href="{{url('addCourseQuizQuestion')}}" data-id="{{$quiz_id}}" class="btn bg-success addCourseQuizQuestion">Add New Question</a>
    @endcan
</div>