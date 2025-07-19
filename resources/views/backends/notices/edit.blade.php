@extends('backends.layouts.master_layout')
@section('title','Edit Notices')
@section('page_heading','Notices')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')

        <form action="{{route('notices.update',$id)}}" method="POST">
            @method('put')
            @csrf

            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Edit Notices</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Client</label>
                                <select class="form-control form-control-sm" name="user_id">
                                    <option value="">--Choose--</option>
                                    @foreach($users  as $user)
                                        @if($data->user_id == $user->id)
                                            <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                        @else
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Types <span class="mandatory">*</span></label>
                                <select class="form-control form-control-sm" name="type">
                                    @foreach($types  as $type)
                                        @if($data->type == $type['id'])
                                            <option value="{{$type['id']}}" selected>{{$type['name']}}</option>
                                        @else
                                            <option value="{{$type['id']}}">{{$type['name']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('type'))
                                    <div class="invalid-feedback">{{ $errors->first('type') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Heading <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('heading')) error-border-for-validation @endif" placeholder="Enter Notice Heading" name="heading" value="{{$data->heading}}" >
                                @if($errors->has('heading'))
                                    <div class="invalid-feedback">{{ $errors->first('heading') }}</div>
                                @endif
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Status <span class="mandatory">*</span></label>
                                <select class="form-control form-control-sm @if($errors->has('is_active')) error-border-for-validation @endif" name="is_active">
                                    @foreach($statusList as $status_list)
                                        @if($status_list['id'] == $data->is_active)
                                            <option value="{{$status_list['id']}}" selected>{{$status_list['name']}}</option>
                                        @else
                                            <option value="{{$status_list['id']}}">{{$status_list['name']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('is_active'))
                                    <div class="invalid-feedback">{{ $errors->first('is_active') }}</div>
                                @endif
                            </div>
                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Message</label>
                                <textarea name="message" class="form-control-sm form-control" placeholder="Enter message">{{$data->message}}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Notices</button>
                    </div>
                </div>
            </div>
        </form>
@endsection
