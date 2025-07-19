@extends('backends.layouts.master_layout')
@section('title','Create Menu')
@section('page_heading','Menus')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')
        <form action="{{route('menus.store')}}" method="POST">
            @method('post')
            @csrf
            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Add Menu</h4>
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
                                <label class="form-label">Is Main Menu</label>
                                <select class="form-control form-control-sm @if($errors->has('is_main_menu')) error-border-for-validation @endif" name="is_main_menu">
                                    @foreach($isMainMenuList as $is_main_menu_data)
                                        @if($is_main_menu_data['id'] == 0)
                                            <option value="{{$is_main_menu_data['id']}}" selected>{{$is_main_menu_data['name']}}</option>
                                        @else
                                            <option value="{{$is_main_menu_data['id']}}">{{$is_main_menu_data['name']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('is_main_menu'))
                                    <div class="invalid-feedback">{{ $errors->first('is_main_menu') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Parent Menu</label>
                                <select class="form-control form-control-sm @if($errors->has('main_menu_id')) error-border-for-validation @endif" name="main_menu_id">
                                    <option value="">--Choose--</option>
                                    @foreach($menus as $menu)
                                       <option value="{{$menu->id}}">{{$menu->title}}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('main_menu_id'))
                                    <div class="invalid-feedback">{{ $errors->first('main_menu_id') }}</div>
                                @endif
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Sorting </label>
                                <input type="number" class="form-control form-control-sm @if($errors->has('sort_by')) error-border-for-validation @endif" placeholder="Enter Sorting Value" name="sort_by" value="{{old('sort_by') ? old('sort_by'):0 }}" >
                                @if($errors->has('sort_by'))
                                    <div class="invalid-feedback">{{ $errors->first('sort_by') }}</div>
                                @endif
                            </div>


                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
@endsection
