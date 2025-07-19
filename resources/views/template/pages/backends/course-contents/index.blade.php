@extends('backends.layouts.master_layout')
@section('title','Course Contents')
@section('page_heading','Course Contents')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')

        <div class="card" style="margin-bottom: 10px">
            <div class="card-body">
                <form action="{{route('admin.course-contents.index')}}" method="get">
                    <div class="row">

                        <div class="col-4">
                            <select class="js-example-basic-single form-control form-control-sm" name="course_id">
                                <option value="">Choose Course</option>
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}" @if($course->id == $course_id) selected @endif>{{$course->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <button type="submit" class="btn btn-primary" style="padding: 7px 15px;"><i class="fa-solid fa-filter"></i> Filter</button>
                        </div>

                        <div class="col-4 offset-2" style="text-align: right">
                            <a  href="{{route('admin.course-contents.create')}}" class="btn btn-outline-primary" style="padding: 0.5rem 1rem;"><i class="fa-solid fa-plus"></i> Add</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table header-border table-responsive-sm">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Course</th>
                            <th>Total Week</th>
                            <th>Total Time</th>
                            <th>Total Class</th>
                            <th>Total Live Class</th>
                            <th>Total Quiz</th>
                            <th>Total Assignment</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $k => $data)
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$data->course->title}}</td>
                                <td>{{$data->total_week}}</td>
                                <td>{{$data->total_time == "" ? 'N/A': $data->total_time}}</td>
                                <td>{{$data->total_class == "" ? 'N/A': $data->total_class}}</td>
                                <td>{{$data->total_live_class == "" ? 'N/A': $data->total_live_class}}</td>
                                <td>{{$data->total_quiz == "" ? 'N/A': $data->total_quiz}}</td>
                                <td>{{$data->total_assignment == "" ? 'N/A': $data->total_assignment}}</td>

                                <td>
                                    <a href="{{route('admin.course-contents.edit',$data->id)}}"><span class="badge badge-info"><i class="fa-solid fa-pen-to-square"></i></span></a>
                                    <button type="button" class="badge badge-danger" data-bs-toggle="modal" data-bs-target="#destroyModal" data-id="{{$data->id}}" data-action="{{route('admin.course-contents.destroy',$data->id)}}"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                    {{$datas->appends(['course_id'=>$course_id])}}

                </div>
            </div>
        </div>
    </div>

    @include('.backends.includes.delete-modal')
@endsection
@section('bottom_script')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
