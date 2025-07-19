@extends('frontends.layouts.master')
@section('title') {{$post->title}} @endsection
@section('meta_keyword') {{$post->meta_keyword}} @endsection
@section('meta_description') {{$post->meta_description}} @endsection
@section('content')

    <div class="blog-hero-area">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="contents text-center">
                        <h2 class="wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">{{$post->title}}</h2>
                        <div class="post-meta">
                            <ul>
                                <li><i class="lni-calendar"></i> <a href="#">{{date('d F, Y',strtotime($post->created_at))}}</a></li>
                                <li><i class="lni-user"></i> <a href="#">{{$post->author?->name}}</a></li>
                                <li><i class="lni-diamond"></i> <a href="#">{{$post->category?->title}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="blog-single">
        <div class="container">

            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="blog-post">
                        <div class="post-thumb">
                            <img src="{{asset('uploads/blogs/'.$post->thumbnail)}}" alt="{{$post->title}}">
                        </div>
                        <div class="post-content">
                           {!! $post->description !!}
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection
