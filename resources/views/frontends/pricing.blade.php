@extends('frontends.layouts.master')
@section('title')
Pricing | {{$pricing_category->title}}
@endsection
@section('meta_keyword'){{$pricing_category->title}} @endsection
@section('meta_description') {{$pricing_category->title}} @endsection
@section('content')


    <div class="blog-hero-area">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="contents text-center">
                        <h2 class="wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Pricing</h2>
                        <p class="white-text-color">We charge the low cost of our data recovery.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Our Pricing Plan Section Start -->
    <section id="pricing" class="section">
        <div class="container">

            <!-- Start Row -->
            <div class="row pricing-tables">

                @foreach($pricing as $price)
                    <!--  Start Col -->
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <div class="pricing-table text-center custom-pricing-container">
                            <div class="pricing-details">
                                <h3>{{$price->title}}</h3>
                                <h1><span>৳</span>{{$price->amount}}</h1>
                                {{--                            <ul>--}}
                                {{--                                <li>Free Instalation</li>--}}
                                {{--                            </ul>--}}
                                {!! $price->short_description !!}
                            </div>
                            @if($price->is_view_long_description == 1)
                                <div class="plan-button">
                                    <a href="{{url('pricing-details/'.$price->slug)}}" class="btn btn-common">More Information</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!--  End Col -->
                @endforeach

            </div>
            <!-- End Row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="pricing-pagination" style="margin-top: 30px;text-align: center">
                        {{$pricing->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Pricing Plan Section End -->


@endsection
