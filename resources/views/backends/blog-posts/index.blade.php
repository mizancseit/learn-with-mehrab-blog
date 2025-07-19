@extends('backends.layouts.master_layout')
@section('title','Blog Post')
@section('page_heading','Blog Posts')
@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')

        <div class="card" style="margin-bottom: 10px">
            <div class="card-body">
                <form action="{{route('blog-posts.index')}}" method="get">
                    <div class="row">
                        <div class="col-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Search" name="search" value="{{$search}}">
                        </div>

                        <div class="col-3">
                            <select  class="form-control form-control-sm" name="category_id">
                                <option value="">--Choose Category--</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($category->id == $category_id) selected @endif>{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <button type="submit" class="btn btn-primary" style="padding: 7px 15px;"><i class="fa-solid fa-filter"></i> Filter</button>
                            <a href="{{route('blog-posts.index')}}" class="btn btn-info" style="padding: 7px 15px;"><i class="fa-solid fa-refresh"></i></a>
                        </div>

                        <div class="col-3" style="text-align: right">
                            <a  href="{{route('blog-posts.create')}}" class="btn btn-outline-primary" style="padding: 0.5rem 1rem;"><i class="fa-solid fa-plus"></i> Create Post</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!--start blog code -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">

                    </div>
                    <div class="card-body pt-0">

                        @foreach($datas as $k => $data)
                        <div class="third-post">
                            @if($data->thumbnail == "")
                                <img src="{{asset('assets/admin/images/blog/s3.jpg')}}" alt="">
                            @else
                                <img src="{{asset('uploads/blogs/'.$data->thumbnail)}}" alt="">
                            @endif
                            <div class="post-1">
                                <div class="post-data">
                                    <span class="badge badge-secondary border-0 badge-sm">{{$data->category?->title}}</span>
                                    <h4>{{$data->title}}</h4>
                                    <div class="mb-2">
                                        <img src="{{asset('assets/admin/images/contacts/pic2.jpg')}}" class="avatar rounded-circle me-2 small-post" alt="">
                                        <span><b class="text-primary">{{$data->author?->name}}</b> in {{date('F , Y',strtotime($data->created_at))}}</span>
                                    </div>
                                    <span>
                                        {{substr(strip_tags($data->description), 0, 200)}}
                                    </span><br/>
                                    <div style="margin-top: 6px"></div>
                                    <span><b class="text-primary">Status:</b> {!! $data->is_active == 0 ? '<span class="badge badge-danger border-0 badge-sm">In-Active</span>' : '<span class="badge badge-info border-0 badge-sm">Active</span>' !!}</span>
                                    <br/><div style="margin-top: 10px"></div>
                                    <a href="{{route('blog-posts.edit',$data->id)}}"><span class="badge badge-primary"><i class="fa-solid fa-pen-to-square"></i></span></a>
                                    <button type="button" class="badge badge-danger" data-bs-toggle="modal" data-bs-target="#destroyModal" data-id="{{$data->id}}" data-action="{{route('blog-posts.destroy',$data->id)}}"><i class="fa-solid fa-trash"></i></button>

                                </div>
                            </div>
                        </div>
                            <hr style="border-color: rgba(192,192,192,0.61)"/>
                        @endforeach

                            {{$datas->appends(['search'=>$search])}}

                    </div>
                </div>
            </div>
        </div>
        <!--end blog code -->

    </div>

    @include('.backends.includes.delete-modal')
@endsection


