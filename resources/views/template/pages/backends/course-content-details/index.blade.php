@extends('backends.layouts.master_layout')
@section('title','Course Details')
@section('page_heading','Course Details')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')

        <div class="card" style="margin-bottom: 10px">
            <div class="card-body">
                <form action="{{route('admin.course-content-details.index')}}" method="get">
                    <div class="row">

                        <div class="col-3">
                            <select class="js-example-basic-single form-control form-control-sm" name="course_id">
                                <option value="">Choose Course</option>
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}" @if($course->id == $course_id) selected @endif>{{$course->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <select class="js-example-basic-single form-control form-control-sm" name="course_content_id">
                                <option value="">Choose Course</option>
                                @foreach($courseContents as $courseContent)
                                    <option value="{{$courseContent->id}}" @if($courseContent->id == $course_content_id) selected @endif>{{$courseContent->course?->title}} | {{$courseContent->id}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <button type="submit" class="btn btn-primary" style="padding: 7px 15px;"><i class="fa-solid fa-filter"></i> Filter</button>
                        </div>

                        <div class="col-4" style="text-align: right">
                            <a  href="{{route('admin.course-content-details.create')}}" class="btn btn-outline-primary" style="padding: 0.5rem 1rem;"><i class="fa-solid fa-plus"></i> Add</a>
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
                            <th>Course Content</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Sub title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $k => $data)
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$data->course->title}}</td>
                                <td>{{$data->courseContent?->course?->title}} | {{$data->courseContent->id}}</td>
                                <td>{!! $data->icon !!}</td>
                                <td>{{$data->title}}</td>
                                <td>{!! $data->subtitle !!}</td>
                                <td>
                                    <a href="{{route('admin.course-content-details.edit',$data->id)}}"><span class="badge badge-info"><i class="fa-solid fa-pen-to-square"></i></span></a>
                                    <button type="button" class="badge badge-danger" data-bs-toggle="modal" data-bs-target="#destroyModal" data-id="{{$data->id}}" data-action="{{route('admin.course-content-details.destroy',$data->id)}}"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                    {{$datas->appends(['course_id'=>$course_id,'course_content_id'=>$course_content_id])}}

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
