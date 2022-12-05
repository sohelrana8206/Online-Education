<div class="row">
    @if($type == 'course')
        @foreach($data as $value)
            <div class="col-sm-4">

                <!-- Widget with rounded icon -->
                <div class="panel">
                    <div class="panel-body text-center">
                        <div class="icon-object border-success text-success"><i class="icon-book"></i></div>
                        <h5 class="text-semibold">{{$value->course_title}}</h5>
                        <p class="mb-15">By {{$value->user->name}}</p>
                        <a href="{{url('courseInfo/'.encrypt($value->id))}}" class="btn bg-success-400">Course Details</a>
                    </div>
                </div>
                <!-- /widget with rounded icon -->

            </div>
        @endforeach
    @else
        @foreach($data as $value)
            <div class="col-sm-4">

                <!-- Widget with rounded icon -->
                <div class="panel">
                    <div class="panel-body text-center">
                        <div class="icon-object border-success text-success"><i class="icon-book"></i></div>
                        <h5 class="text-semibold">{{$value->package_title}}</h5>
                        <p class="mb-15">By {{$value->user->name}}</p>
                        <a href="{{url('packageInfo/'.encrypt($value->id))}}" class="btn bg-success-400">Package Details</a>
                    </div>
                </div>
                <!-- /widget with rounded icon -->

            </div>
        @endforeach
    @endif
</div>