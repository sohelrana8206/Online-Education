@extends('templates.backend_master')

@section('content')

    <style>
        .course-quiz {
            border: 0.5px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 15px;
            background: #ffffff;
        }
        .quiz-question {
            font-size: 15px;
        }
        .quiz-options {
            padding: 20px;
            font-size: 15px;
        }
        .quiz-answer {
            font-size: 15px;
            margin: 10px 0;
            color: darkred;
        }
        .hide {
            display: none;
        }
        .timer{
            padding: 0px 15px 15px;
            text-align: end;
        }
        .timer span{
            color: #7b0c0c;
        }
    </style>

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Course Quiz</span> Questions</h4>
                </div>

            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                    <li class="active">Course Quiz Questions</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

            <form id="submitQuizAnswer" action="{{url('submitPackageQuizAnswer')}}" method="post">
                @csrf
                <div class="timer">
                    <h1>Remaining Time: <span id="time">{{$data->last()->package_quiz_setting->time_duration}}:00</span> minutes</h1>
                </div>

                <?php $counter = 0; ?>
                @foreach($data as $item)
                    <div class="course-quiz">
                        <div class="quiz-question"><strong>Question:{{$counter}}. <?=$item->questions?></strong></div>
                        <div class="quiz-options">
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <input type="radio" name="option_{{$counter}}" value="<?=$item->option_one?>">
                                    <strong>A. </strong><?=$item->option_one?>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="radio" name="option_{{$counter}}" value="<?=$item->option_two?>">
                                    <strong>B. </strong><?=$item->option_two?>
                                </div>
                                <div class="col-md-3 mb-2">
                                    @if(!empty($item->option_three))
                                        <input type="radio" name="option_{{$counter}}" value="<?=$item->option_three?>">
                                        <strong>C. </strong><?=$item->option_three?>
                                    @endif
                                </div>
                                <div class="col-md-3 mb-2">
                                    @if(!empty($item->option_four))
                                        <input type="radio" name="option_{{$counter}}" value="<?=$item->option_four?>">
                                        <strong>D. </strong><?=$item->option_four?>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="questionID[]" value="{{$item->id}}">
                            <input type="hidden" name="package_quiz_setting_id[]" value="{{$item->package_quiz_setting_id}}">
                        </div>
                    </div>
                    <?php $counter++; ?>
                @endforeach
                <button type="submit" class="btn btn-success waves-effect">Finished</button>
            </form>
        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

    <script>
        var timer2 = {{$data->last()->package_quiz_setting->time_duration}} + ":01";
        var isPaused = false;
        var interval = window.setInterval(function() {
            if(!isPaused) {
                var timer = timer2.split(':');
                //by parsing integer, I avoid all extra string processing
                var minutes = parseInt(timer[0], 10);
                var seconds = parseInt(timer[1], 10);
                --seconds;
                minutes = (seconds < 0) ? --minutes : minutes;
                if (minutes < 0) clearInterval(interval);
                seconds = (seconds < 0) ? 59 : seconds;
                seconds = (seconds < 10) ? '0' + seconds : seconds;
                //minutes = (minutes < 10) ?  minutes : minutes;
                $('#time').html(minutes + ':' + seconds);
                timer2 = minutes + ':' + seconds;

                if(minutes == 0 && seconds == 0){
                    isPaused = true;
                    alert('Your Exam Time is Finished.');
                    $('#submitQuizAnswer').submit();
                }
            }
        }, 1000);

    </script>

@endsection
