@extends('frontends.layouts.master')
@section('title','Team Members')
@section('meta_keyword','Team Members')
@section('meta_description','Company Team Members')
@section('content')


    <div class="blog-hero-area">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="contents text-center">
                        <h2 class="wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Team Members</h2>
                        <p class="white-text-color">Our expert team members</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Team section Start -->
    <section id="team" class="section">
        <div class="container">
            <!-- Start Row -->
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="team-text section-header text-center">--}}
{{--                        <div>--}}
{{--                            <h2 class="section-title">Team Members</h2>--}}
{{--                            <div class="desc-text">--}}
{{--                                <p>Our expert team members</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
            <!-- End Row -->

            <!-- Start Row -->
            <div class="row" id="team_slider">
                @foreach($teams as $team)
                    <div class="col-md-3 col-sm-4">
                        <div class="single-team team-member-margin-bottom">
                            <div class="team-thumb">
                                <img src="{{asset('uploads/teams/'.$team->image)}}" class="img-fluid" alt="{{$team->name}}">
                            </div>

                            <div class="team-details">
                                <div class="team-social-icons">
                                    <ul class="social-list">
                                        <li><a href="{{$team->fb_link}}"><i class="lni-facebook-filled"></i></a></li>
                                        <li><a href="{{$team->twiter_link}}"><i class="lni-twitter-filled"></i></a></li>
                                        <li><a href="{{$team->linkedin_link}}"><i class="lni-google-plus"></i></a></li>
                                    </ul>
                                </div>
                                <div class="team-inner text-center">
                                    <h5 class="team-title">{{$team->name}}</h5>
                                    <p>{{$team->designation}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>



            <!-- End Row -->
        </div>
    </section>
    <!-- Team section End -->


@endsection
