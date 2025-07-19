@extends('backends.layouts.master_layout')
@section('title','Create Page')
@section('page_heading','Pages')
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
        <form action="{{route('pages.store')}}" method="POST">
            @method('post')
            @csrf
            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Add Page</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">

                        <div class="row">

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Title <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('title')) error-border-for-validation @endif" placeholder="Enter title" name="title" value="{{old('title')}}" >
                                @if($errors->has('title'))
                                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                @endif
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Slug <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('slug')) error-border-for-validation @endif" placeholder="Enter slug" name="slug" value="{{old('slug')}}" >
                                @if($errors->has('slug'))
                                    <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Page Type <span class="mandatory">*</span></label>
                                <select class="form-control form-control-sm @if($errors->has('type')) error-border-for-validation @endif" name="type">
                                    @foreach($pageTypes as $type)
                                       <option value="{{$type['id']}}" @if($type['id'] == 'static')selected @endif>{{$type['name']}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('type'))
                                    <div class="invalid-feedback">{{ $errors->first('type') }}</div>
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

                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Description</label>
                                <textarea name="content" class="form-control-sm form-control" placeholder="Enter Description" rows="5">{{old('description')}}</textarea>
                            </div>
                        </div>

                        <hr/>

                        <div class="mb-3 col-md-12">
                            <label class="form-label">Meta Keyword</label>
                            <input type="text" class="form-control form-control-sm @if($errors->has('meta_keyword')) error-border-for-validation @endif" placeholder="Enter meta keyword" name="meta_keyword" value="{{old('meta_keyword')}}" >
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control-sm form-control" placeholder="Enter Meta Description" rows="5">{{old('meta_description')}}</textarea>
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
                var editor = CKEDITOR.replace( 'content',{
                    extraPlugins: 'cardsection'
                });
                CKFinder.setupCKEditor( editor);
            </script>
@endsection
