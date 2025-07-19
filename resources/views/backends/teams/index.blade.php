@extends('backends.layouts.master_layout')
@section('title','Teams')
@section('page_heading','Teams')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')

        <div class="card" style="margin-bottom: 10px">
            <div class="card-body">
                <form action="{{route('admin.teams.index')}}" method="get">
                    <div class="row">

                        <div class="col-4">
                            <input type="text" class="form-control form-control-sm" placeholder="Search" name="search" value="{{$search}}">
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary" style="padding: 7px 15px;"><i class="fa-solid fa-filter"></i> Filter</button>
                        </div>

                        <div class="col-4 offset-2" style="text-align: right">
                            <a  href="{{route('admin.teams.create')}}" class="btn btn-outline-primary" style="padding: 0.5rem 1rem;"><i class="fa-solid fa-plus"></i> Add</a>
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
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Image</th>
                            <th>Url</th>
                            <th>Sort By</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $k => $data)
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->designation}}</td>
                                <td><img src="{{asset('uploads/teams/'.$data->image)}}" height="70" width="70"></td>
                                <td>
                                    <p style="margin:0;padding: 0">Fb: {{$data->fb_link == "" ? 'N/A':$data->fb_link}}</p>
                                    <p style="margin:0;padding: 0">Twitter: {{$data->twiter_link == "" ? 'N/A':$data->twiter_link}}</p>
                                    <p style="margin:0;padding: 0">Linkedin: {{$data->linkedin_link == "" ? 'N/A':$data->linkedin_link}}</p>
                                    <p style="margin:0;padding: 0">Instagram: {{$data->instagram_link == "" ? 'N/A':$data->instagram_link}}</p>
                                </td>
                                <td>{{$data->sort_by}}</td>
                                <td>
                                    @if($data->is_active == 0)
                                        <span class="badge badge-sm light badge-danger">Disabled</span>
                                    @else
                                        <span class="badge badge-sm light badge-primary">Enabled</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.teams.edit',$data->id)}}"><span class="badge badge-info"><i class="fa-solid fa-pen-to-square"></i></span></a>
                                    <button type="button" class="badge badge-danger" data-bs-toggle="modal" data-bs-target="#destroyModal" data-id="{{$data->id}}" data-action="{{route('admin.teams.destroy',$data->id)}}"><i class="fa-solid fa-trash"></i></button>
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
