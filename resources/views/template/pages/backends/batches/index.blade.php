@extends('backends.layouts.master_layout')
@section('title','Batch List')
@section('page_heading','Batch')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')

        <div class="card" style="margin-bottom: 10px">
            <div class="card-body">
                <form action="{{route('admin.batches.index')}}" method="get">
                    <div class="row">

                        <div class="col-4">
                            <input type="text" class="form-control form-control-sm" placeholder="Search" name="search" value="{{$search}}">
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary" style="padding: 7px 15px;"><i class="fa-solid fa-filter"></i> Filter</button>
                        </div>

                        <div class="col-4 offset-2" style="text-align: right">
                            <a  href="{{route('admin.batches.create')}}" class="btn btn-outline-primary" style="padding: 0.5rem 1rem;"><i class="fa-solid fa-plus"></i> Add</a>
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
                            <th>Batch ID</th>
                            <th>Batch Name</th>
                            <th>Start Time</th>
                            <th>First Class</th>
                            <th>Duration</th>
                            <th>Fee</th>
                            <th>Teacher</th>
                            <th>Schedule</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $k => $data)
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$data->course->title}}</td>
                                <td>{{$data->batch_ID}}</td>
                                <td>{{$data->batch_name}}</td>
                                <td>{{date('d, F Y h:i A',strtotime($data->start_time))}}</td>
                                <td>{{date('d, F Y h:i A',strtotime($data->first_class))}}</td>
                                <td>{{$data->duration}}</td>
                                <td>
                                    Fee: {{$data->fee}},<br>
                                    Discount: {{$data->discount}},<br>
                                    Advanced: {{$data->advanced}},
                                </td>
                                <td>
                                    @foreach($data->teachers as $teacher)
                                        {{$teacher->teacher?->name}},
                                    @endforeach
                                </td>
                                <td style="width: 200px; word-wrap: break-word;white-space: break-spaces">{{$data->schedule}}</td>
                                <td>
                                    <span class="badge badge-sm light badge-primary">{{ucwords($data->status)}}</span>
                                </td>
                                <td>
                                    <a href="{{route('admin.batches.edit',$data->id)}}"><span class="badge badge-info"><i class="fa-solid fa-pen-to-square"></i></span></a>
                                    <button type="button" class="badge badge-danger" data-bs-toggle="modal" data-bs-target="#destroyModal" data-id="{{$data->id}}" data-action="{{route('admin.batches.destroy',$data->id)}}"><i class="fa-solid fa-trash"></i></button>
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

    @include('.backends.includes.delete-modal')
@endsection
