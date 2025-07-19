@extends('backends.layouts.master_layout')
@section('title','Course List')
@section('page_heading','Course List')
@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')

        <div class="card" style="margin-bottom: 10px">
            <div class="card-body">
                <form action="{{route('admin.courses.index')}}" method="get">
                    <div class="row">
                        <div class="col-2">
                            <input type="text" class="form-control form-control-sm" placeholder="Search" name="search" value="{{$search}}">
                        </div>

                        <div class="col-2">
                            <select  class="js-example-basic-single form-control form-control-sm" name="category_id">
                                <option value="">--Choose Category--</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($category->id == $category_id) selected @endif>{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <select  class="js-example-basic-single form-control form-control-sm" name="level_id">
                                <option value="">--Choose Levels--</option>
                                @foreach($courseLevels as $courseLevel)
                                    <option value="{{$courseLevel->id}}" @if($courseLevel->id == $level_id) selected @endif>{{$courseLevel->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <select  class=" js-example-basic-single form-control form-control-sm" name="type_id">
                                <option value="">--Choose Types--</option>
                                @foreach($courseTypes as $courseType)
                                    <option value="{{$courseType->id}}" @if($courseType->id == $type_id) selected @endif>{{$courseType->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <button type="submit" class="btn btn-primary" style="padding: 7px 15px;"><i class="fa-solid fa-filter"></i> Filter</button>
                            <a href="{{route('admin.courses.index')}}" class="btn btn-info" style="padding: 7px 15px;"><i class="fa-solid fa-refresh"></i></a>
                        </div>

                        <div class="col-2" style="text-align: right">
                            <a  href="{{route('admin.courses.create')}}" class="btn btn-outline-primary" style="padding: 0.5rem 1rem;"><i class="fa-solid fa-plus"></i> Create Course</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!--start blog code -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Level</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $k => $data)
                                    <tr>
                                        <td>{{$k+1}}</td>
                                        <td>
                                            <img src="{{asset('uploads/lms/courses/'.$data->thumbnail)}}" alt="{{$data->title}}" width="100">
                                        </td>
                                        <td>{{$data->title}}</td>
                                        <td>{{$data->category->title}}</td>
                                        <td>{{$data->level->title}}</td>
                                        <td>{{$data->type->title}}</td>
                                        <td>
                                            @if($data->is_active == 0)
                                                <span class="badge badge-sm light badge-danger">Disabled</span>
                                            @else
                                                <span class="badge badge-sm light badge-primary">Enabled</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.courses.edit',$data->id)}}"><span class="badge badge-info"><i class="fa-solid fa-pen-to-square"></i></span></a>
                                            <button type="button" class="badge badge-danger" data-bs-toggle="modal" data-bs-target="#destroyModal" data-id="{{$data->id}}" data-action="{{route('admin.courses.destroy',$data->id)}}"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{$datas->appends(['search'=>$search])}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end blog code -->

    </div>

    @include('.backends.includes.delete-modal')
@endsection

@section("bottom_script")
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

    </script>
@endsection


