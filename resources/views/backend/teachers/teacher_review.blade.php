@extends('templates.backend_master')

@section('content')

        <!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Teacher</span> Review</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Teacher Review</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Teacher Review</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Student Name</th>
                    <th>Teacher Name</th>
                    <th>Course/Package Name</th>
                    <th>Rating</th>
                    <th>Comments</th>
                    <th>Submit Date</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                @foreach($data as $items)
                    <tr>
                        <td><?=$counter?></td>
                        <td>{{$items->user->name}}</td>
                        <td>
                            @if($items->type == 'course')
                                <?=$items->course->user->name?>
                            @else
                                <?=$items->course_package->user->name?>
                            @endif
                        </td>
                        <td>
                            @if($items->type == 'course')
                                <?=$items->course->course_title?>
                            @else
                                <?=$items->course_package->package_title?>
                            @endif
                        </td>
                        <td>{{$items->rating}} <i class="fa fa-star text-danger"></i></td>
                        <td><?=$items->comments?></td>
                        <td><?=date('d F, Y',strtotime($items->created_at))?></td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

@endsection
