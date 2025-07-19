@extends('frontends.layouts.master')
@section('title','Blogs | Data Recovery BD')
@section('meta_keyword','Blogs')
@section('meta_description','Blogs | Data Recovery BD')
@section('content')


{{--    <!--- start single page hero section -->--}}
{{--    <div class="single-page-hero-container">--}}
{{--        <div class="single-page-hero-overflow"></div>--}}
{{--        <div class="container">--}}
{{--            <h2 class="section-title">Blogs</h2>--}}
{{--            <p>Read our Latest Blog Posts</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!--- end single page hero section -->--}}


    <div class="blog-hero-area">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="contents text-center">
                        <h2 class="wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Blogs</h2>
                        <p class="white-text-color">Data recovery Related latest blog post here</p>
                        <p class="white-text-color">if you know about data recovery-related information please read our blog</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Blog Section -->
    <section id="blog" class="section">
        <!-- Container Starts -->
        <div class="container">

{{--            <!-- Start Row -->--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="blog-text section-header text-center">--}}
{{--                        <div>--}}
{{--                            <h2 class="section-title">Latest Blog Posts</h2>--}}
{{--                            <div class="desc-text">--}}
{{--                                <p>Data recovery Related latest blog post here</p>--}}
{{--                                <p>if you know about data recovery-related information please read our blog</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <!-- End Row -->--}}


            <!-- Start Row -->
            <div class="row">

                @foreach($posts as $blog)
                    <!-- Start Col -->
                    <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
                        <!-- Blog Item Starts -->
                        <div class="blog-item-wrapper">
                            <div class="blog-item-img">
                                <a href="{{route('blogs.show',$blog->slug)}}">
                                    @if($blog->thumbnail == "")
                                        <img src="{{asset('assets/admin/images/blog/s3.jpg')}}" class="img-fluid" alt="{{$blog->title}}">
                                    @else
                                        <img src="{{asset('uploads/blogs/'.$blog->thumbnail)}}" class="img-fluid" alt="{{$blog->title}}">
                                    @endif
                                </a>
                            </div>
                            <div class="blog-item-text">
                                <h3 class="hide-text-after-2-line"><a href="{{route('blogs.show',$blog->slug)}}">{{$blog->title}}</a></h3>
                                <p>{{substr(strip_tags($blog->description), 0, 200)}}</p>
                                <a href="{{route('blogs.show',$blog->slug)}}" class="read-more">Read More</a>
                            </div>
                            <div class="author">
                                <span class="name"><i class="lni-user"></i><a href="{{route('blogs.show',$blog->slug)}}">Posted by {{$blog->author?->name}}</a></span>
                                <span class="date float-right"><i class="lni-calendar"></i><a href="{{route('blogs.show',$blog->slug)}}">{{date('d F, Y',strtotime($blog->created_at))}}</a></span>
                            </div>
                        </div>
                        <!-- Blog Item Wrapper Ends-->
                    </div>
                    <!-- End Col -->
                @endforeach

            </div>
            <!-- End Row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="pricing-pagination" style="margin-top: 30px;text-align: center">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- blog Section End -->


@endsection
