@extends('backends.layouts.master_layout')
@section('title','Activity Logs')
@section('page_heading','Activity Logs')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table header-border table-responsive-sm">
                        <tr>
                            <th>Log Name</th>
                            <td>:</td>
                            <td>{{$activity_log->log_name}}</td>
                        </tr>

                        <tr>
                            <th>Details</th>
                            <td>:</td>
                            <td>{{$activity_log->description}}</td>
                        </tr>

                        <tr>
                            <th>Event</th>
                            <td>:</td>
                            <td>{{$activity_log->event}}</td>
                        </tr>

                        <tr>
                            <th>Change User</th>
                            <td>:</td>
                            <td>{{$activity_log->subject_id}}</td>
                        </tr>


                        <tr>
                            <th>Change By</th>
                            <td>:</td>
                            <td>{{$activity_log->causer_id}}</td>
                        </tr>


                        <tr>
                            <th>Change Data</th>
                            <td>:</td>
                            <td>
                                @foreach($activity_log->properties as $properties)
                                    @if(is_array($properties))
                                        <table class="table table-bordered">
                                        @foreach($properties as $k => $property)
                                            <tr>
                                                <td>{{$k}}</td>
                                                <td>:</td>
                                                <td>{{$property}}</td>
                                            </tr>
                                        @endforeach
                                        </table>
                                    @endif
                                @endforeach
                            </td>
                        </tr>


                        <tr>
                            <th>Change Date</th>
                            <td>:</td>
                            <td>{{$activity_log->created_at}}</td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>

    @include('.backends.includes.delete-modal')
@endsection
