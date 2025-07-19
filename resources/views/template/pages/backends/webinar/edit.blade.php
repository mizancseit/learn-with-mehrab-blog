@extends('backends.layouts.master_layout')
@section('title','Edit Webinar')
@section('page_heading','Webinar')
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
        <form action="{{route('admin.webinars.update',$id)}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Edit Webinar</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">

                        <div class="row">

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Title <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('title')) error-border-for-validation @endif" placeholder="Enter title" name="title" value="{{$data->title}}" >
                                @if($errors->has('title'))
                                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Date & Time <span class="mandatory">*</span></label>
                                <input type="datetime-local" class="form-control form-control-sm @if($errors->has('date')) error-border-for-validation @endif" placeholder="Enter title" name="date" value="{{$data->date}}" >
                                @if($errors->has('date'))
                                    <div class="invalid-feedback">{{ $errors->first('date') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Duration <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('duration')) error-border-for-validation @endif" placeholder="Enter Duration" name="duration" value="{{$data->duration}}" >
                                @if($errors->has('duration'))
                                    <div class="invalid-feedback">{{ $errors->first('duration') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Medium <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('medium')) error-border-for-validation @endif" placeholder="Enter Medium" name="medium" value="{{$data->medium}}" >
                                @if($errors->has('medium'))
                                    <div class="invalid-feedback">{{ $errors->first('medium') }}</div>
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


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Course <span class="mandatory">*</span></label>

                                <select class="form-control form-control-sm @if($errors->has('course_id')) error-border-for-validation @endif" name="course_id">
                                    @foreach($courses as $course)
                                        @if($data->course_id == $course->course_id)
                                            <option value="{{$course->id}}" selected>{{$course->title}}</option>
                                        @else
                                            <option value="{{$course->id}}">{{$course->title}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @if($errors->has('course_id'))
                                    <div class="invalid-feedback">{{ $errors->first('course_id') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Thumbnail <span class="mandatory">*</span></label>
                                <input type="file" class="form-control form-control-sm" name="thumbnail">
                                <img src="{{asset('uploads/lms/webinars/'.$data->thumbnail)}}" height="50" alt="image">
                                @if($errors->has('thumbnail'))
                                    <div class="invalid-feedback">{{ $errors->first('thumbnail') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Short Description</label>
                                <textarea name="short_description" class="form-control-sm form-control" placeholder="Enter Short Description" rows="2">{{$data->short_description}}</textarea>
                            </div>
                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">What is Learn From this course</label>
                                <textarea name="what_is_learn" class="form-control-sm form-control"  rows="5">{!! $data->what_is_learn !!}</textarea>
                            </div>
                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Why need this course</label>
                                <textarea name="why_need_this_course" class="form-control-sm form-control" rows="5">{!! $data->why_need_this_course !!}</textarea>
                            </div>
                        </div>

                        <hr/>

                        <div class="mb-3 col-md-12">
                            <label class="form-label">Meta Keyword</label>
                            <input type="text" class="form-control form-control-sm @if($errors->has('meta_keyword')) error-border-for-validation @endif" placeholder="Enter meta keyword" name="meta_keyword" value="{{$data->meta_keyword}}" >
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control-sm form-control" placeholder="Enter Meta Description" rows="5">{{$data->meta_description}}</textarea>
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
                //CKEDITOR.replace( 'short_description' );
                var editor = CKEDITOR.replace( 'what_is_learn',{
                    extraPlugins: 'cardsection'
                });
                var editor1 = CKEDITOR.replace( 'why_need_this_course',{
                    extraPlugins: 'cardsection'
                });
                CKFinder.setupCKEditor( editor);
                CKFinder.setupCKEditor( editor1);
            </script>
@endsection
