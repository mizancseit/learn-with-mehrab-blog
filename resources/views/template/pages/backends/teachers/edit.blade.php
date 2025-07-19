@extends('backends.layouts.master_layout')
@section('title','Edit Teacher')
@section('page_heading',' Teachers')
@section('top_script')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('ckfinder/ckfinder.js')}}"></script>
    <script>
        CKEDITOR.plugins.addExternal('cardsection',"{{asset('ckeditor/plugins/cardsection/plugin.js')}}",'');
    </script>
@endsection
@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')
        <form action="{{route('admin.course-teachers.update',$id)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Edit Teacher</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">

                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Name <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('name')) error-border-for-validation @endif" placeholder="Enter name" name="name" value="{{$data->name}}" >
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Email <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('email')) error-border-for-validation @endif" placeholder="Enter email" name="email" value="{{$data->email}}" >
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Mobile <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('mobile')) error-border-for-validation @endif" placeholder="Enter mobile" name="mobile" value="{{$data->mobile}}" >
                                @if($errors->has('mobile'))
                                    <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
                                @endif
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Picture </label>
                                <input type="file" class="form-control form-control-sm" name="thumbnail">
                                <img src="{{asset('uploads/lms/teachers/'.$data->picture)}}" alt="" height="80" width="80"/>
                            </div>


                            <div class="mb-3 col-md-12">
                                <label class="form-label">Address </label>
                                <textarea class="form-control-sm form-control" placeholder="Enter Address" name="address">{{$data->address}}</textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">About Details </label>
                                <textarea class="form-control-sm form-control" placeholder="Enter About details" name="about_details">{!! $data->about_details !!}</textarea>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Facebook Link</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter FB Link" name="fb_link" value="{{$data->fb_link}}" >
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Twitter Link</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Twitter Link" name="twitter_link" value="{{$data->twitter_link}}" >
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Linkedin Link</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Linkedin Link" name="linkedin_link" value="{{$data->linkedin_link}}" >
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Experts</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter experts data" name="experts" value="{{$data->experts}}" >
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Work Designation</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Work Designation" name="work_designation" value="{{$data->work_designation}}" >
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Company Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter company name" name="company_name" value="{{$data->company_name}}" >
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
                                <label class="form-label">Comments</label>
                                <textarea name="comments" class="form-control-sm form-control" placeholder="Enter Comments" rows="5">{{$data->comments}}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
        @endsection
        @section('bottom_script')
            <script>

                var editor = CKEDITOR.replace( 'about_details',{
                    extraPlugins: 'cardsection'
                });

                CKFinder.setupCKEditor( editor);

                $(document).ready(function() {
                    $('.js-example-basic-single').select2();
                });

            </script>
@endsection
