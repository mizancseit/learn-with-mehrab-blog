@extends('backends.layouts.master_layout')
@section('title','Edit Blog Post')
@section('page_heading','Blog Post')
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

        <form action="{{route('blog-posts.update',$id)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Edit Blog Post</h4>
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
                                <label class="form-label">Category <span class="mandatory">*</span></label>

                                <select class="form-control form-control-sm @if($errors->has('category_id')) error-border-for-validation @endif" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($data->category_id == $category->id) selected @endif>{{$category->title}}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('category_id'))
                                    <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                                @endif
                            </div>


                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Description</label>
                                <textarea name="blog_description" class="form-control-sm form-control" placeholder="Enter Description" rows="5">{!! $data->description !!}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Thumbnail <span class="mandatory">*</span></label>
                                <input type="file" class="form-control form-control-sm" name="thumbnail">

                                @if($data->thumbnail != "")
                                    <img src="{{asset('uploads/blogs/'.$data->thumbnail)}}" height="150" width="150" alt="" style="margin-top: 10px">
                                @endif

                                @if($errors->has('thumbnail'))
                                    <div class="invalid-feedback">{{ $errors->first('thumbnail') }}</div>
                                @endif
                            </div>
                        </div>

                        <hr/>

                        <div class="mb-3 col-md-12">
                            <label class="form-label">Meta Keyword <span class="mandatory">*</span></label>
                            <input type="text" class="form-control form-control-sm @if($errors->has('meta_keyword')) error-border-for-validation @endif" placeholder="Enter meta keyword" name="meta_keyword" value="{{$data->meta_keyword}}" >
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control-sm form-control" placeholder="Enter Meta Description" rows="5">{{$data->meta_description}}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
@endsection
        @section('bottom_script')
            <script>
                //CKEDITOR.replace( 'short_description' );
                var editor = CKEDITOR.replace( 'blog_description',{
                    extraPlugins: 'cardsection'
                });
                CKFinder.setupCKEditor( editor);
            </script>
@endsection
