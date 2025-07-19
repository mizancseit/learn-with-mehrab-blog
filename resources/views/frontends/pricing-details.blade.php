@extends('frontends.layouts.master')
@section('title')
Pricing | {{$pricing->title}}
@endsection
@section('meta_keyword'){{$pricing->meta_keyword}} @endsection
@section('meta_description') {{$pricing->meta_description}} @endsection
@section('content')


    <!--- start single page hero section -->
{{--    <div class="single-page-hero-container">--}}
{{--        <div class="single-page-hero-overflow"></div>--}}
{{--        <div class="container">--}}
{{--            <h2 class="section-title">Pricing</h2>--}}
{{--            <p>We charge the low cost of our data recovery.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!--- end single page hero section -->


    <div class="blog-hero-area">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="contents text-center">
                        <h2 class="wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">{{$pricing->title}}</h2>
                        <div class="post-meta">
                            <ul>
                                <li><i class="lni-calendar"></i> <a href="#">{{date('d F, Y',strtotime($pricing->created_at))}}</a></li>
{{--                                <li><i class="lni-user"></i> <a href="#">{{$post->author?->name}}</a></li>--}}
                                <li><i class="lni-diamond"></i> <a href="#">{{$pricing->category?->title}}</a></li>
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
                        <div class="post-content">
                            {!! $pricing->long_description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
