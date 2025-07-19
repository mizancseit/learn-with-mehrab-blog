@extends('backends.layouts.master_layout')
@section('title','Edit Course')
@section('page_heading','Course')
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
        <form action="{{route('admin.courses.update',$id)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Edit Course</h4>
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
                                <label class="form-label">Slug <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('slug')) error-border-for-validation @endif" placeholder="Enter slug" name="slug" value="{{$data->slug}}" >
                                @if($errors->has('slug'))
                                    <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
                                @endif
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Status <span class="mandatory">*</span></label>
                                <select class="js-example-basic-single form-control form-control-sm @if($errors->has('is_active')) error-border-for-validation @endif" name="is_active">
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
                                <label class="form-label"> Category<span class="mandatory">*</span></label>

                                <select class="js-example-basic-single form-control form-control-sm @if($errors->has('course_category_id')) error-border-for-validation @endif" name="course_category_id">
                                    @foreach($categories as $category)
                                        @if($category->id == $data->course_category_id)
                                            <option value="{{$category->id}}" selected>{{$category->title}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @if($errors->has('course_category_id'))
                                    <div class="invalid-feedback">{{ $errors->first('course_category_id') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label"> Levels<span class="mandatory">*</span></label>

                                <select class="js-example-basic-single form-control form-control-sm @if($errors->has('course_level_id')) error-border-for-validation @endif" name="course_level_id">
                                    @foreach($courseLevels as $level)
                                        @if($level->id == $data->course_level_id)
                                            <option value="{{$level->id}}" selected>{{$level->title}}</option>
                                        @else
                                            <option value="{{$level->id}}">{{$level->title}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @if($errors->has('course_level_id'))
                                    <div class="invalid-feedback">{{ $errors->first('course_level_id') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Course Types<span class="mandatory">*</span></label>

                                <select class="js-example-basic-single form-control form-control-sm @if($errors->has('course_type_id')) error-border-for-validation @endif" name="course_type_id">
                                    @foreach($courseTypes as $type)
                                        @if($type->id == $data->course_type_id)
                                            <option value="{{$type->id}}" selected>{{$type->title}}</option>
                                        @else
                                            <option value="{{$type->id}}">{{$type->title}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @if($errors->has('course_type_id'))
                                    <div class="invalid-feedback">{{ $errors->first('course_type_id') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Content Types<span class="mandatory">*</span></label>

                                <select class="js-example-basic-single form-control form-control-sm @if($errors->has('types')) error-border-for-validation @endif" name="types">
                                    @foreach($contentTypes as $contentType)
                                        @if($contentType['id'] == $data->types)
                                            <option value="{{$contentType['id']}}" selected>{{$contentType['name']}}</option>
                                        @else
                                            <option value="{{$contentType['id']}}">{{$contentType['name']}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @if($errors->has('types'))
                                    <div class="invalid-feedback">{{ $errors->first('types') }}</div>
                                @endif
                            </div>






                            <div class="mb-3 col-md-6">
                                <label class="form-label">Thumbnail <span class="mandatory">*</span></label>
                                <input type="file" class="form-control form-control-sm" name="thumbnail">
                                <img src="{{asset('uploads/lms/courses/'.$data->thumbnail)}}" alt="{{$data->title}}" height="100"/>
                                @if($errors->has('thumbnail'))
                                    <div class="invalid-feedback">{{ $errors->first('thumbnail') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Short Description</label>
                                <textarea name="short_description" class="form-control-sm form-control" placeholder="Enter Description" rows="5">{{$data->short_description}}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Objective</label>
                                <textarea name="objective" class="form-control-sm form-control" placeholder="Enter Objective" rows="5">{!! $data->objective !!}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Benefits</label>
                                <textarea name="benefits" class="form-control-sm form-control" placeholder="Enter Benefits" rows="5">{!! $data->benefits !!}</textarea>
                            </div>
                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Long Description</label>
                                <textarea name="long_description" class="form-control-sm form-control" placeholder="Enter Long Description" rows="5">{!! $data->long_description !!}</textarea>
                            </div>
                        </div>


                        <hr/>

                        <div class="mb-3 col-md-12">
                            <label class="form-label">Meta Title </label>
                            <input type="text" class="form-control form-control-sm @if($errors->has('meta_title')) error-border-for-validation @endif" placeholder="Enter meta keyword" name="meta_title" value="{{$data->meta_title}}" >
                        </div>

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
                var editor = CKEDITOR.replace( 'long_description',{
                    extraPlugins: 'cardsection'
                });

                var objective = CKEDITOR.replace( 'objective',{
                    extraPlugins: 'cardsection'
                });

                var benefits = CKEDITOR.replace( 'benefits',{
                    extraPlugins: 'cardsection'
                });
                CKFinder.setupCKEditor( editor);
                CKFinder.setupCKEditor( objective);
                CKFinder.setupCKEditor( benefits);

                $(document).ready(function() {
                    $('.js-example-basic-single').select2();
                });

            </script>
@endsection
