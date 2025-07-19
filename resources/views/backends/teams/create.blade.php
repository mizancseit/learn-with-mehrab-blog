@extends('backends.layouts.master_layout')
@section('title','Create Teams')
@section('page_heading','Teams')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')
        <form action="{{route('admin.teams.store')}}" method="POST" enctype="multipart/form-data">
            @method('post')
            @csrf
            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Add Team Member</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">

                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Name <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('name')) error-border-for-validation @endif" placeholder="Enter name" name="name" value="{{old('name')}}" >
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Designation <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('designation')) error-border-for-validation @endif" placeholder="Enter designation" name="designation" value="{{old('designation')}}" >
                                @if($errors->has('designation'))
                                    <div class="invalid-feedback">{{ $errors->first('designation') }}</div>
                                @endif
                            </div>



                            <div class="mb-3 col-md-6">
                                <label class="form-label">Status <span class="mandatory">*</span></label>
                                <select class="form-control form-control-sm @if($errors->has('is_active')) error-border-for-validation @endif" name="is_active">
                                    @foreach($statusList as $status_list)
                                        @if($status_list['id'] == 1)
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



                            <div class="mb-3 col-md-6">
                                <label class="form-label">Facebook Link </label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('fb_link')) error-border-for-validation @endif" placeholder="Enter facebook link" name="fb_link" value="{{old('fb_link')}}" >
                                @if($errors->has('fb_link'))
                                    <div class="invalid-feedback">{{ $errors->first('fb_link') }}</div>
                                @endif
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Twitter Link </label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('twiter_link')) error-border-for-validation @endif" placeholder="Enter twitter link" name="twiter_link" value="{{old('twiter_link')}}" >
                                @if($errors->has('twiter_link'))
                                    <div class="invalid-feedback">{{ $errors->first('twiter_link') }}</div>
                                @endif
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Linkedin Link </label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('linkedin_link')) error-border-for-validation @endif" placeholder="Enter linkedin link" name="linkedin_link" value="{{old('linkedin_link')}}" >
                                @if($errors->has('linkedin_link'))
                                    <div class="invalid-feedback">{{ $errors->first('linkedin_link') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Instagram Link </label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('instagram_link')) error-border-for-validation @endif" placeholder="Enter instagram link" name="instagram_link" value="{{old('instagram_link')}}" >
                                @if($errors->has('instagram_link'))
                                    <div class="invalid-feedback">{{ $errors->first('instagram_link') }}</div>
                                @endif
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Sort By </label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('sort_by')) error-border-for-validation @endif" placeholder="Enter Sort By" name="sort_by" value="{{old('sort_by') == null ? 0:old('sort_by')}}" >
                                @if($errors->has('sort_by'))
                                    <div class="invalid-feedback">{{ $errors->first('sort_by') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Image <span class="mandatory">*</span></label>
                                <input type="file" class="form-control form-control-sm @if($errors->has('image')) error-border-for-validation @endif" name="image">
                                @if($errors->has('image'))
                                    <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                                @endif
                            </div>

                        </div>


                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
@endsection
