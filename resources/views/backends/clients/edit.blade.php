@extends('backends.layouts.master_layout')
@section('title','Edit Clients')
@section('page_heading','Edit Clients')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')
        <form action="{{route('clients.update',$id)}}" method="POST">
            @method('put')
            @csrf
        <div class="card">
            <div class="card-header" style="padding: 12px 20px;">
                <h4 class="card-title">Company Information</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Company Name <span class="mandatory">*</span></label>
                            <input type="text" class="form-control form-control-sm @if($errors->has('company_name')) error-border-for-validation @endif" placeholder="Enter Company Name" name="company_name" value="{{$data->company_name}}">
                            @if($errors->has('company_name'))
                                <div class="invalid-feedback">{{ $errors->first('company_name') }}</div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Contact Person <span class="mandatory">*</span></label>
                            <input type="text" class="form-control form-control-sm @if($errors->has('contact_person')) error-border-for-validation @endif" placeholder="Enter Contact Person Name" name="contact_person" value="{{$data->contact_person}}">
                            @if($errors->has('contact_person'))
                                <div class="invalid-feedback">{{ $errors->first('contact_person') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" style="padding: 12px 20px;">
                <h4 class="card-title">Personal Information</h4>
            </div>

            <div class="card-body">
                <div class="basic-form">

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Mobile Number <span class="mandatory">*</span></label>
                            <input type="number" class="form-control form-control-sm @if($errors->has('mobile')) error-border-for-validation @endif" placeholder="Enter Mobile Number" name="mobile" value="{{$data->mobile}}" >
                            @if($errors->has('mobile'))
                                <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
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
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Note/Commnets</label>
                            <textarea name="notes" class="form-control-sm form-control" placeholder="Enter Note/Comments">{{$data->notes}}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Status <span class="mandatory">*</span></label>
                            <select class="form-control form-control-sm" name="is_active">
                                @if($data->is_active == 0)
                                    <option value="0" selected>Disabled</option>
                                @else
                                    <option value="0">Disabled</option>
                                @endif

                                @if($data->is_active == 1)
                                    <option value="1" selected>Enabled</option>
                                @else
                                    <option value="1">Enabled</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Client</button>
                </div>
            </div>
        </div>
        </form>
@endsection
