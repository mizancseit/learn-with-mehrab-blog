@extends('backends.layouts.master_layout')
@section('title','Edit Staffs')
@section('page_heading','Staffs')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')
        <form action="{{route('staffs.update',$user_id)}}" method="POST">
            @method('put')
            @csrf

            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Edit Staffs</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Name <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('name')) error-border-for-validation @endif" placeholder="Enter Name" name="name" value="{{$data->name}}" >
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-4">
                                <label class="form-label">Mobile Number <span class="mandatory">*</span></label>
                                <input type="number" class="form-control form-control-sm @if($errors->has('mobile')) error-border-for-validation @endif" placeholder="Enter Mobile Number" name="mobile" value="{{$data->mobile}}" >
                                @if($errors->has('mobile'))
                                    <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
                                @endif
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Email <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('email')) error-border-for-validation @endif" placeholder="Enter Email" name="email" value="{{$data->email}}">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Username <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('user_name')) error-border-for-validation @endif" placeholder="Enter Username" name="user_name" value="{{$data->user_name}}">
                                @if($errors->has('user_name'))
                                    <div class="invalid-feedback">{{ $errors->first('user_name') }}</div>
                                @endif
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Password <span class="mandatory">*</span></label>
                                <input type="password" class="form-control form-control-sm @if($errors->has('password')) error-border-for-validation @endif" placeholder="Enter Password" name="password">
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">PIN <span class="mandatory">*</span></label>
                                <input type="number" class="form-control form-control-sm @if($errors->has('pin')) error-border-for-validation @endif" placeholder="Enter PIN" name="pin" value="{{$data->pin}}">
                                @if($errors->has('pin'))
                                    <div class="invalid-feedback">{{ $errors->first('pin') }}</div>
                                @endif
                            </div>
                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Staff Groups <span class="mandatory">*</span></label>
                                <select class="form-control form-control-sm" name="role_id">
                                    @foreach($roles as $role)
                                        @if($role->id == $data->role_id)
                                            <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                        @else
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('role_id'))
                                    <div class="invalid-feedback">{{ $errors->first('role_id') }}</div>
                                @endif
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Status <span class="mandatory">*</span></label>
                                <select class="form-control form-control-sm" name="is_active">
                                    @foreach($status as $status)
                                        @if($status['id'] == $data->is_active)
                                            <option value="{{$status['id']}}" selected>{{$status['text']}}</option>
                                        @else
                                            <option value="{{$status['id']}}">{{$status['text']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('role_id'))
                                    <div class="invalid-feedback">{{ $errors->first('role_id') }}</div>
                                @endif
                            </div>

                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Note/Commnets</label>
                                <textarea name="notes" class="form-control-sm form-control" placeholder="Enter Note/Comments">{{$data->notes}}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Staffs</button>
                    </div>
                </div>
            </div>
        </form>
@endsection
