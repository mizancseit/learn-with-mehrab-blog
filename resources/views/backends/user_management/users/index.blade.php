@extends('backends.layouts.master_layout')
@section('title','Staffs')
@section('page_heading','Staffs')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')

        <div class="card">
            <div class="card-body">
                <form  method="get" action="{{route('staffs.index')}}">
                    <div class="row">
                        <div class="col-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Search" name="search" value="{{$search}}">
                        </div>

                        <div class="col-2">
                            <button type="submit" class="btn btn-primary btn-sm" style="padding: 7px 10px"><i class="fa-solid fa-filter"></i> Filter</button>
                        </div>

                        <div class="col-4 offset-3" style="text-align: right">
                            @auth_access('create_group')
                                <a  href="{{route('staffs.create')}}" class="btn btn-outline-primary" style="padding: 0.5rem 1rem;"><i class="fa-solid fa-plus"></i> Add</a>
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
                            <th>Staff Name</th>
                            <th>Mobile</th>
                            <th>email</th>
                            <th>Username</th>
                            <th>Note</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $k => $client)
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->mobile}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->user_name}}</td>
                                <td>
                                    @if($client->notes != "")
                                        {{$client->notes}}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if($client->is_active == 0)
                                        <span class="badge badge-sm light badge-danger">Disabled</span>
                                    @else
                                        <span class="badge badge-sm light badge-primary">Enabled</span>
                                    @endif
                                </td>
                                <td>
                                    @auth_access('permission_staffs')
                                    <a href="{{route('staffs.show',$client->id)}}"><span class="badge badge-primary"><i class="fa-solid fa-users"></i></span></a>
                                    @end_auth_access

                                    @auth_access('edit_staffs')
                                    <a href="{{route('staffs.edit',$client->id)}}"><span class="badge badge-info"><i class="fa-solid fa-pen-to-square"></i></span></a>
                                    @end_auth_access

                                    @auth_access('delete_staffs')
                                    <button type="button" class="badge badge-danger" data-bs-toggle="modal" data-bs-target="#destroyModal" data-id="{{$client->id}}" data-action="{{route('staffs.destroy',$client->id)}}"><i class="fa-solid fa-trash"></i></button>
                                    @end_auth_access
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                    {{$clients->links()}}

                </div>
            </div>
        </div>
    </div>

    @include('.backends.includes.delete-modal')
@endsection
