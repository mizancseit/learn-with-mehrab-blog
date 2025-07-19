@extends('backends.layouts.master_layout')
@section('title','Notices')
@section('page_heading','Notices')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')

        <div class="card" style="margin-bottom: 10px">
            <div class="card-body">
                <form action="{{route('notices.index')}}" method="get">
                    <div class="row">

                        <div class="col-4">
                            <input type="text" class="form-control form-control-sm" placeholder="Search" name="search" value="{{$search}}">
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary" style="padding: 7px 15px;"><i class="fa-solid fa-filter"></i> Filter</button>
                        </div>

                        <div class="col-4 offset-2" style="text-align: right">
                            @auth_access('store_notice')
                            <a  href="{{route('notices.create')}}" class="btn btn-outline-primary" style="padding: 0.5rem 1rem;"><i class="fa-solid fa-plus"></i> Add</a>
                            @end_auth_access
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
                            <th>Notice Type</th>
                            <th>Heading</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $k => $data)
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$data->type}}</td>
                                <td>{{$data->heading}}</td>
                                <td>{{$data->message}}</td>
                                <td>
                                    @if($data->is_active == 0)
                                        <span class="badge badge-sm light badge-danger">Disabled</span>
                                    @else
                                        <span class="badge badge-sm light badge-primary">Enabled</span>
                                    @endif
                                </td>
                                <td>{{$data->user_id != "" ? $data->user_id: 'N/A'}}</td>
                                <td>
                                    @auth_access('update_notice')
                                    <a href="{{route('notices.edit',$data->id)}}"><span class="badge badge-info"><i class="fa-solid fa-pen-to-square"></i></span></a>
                                    @end_auth_access

                                    @auth_access('destroy_notice')
                                    <button type="button" class="badge badge-danger" data-bs-toggle="modal" data-bs-target="#destroyModal" data-id="{{$data->id}}" data-action="{{route('notices.destroy',$data->id)}}"><i class="fa-solid fa-trash"></i></button>
                                    @end_auth_access
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
