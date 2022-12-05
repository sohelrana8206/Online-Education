<div class="modal-header bg-info">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h6 class="modal-title">Course Quiz Answer</h6>
</div>

<div class="modal-body">
    <table class="table table-bordered datatable-basic">
        <thead>
        <tr>
            <th>SR NO</th>
            <th>Question</th>
            <th>Correct Answer</th>
            <th>Student Answer</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1;$right = 0;$wrong = 0; ?>
        @foreach($data as $items)
            <tr>
                <td><?=$counter?></td>
                <td>{{$items->course_quiz_question->question}}</td>
                <td>{{$items->course_quiz_question->answer}}</td>
                <td>{{$items->answer}}</td>
                <td>
                    @if($items->course_quiz_question->answer == $items->answer)
                        <?php
                            $right = $right + 1;
                            echo '<i class="fa fa-check"></i>';
                        ?>
                    @else
                        <?php
                        $wrong = $wrong + 1;
                        echo '<i class="fa fa-close"></i>';
                        ?>
                    @endif
                </td>
            </tr>
            <?php $counter++; ?>
        @endforeach
        </tbody>
    </table>
    <h4>Total Correct Answer: {{$right}}</h4>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
</div>