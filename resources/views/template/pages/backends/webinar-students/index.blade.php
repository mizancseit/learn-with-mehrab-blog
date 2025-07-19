@extends('backends.layouts.master_layout')
@section('title','Webinar Student List')
@section('page_heading','Webinar Student List')
@section('content')
    <div class="container-fluid">
        <div class="card" style="margin-bottom: 10px">
            <div class="card-body">
                <form action="{{route('admin.webinar-students.index')}}" method="get">
                    <div class="row">

                        <div class="col-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Search" name="search" value="{{$search}}">
                        </div>

                        <div class="col-3">
                            <select class="js-example-basic-single form-control-sm form-control" name="course_id">
                                <option value="">Choose Course</option>
                                @foreach($courses as $course)
                                    @if($course->id == $course_id)
                                        <option value="{{$course->id}}" selected>{{$course->title}}</option>
                                    @else
                                        <option value="{{$course->id}}">{{$course->title}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <select class="js-example-basic-single form-control-sm form-control" name="webinar_id">
                                <option value="">Choose Webinar</option>
                                @foreach($webinars as $webinar)
                                    @if($webinar->id == $webinar_id)
                                        <option value="{{$webinar->id}}" selected>{{$webinar->title}}</option>
                                    @else
                                        <option value="{{$webinar->id}}">{{$webinar->title}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <button type="submit" class="btn btn-primary" style="padding: 7px 15px;"><i class="fa-solid fa-filter"></i> Filter</button>
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
                            <th>Webinar</th>
                            <th>Course</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $k => $data)
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$data->webinar->title}}</td>
                                <td>{{$data->course->title}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->mobile}}</td>
{{--                                <td>--}}
{{--                                    @if($data->is_active == 0)--}}
{{--                                        <span class="badge badge-sm light badge-danger">Disabled</span>--}}
{{--                                    @else--}}
{{--                                        <span class="badge badge-sm light badge-primary">Enabled</span>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{route('blog-categories.edit',$data->id)}}"><span class="badge badge-info"><i class="fa-solid fa-pen-to-square"></i></span></a>--}}
{{--                                    <button type="button" class="badge badge-danger" data-bs-toggle="modal" data-bs-target="#destroyModal" data-id="{{$data->id}}" data-action="{{route('blog-categories.destroy',$data->id)}}"><i class="fa-solid fa-trash"></i></button>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                    {{$datas->appends(['search'=>$search,'course_id'=>$course_id,'webinar_id'=>$webinar_id])}}

                </div>
            </div>
        </div>
    </div>


@endsection

@section('bottom_script')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
