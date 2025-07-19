@extends('template.layout.app_for_vue')
@section('title',"Blog Details")
@section('content')
    <div class="contact-us-bg-section"></div>

    <div class="container">
        <div class="static-content-container">
            <h1>{{$blog->title}}</h1>
            <div class="blog-info">
                <p class="blog-category text-muted small">
                    <i class="fa-solid fa-clock"></i> {{date('d F Y',strtotime($blog->created_at))}}
                </p>
                <p class="blog-author text-muted small"><i class="fa-solid fa-eye"></i> {{$blog->category?->title}}</p>
            </div>
            <p class="text-muted small mb-3" style="text-align: left">
                <i class="fa-solid fa-user"></i> {{$blog->author?->name}}
            </p>

            <div>
                <img src="{{asset('uploads/blogs/'.$blog->thumbnail)}}" alt="{{$blog->title}}" width="100%">
            </div>

            <div style="margin-top: 20px">{!! $blog->description !!}</div>


        </div>
    </div>

@endsection
