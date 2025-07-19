@extends('backends.layouts.master_layout')
@section('title','Activity Logs')
@section('page_heading','Activity Logs')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')

{{--        <div class="card" style="margin-bottom: 15px">--}}
{{--            <div class="card-body">--}}
{{--                <form action="{{route('clients.index')}}" method="get">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-3">--}}
{{--                            <input type="text" class="form-control form-control-sm" placeholder="Search" name="search" value="{{$search}}">--}}
{{--                        </div>--}}

{{--                        <div class="col-2">--}}
{{--                            <button type="submit" class="btn btn-primary btn-sm" style="padding: 9px 15px"><i class="fa-solid fa-filter"></i> Filter</button>--}}
{{--                        </div>--}}

{{--                        <div class="col-4 offset-3" style="text-align: right">--}}
{{--                            <a  href="{{route('clients.create')}}" class="btn btn-outline-primary" style="padding: 0.5rem 1rem;"><i class="fa-solid fa-plus"></i> Add</a>--}}
{{--                            <ul class="nav nav-tabs dzm-tabs" id="myTab-4" role="tablist" style="width: 180px;float: right;margin-left: 10px;padding: 0px !important;">--}}
{{--                                <li class="nav-item" role="presentation">--}}
{{--                                    <button class="nav-link active" id="home-tab-4" data-bs-toggle="tab" data-bs-target="#VerticalVariation" type="button" role="tab" aria-selected="true"><i class="fa-solid fa-file-excel"></i> Excel</button>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item" role="presentation">--}}
{{--                                    <button class="nav-link " id="profile-tab-4" data-bs-toggle="tab" data-bs-target="#VerticalVariation-html" type="button" role="tab" aria-selected="false" tabindex="-1"><i class="fa-solid fa-file-pdf"></i> PDF</button>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}


        <div class="card">
            <div class="card-body">



                <div class="table-responsive">
                    <table class="table header-border table-responsive-sm">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Details</th>
                            <th>Events</th>
                            <th>User</th>
                            <th>Change By</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activity_logs as $k => $client)
                            <tr>
                                <td>{{$k+1}}</td>
                                <td><a href="{{route('activity.log.show',$client->id)}}" style="text-decoration: underline">{{$client->description}}</a> </td>
                                <td><a href="{{route('activity.log.show',$client->id)}}" style="text-decoration: underline">{{$client->event}}</a></td>
                                <td>{{$client->subject?->name}} | {{$client->subject?->code}}</td>
                                <td>{{$client->causer?->name}} | {{$client->causer?->code}}</td>
                                <td>{{$client->created_at}}</td>
                                <td>
                                    <a href="{{route('activity.log.show',$client->id)}}"><span class="badge badge-outline-info"><i class="fa-solid fa-eye"></i> Details</span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

    @include('.backends.includes.delete-modal')
@endsection
