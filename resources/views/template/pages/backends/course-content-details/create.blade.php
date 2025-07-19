@extends('backends.layouts.master_layout')
@section('title','Create Course Details')
@section('page_heading',' Course Details')
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
        <form action="{{route('admin.course-content-details.store')}}" method="POST">
            @method('post')
            @csrf
            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Add Course Details</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">

                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Course <span class="mandatory">*</span></label>

                                <select class="js-example-basic-single form-control form-control-sm @if($errors->has('course_id')) error-border-for-validation @endif" name="course_id">
                                    <option value="">Choose Course</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->title}}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('course_id'))
                                    <div class="invalid-feedback">{{ $errors->first('course_id') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Course Content<span class="mandatory">*</span></label>

                                <select class="js-example-basic-single form-control form-control-sm @if($errors->has('course_content_id')) error-border-for-validation @endif" name="course_content_id">
                                    <option value="">Choose Course</option>
                                    @foreach($courseContents as $course_content)
                                        <option value="{{$course_content->id}}">{{$course_content->course?->title}} | {{$course_content->id}}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('course_content_id'))
                                    <div class="invalid-feedback">{{ $errors->first('course_content_id') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Icon </label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('icon')) error-border-for-validation @endif" placeholder="Enter Icon" name="icon" value="{{old('icon') == null ? '<i class="fa-brands fa-youtube"></i>': old('icon') }}" >
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Title <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('title')) error-border-for-validation @endif" placeholder="Enter Title" name="title" value="{{old('title')}}" >
                                @if($errors->has('title'))
                                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-12">
                                <label class="form-label">Subtitle </label>
                                <textarea class="form-control-sm form-control" name="subtitle" rows="5">{{old('subtitle') == null ? '<i class="fa-solid fa-video"></i> Live Class: 0, <i class="fa-brands fa-quinscape"></i> Quiz: 0, <i class="fa-solid fa-book"></i> Assignment: 0, <i class="fa-regular fa-clock"></i> Time: 00:00:00' : old('subtitle')}}</textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Description </label>
                               <textarea class="form-control form-control-sm" name="details">{!! old('details') !!}</textarea>
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
                var editor = CKEDITOR.replace( 'details',{
                    extraPlugins: 'cardsection',
                    extraAllowedContent: 'i[class]'
                });

                CKFinder.setupCKEditor( editor);

                $(document).ready(function() {
                    $('.js-example-basic-single').select2();
                });
            </script>
@endsection

