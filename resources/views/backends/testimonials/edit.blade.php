@extends('backends.layouts.master_layout')
@section('title','Edit Testimonials')
@section('page_heading','Testimonials')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')

        <form action="{{route('admin.testimonials.update',$id)}}" method="POST">
            @method('put')
            @csrf

            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Edit Testimonials</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">

                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Customer Name <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('customer_name')) error-border-for-validation @endif" placeholder="Enter name" name="customer_name" value="{{$data->customer_name}}" >
                                @if($errors->has('customer_name'))
                                    <div class="invalid-feedback">{{ $errors->first('customer_name') }}</div>
                                @endif
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Customer Designation <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('designation')) error-border-for-validation @endif" placeholder="Enter designation" name="designation" value="{{$data->designation}}" >
                                @if($errors->has('designation'))
                                    <div class="invalid-feedback">{{ $errors->first('designation') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Customer Company Name <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('company_name')) error-border-for-validation @endif" placeholder="Enter Company Name" name="company_name" value="{{$data->company_name}}" >
                                @if($errors->has('company_name'))
                                    <div class="invalid-feedback">{{ $errors->first('company_name') }}</div>
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



                            <div class="mb-3 col-md-12">
                                <label class="form-label">Comments</label>
                                <textarea class="form-control form-control-sm @if($errors->has('comments')) error-border-for-validation @endif" name="comments" rows="10">{{$data->comments}}</textarea>
                                @if($errors->has('comments'))
                                    <div class="invalid-feedback">{{ $errors->first('comments') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Image <span class="mandatory">*</span></label>
                                <input type="file" class="form-control form-control-sm @if($errors->has('image')) error-border-for-validation @endif" name="image">
                                @if($errors->has('image'))
                                    <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                                @endif

                                @if($data->image != "")
                                    <img src="{{asset('uploads/testimonials/'.$data->image)}}" height="70" width="70" style="margin-top: 10px">
                                @endif
                            </div>



                        </div>


                        <button type="submit" class="btn btn-primary">Save Testimonial</button>
                    </div>
                </div>
            </div>
        </form>
@endsection
