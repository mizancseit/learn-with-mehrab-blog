@extends('backends.layouts.master_layout')
@section('title','Staff Groups')
@section('page_heading','Staff Groups')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')


        <div class="card" style="margin-bottom: 10px">
            <div class="card-body">
                <form method="get" action="{{route('staff-groups.index')}}">
                    <div class="row">
                        <div class="col-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Search" name="search" value="{{$search}}">
                        </div>

                        <div class="col-2">
                            <button type="submit" class="btn btn-primary btn-sm" style="padding: 7px 10px"><i class="fa-solid fa-filter"></i> Filter</button>
                        </div>

                        <div class="col-2 offset-5" style="text-align: right">
                            @auth_access('create_group')
                            <a  href="{{route('staff-groups.create')}}" class="btn btn-outline-primary" style="padding: 0.5rem 1rem;"><i class="fa-solid fa-plus"></i> Add</a>
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
                            <th>Groups</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $k => $item)
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    @if($item->is_active == 0)
                                        <span class="badge badge-sm light badge-danger">Disabled</span>
                                    @else
                                        <span class="badge badge-sm light badge-primary">Enabled</span>
                                    @endif
                                </td>
                                <td>
                                    @auth_access('create_group')
                                    <a href="{{route('staff-groups.edit',$item->id)}}"><span class="badge badge-info"><i class="fa-solid fa-pen-to-square"></i></span></a>
                                    @end_auth_access

                                    @auth_access('create_group')
                                    <button type="button" class="badge badge-danger" data-bs-toggle="modal" data-bs-target="#destroyModal" data-id="{{$item->id}}" data-action="{{route('staff-groups.destroy',$item->id)}}"><i class="fa-solid fa-trash"></i></button>
                                    @end_auth_access
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                    {{$data->appends(['search'=>$search])}}

                </div>
            </div>
        </div>
    </div>

    @include('.backends.includes.delete-modal')
@endsection
