<div class="modal-header bg-info">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Course Quiz List</h6>
</div>

<div class="modal-body">
    <table class="table table-bordered datatable-basic">
        <thead>
        <tr>
            <th>SR NO</th>
            <th>Quiz Name</th>
            <th>Time Duration</th>
            <th>Status</th>
            <th width="15%" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        @foreach($data as $items)
            <tr>
                <td><?=$counter?></td>
                <td>{{$items->quiz_name}}</td>
                <td>{{$items->time_duration}} Minutes</td>
                <td>
                    @if($isSubmitQuiz == 0)
                        <strong>Not Submit</strong>
                    @else
                        @if(in_array($items->id,$isSubmitQuiz))
                            <strong>Submitted</strong>
                        @else
                            <strong>Not Submit</strong>
                        @endif
                    @endif
                </td>
                <td class="text-center">
                    @can('package-quiz-answers')
                    <a style="cursor: pointer" data-href="{{url('packageQuizAnswers')}}" data-id="{{$items->id}}" data-stdID="{{$stdID}}" class="btn btn-info btn-sm packageQuizAnswers" data-popup="tooltip" title="Course Quiz Questions" data-placement="top"><i class="fa fa-list"></i></a>
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
</div>