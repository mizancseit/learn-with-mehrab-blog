@extends('backends.layouts.master_layout')
@section('title','Edit Pricing')
@section('page_heading','Pricing')
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

        <form action="{{route('admin.pricing.update',$id)}}" method="POST">
            @method('put')
            @csrf

            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Edit Pricing</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">

                        <div class="row">

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Title <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('title')) error-border-for-validation @endif" placeholder="Enter Blog title" name="title" value="{{$data->title}}" >
                                @if($errors->has('title'))
                                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                @endif
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Amount <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('amount')) error-border-for-validation @endif" placeholder="Enter Amount" name="amount" value="{{$data->amount}}" >
                                @if($errors->has('amount'))
                                    <div class="invalid-feedback">{{ $errors->first('amount') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Category <span class="mandatory">*</span></label>

                                <select class="form-control form-control-sm @if($errors->has('pricing_category_id')) error-border-for-validation @endif" name="pricing_category_id">
                                    <option value="">--Choose--</option>
                                    @foreach($pricing_categories as $category)
                                        <option value="{{$category->id}}" @if($category->id == $data->pricing_category_id) selected @endif>{{$category->title}}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('pricing_category_id'))
                                    <div class="invalid-feedback">{{ $errors->first('pricing_category_id') }}</div>
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
                                <label class="form-label">Is View Long Description <span class="mandatory">*</span></label>
                                <select class="form-control form-control-sm @if($errors->has('is_view_long_description')) error-border-for-validation @endif" name="is_view_long_description">
                                    @foreach($isViewLongDescriptions as $status_list)
                                        @if($status_list['id'] == $data->is_view_long_description)
                                            <option value="{{$status_list['id']}}" selected>{{$status_list['name']}}</option>
                                        @else
                                            <option value="{{$status_list['id']}}">{{$status_list['name']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('is_view_long_description'))
                                    <div class="invalid-feedback">{{ $errors->first('is_view_long_description') }}</div>
                                @endif
                            </div>


                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Short Description</label>
                                <textarea name="short_description" class="form-control-sm form-control" placeholder="Enter Short Description" rows="5">{!! $data->short_description !!}</textarea>
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
                var short_description = CKEDITOR.replace( 'short_description',{
                    extraPlugins: 'cardsection'
                });
                CKFinder.setupCKEditor( short_description);


                var long_description = CKEDITOR.replace( 'long_description',{
                    extraPlugins: 'cardsection'
                });
                CKFinder.setupCKEditor( long_description);
            </script>
@endsection
