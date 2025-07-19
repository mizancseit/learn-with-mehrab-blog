@extends('backends.layouts.master_layout')
@section('title','Create Course Content')
@section('page_heading',' Course Contents')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')
        <form action="{{route('admin.course-contents.store')}}" method="POST">
            @method('post')
            @csrf
            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Add Course Content</h4>
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
                                <label class="form-label">Total Week </label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('total_week')) error-border-for-validation @endif" placeholder="Enter Total Week" name="total_week" value="{{old('total_week')}}" >
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Total Time </label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('total_time')) error-border-for-validation @endif" placeholder="Enter Total Time" name="total_time" value="{{old('total_time')}}" >
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Total Class </label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('total_class')) error-border-for-validation @endif" placeholder="Enter Total Class" name="total_class" value="{{old('total_class')}}" >
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Total Live Class </label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('total_live_class')) error-border-for-validation @endif" placeholder="Enter Total Live Class" name="total_live_class" value="{{old('total_live_class')}}" >
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Total Quiz </label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('total_quiz')) error-border-for-validation @endif" placeholder="Enter Total Quiz" name="total_quiz" value="{{old('total_quiz')}}" >
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Total Assignment </label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('total_assignment')) error-border-for-validation @endif" placeholder="Enter Total Assignment" name="total_assignment" value="{{old('total_assignment')}}" >
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
                $(document).ready(function() {
                    $('.js-example-basic-single').select2();
                });
            </script>
@endsection
