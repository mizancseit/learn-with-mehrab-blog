@extends('backends.layouts.master_layout')
@section('title','Edit Batch')
@section('page_heading',' Course Batch')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')
        <form action="{{route('admin.batches.update',$id)}}" method="POST">
            @method('put')
            @csrf
            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Edit Course Batch</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">

                        <div class="row">

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Course <span class="mandatory">*</span></label>
                                <select class="js-example-basic-single form-control form-control-sm" name="course_id">
                                    <option value="">Choose Course</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}" @if($course->id == $data->course_id) selected @endif>{{$course->title}}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('course_id'))
                                    <div class="invalid-feedback">{{ $errors->first('course_id') }}</div>
                                @endif
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Batch ID/Number <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('batch_ID')) error-border-for-validation @endif" placeholder="Enter Batch ID" name="batch_ID" value="{{$data->batch_ID}}" >
                                @if($errors->has('batch_ID'))
                                    <div class="invalid-feedback">{{ $errors->first('batch_ID') }}</div>
                                @endif
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Batch Name <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('batch_name')) error-border-for-validation @endif" placeholder="Enter Batch Name" name="batch_name" value="{{$data->batch_name}}" >
                                @if($errors->has('batch_name'))
                                    <div class="invalid-feedback">{{ $errors->first('batch_name') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Start Time <span class="mandatory">*</span></label>
                                <input type="datetime-local" class="form-control form-control-sm @if($errors->has('start_time')) error-border-for-validation @endif" placeholder="Enter Start Time" name="start_time" value="{{$data->start_time}}" >
                                @if($errors->has('start_time'))
                                    <div class="invalid-feedback">{{ $errors->first('start_time') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">First Class </label>
                                <input type="date" class="form-control form-control-sm @if($errors->has('first_class')) error-border-for-validation @endif" placeholder="Enter First Class" name="first_class" value="{{date('Y-m-d',strtotime($data->first_class))}}" >
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Duration </label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('duration')) error-border-for-validation @endif" placeholder="Enter Duration" name="duration" value="{{$data->duration}}" >
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Schedule </label>
                                <textarea class="form-control-sm form-control" name="schedule">{{$data->schedule != null ? $data->schedule : '[{"day":"Satharday","time":"রাত ৯:০০ থেকে ১০:০০"},{"day":"Friday","time":"রাত ৯:০০ থেকে ১০:০০"}]'}}</textarea>
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Fee <span class="mandatory">*</span></label>
                                <input type="number" class="form-control form-control-sm @if($errors->has('fee')) error-border-for-validation @endif" placeholder="Enter Fee" name="fee" value="{{$data->fee}}" >
                                @if($errors->has('fee'))
                                    <div class="invalid-feedback">{{ $errors->first('fee') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Discount</label>
                                <input type="number" class="form-control form-control-sm @if($errors->has('discount')) error-border-for-validation @endif" placeholder="Enter Discount" name="discount" value="{{$data->discount != null ? $data->discount : 0}}" >
                                @if($errors->has('discount'))
                                    <div class="invalid-feedback">{{ $errors->first('discount') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Advanced</label>
                                <input type="number" class="form-control form-control-sm @if($errors->has('advanced')) error-border-for-validation @endif" placeholder="Enter Advanced" name="advanced" value="{{$data->advanced != null ? $data->advanced : 0}}" >
                                @if($errors->has('advanced'))
                                    <div class="invalid-feedback">{{ $errors->first('advanced') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Status <span class="mandatory">*</span></label>
                                <select class="form-control form-control-sm @if($errors->has('status')) error-border-for-validation @endif" name="status">
                                    @foreach($batchStatus as $signle_batchStatus)
                                        <option value="{{$signle_batchStatus->value}}" @if($data->status == $signle_batchStatus->value) selected @endif>{{$signle_batchStatus->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('status'))
                                    <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                                @endif
                            </div>
                        </div>

                        <hr/>
                        <h3>Assign Batch Teachers</h3>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Teachers <span class="mandatory">*</span></label>
                                <select class="js-example-basic-multiple form-control form-control-sm" name="teacher_id[]" multiple>
                                    <option value="">Choose Course</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}" @if(in_array($teacher->id,$batchTeachersId)) selected @endif>{{$teacher->name}}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('teacher_id'))
                                    <div class="invalid-feedback">{{ $errors->first('teacher_id') }}</div>
                                @endif
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
                    $('.js-example-basic-multiple').select2();
                });


            </script>
@endsection
