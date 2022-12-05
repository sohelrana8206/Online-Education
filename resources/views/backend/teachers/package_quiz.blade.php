<div class="modal-header bg-success">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Package Quiz List</h6>
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
                    @if($items->status == 1)
                        <label class="badge badge-success">Active</label>
                    @else
                        <label class="badge badge-success">Inactive</label>
                    @endif
                </td>
                <td class="text-center">
                    @can('package-quiz-questions')
                    <a style="cursor: pointer" data-href="{{url('packageQuizQuestions')}}" data-id="{{$items->id}}" class="btn btn-info btn-sm packageQuizQuestions" data-popup="tooltip" title="Course Quiz Questions" data-placement="top"><i class="fa fa-list"></i></a>
                    @endcan

                    @can('edit-package-quiz')
                    <a style="cursor: pointer" data-href="{{url('editPackageQuiz')}}" data-id="{{$items->id}}" class="btn btn-primary btn-sm editPackageQuiz" data-popup="tooltip" title="Edit Course Quiz" data-placement="top"><i class="fa fa-pencil"></i></a>
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
    @can('add-package-quiz')
    <a style="cursor: pointer" data-href="{{url('addPackageQuiz')}}" data-id="{{$batch_id}}" class="btn bg-success addPackageQuiz">Add New Quiz</a>
    @endcan
</div>