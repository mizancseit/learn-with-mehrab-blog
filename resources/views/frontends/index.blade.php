@extends('frontends.layouts.app')
@section('title','Home Page')
@section('meta_keyword','hello')
@section('meta_description','hello')
@section('content')

    <!-- Services Section Start -->
{{--    <section id="services" class="section">--}}
{{--        <div class="container">--}}

{{--            <div class="row">--}}
{{--                <!-- Start Col -->--}}
{{--                <div class="col-lg-4 col-md-6 col-xs-12">--}}
{{--                    <div class="services-item text-center">--}}
{{--                        <div class="icon">--}}
{{--                            <i class="lni-cog"></i>--}}
{{--                        </div>--}}
{{--                        <h4>Bootstrap 4</h4>--}}
{{--                        <p>Share processes and data secure lona need to know basis Our team assured your web site is always safe.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- End Col -->--}}
{{--                <!-- Start Col -->--}}
{{--                <div class="col-lg-4 col-md-6 col-xs-12">--}}
{{--                    <div class="services-item text-center">--}}
{{--                        <div class="icon">--}}
{{--                            <i class="lni-brush"></i>--}}
{{--                        </div>--}}
{{--                        <h4>Slick Design</h4>--}}
{{--                        <p>Share processes and data secure lona need to know basis Our team assured your web site is always safe.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- End Col -->--}}
{{--                <!-- Start Col -->--}}
{{--                <div class="col-lg-4 col-md-6 col-xs-12">--}}
{{--                    <div class="services-item text-center">--}}
{{--                        <div class="icon">--}}
{{--                            <i class="lni-heart"></i>--}}
{{--                        </div>--}}
{{--                        <h4>Crafted with Love</h4>--}}
{{--                        <p>Share processes and data secure lona need to know basis Our team assured your web site is always safe.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- End Col -->--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Services Section End -->



    <!-- Business Plan Section Start -->
    <section id="business-plan" style="margin-top: 100px">
        <div class="container">

            <div class="row">
                <!-- Start Col -->
                <div class="col-lg-6 col-md-12 pl-0 pt-70 pr-5">
                    <div class="business-item-img">
                        <img src="{{asset('design/img/business/business-img.png')}}" class="img-fluid" alt="Data Recovery BD">
                    </div>
                </div>
                <!-- End Col -->
                <!-- Start Col -->
                <div class="col-lg-6 col-md-12 pl-4">
                    <div class="business-item-info">
                        <h3>Who We Are</h3>
                        <p>As data recovery experts, we understand how important your data is? With more than 10 years of experience in the Data recovery field, we ensure that we can do a great service for you. Last year we recover thousands of client data in Bangladesh and throughout the world. We provide these services with a 99% success rate. We believe in hardworking and customer satisfaction.
                            Our success story makes us the No.1 Data recovery Company in Bangladesh. We have no hidden charge, we are always clear on our pricing policy.</p>
                        <a class="btn btn-common" href="{{url('about-us')}}">More</a>
                    </div>
                </div>
                <!-- End Col -->
            </div>

        </div>
    </section>
    <!-- Business Plan Section End -->



    <!-- Cool Fetatures Section Start -->
    <section id="features" class="section">
        <div class="container">
            <!-- Start Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="features-text section-header text-center">
                        <div>
                            <h2 class="section-title">Services We Provide</h2>
                            <div class="desc-text">
                                <p>We provide data recovery related to all services. <br/> our service is best in Bangladesh.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Row -->
            <!-- Start Row -->
            <div class="row featured-bg">
                <!-- Start Col -->
                <div class="col-lg-6 col-md-6 col-xs-12 p-0">
                    <!-- Start Fetatures -->
                    <div class="feature-item featured-border1">
                        <div class="feature-icon float-left">
                            <i class="lni-layers"></i>
                        </div>
                        <div class="feature-info float-left">
                            <h4>Hard disk data  recovery</h4>
                            <p>We recover data from various hard disk issues,<br> including: - Logical failures, Physical PCB burns,<br> Bad sectors,   Damaged heads,Firmware corruption.</p>
{{--                            <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>--}}
                        </div>
                    </div>
                    <!-- End Fetatures -->
                </div>
                <!-- End Col -->

                <!-- Start Col -->
                <div class="col-lg-6 col-md-6 col-xs-12 p-0">
                    <!-- Start Fetatures -->
                    <div class="feature-item featured-border2">
                        <div class="feature-icon float-left">
                            <i class="lni-layers"></i>
                        </div>
                        <div class="feature-info float-left">
                            <h4>SSD data recovery </h4>
                            <p>Our SSD recovery service handles both hardware <br> and software issues, retrieving your data from<br> failed or damaged SSDs.</p>
{{--                            <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>--}}
                        </div>
                    </div>
                    <!-- End Fetatures -->
                </div>
                <!-- End Col -->

                <!-- Start Col -->
                <div class="col-lg-6 col-md-6 col-xs-12 p-0">
                    <!-- Start Fetatures -->
                    <div class="feature-item featured-border1">
                        <div class="feature-icon float-left">
                            <i class="lni-layers"></i>
                        </div>
                        <div class="feature-info float-left">
                            <h4>Pen Drive data recovery</h4>
                            <p>Using advanced technology, we can recover data<br>  from logical issues and perform chip-off<br> recovery when needed.</p>
{{--                            <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>--}}
                        </div>
                    </div>
                    <!-- End Fetatures -->
                </div>
                <!-- End Col -->

                <!-- Start Col -->
                <div class="col-lg-6 col-md-6 col-xs-12 p-0">
                    <!-- Start Fetatures -->
                    <div class="feature-item featured-border2">
                        <div class="feature-icon float-left">
                            <i class="lni-layers"></i>
                        </div>
                        <div class="feature-info float-left">
                            <h4>Memory card data recovery </h4>
                            <p>Whether it’s logical damage or chip-level issues,<br> our team can recover your data from various types<br> of memory cards.</p>
{{--                            <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>--}}
                        </div>
                    </div>
                    <!-- End Fetatures -->
                </div>
                <!-- End Col -->

                <!-- Start Col -->
                <div class="col-lg-6 col-md-6 col-xs-12 p-0">
                    <!-- Start Fetatures -->
                    <div class="feature-item featured-border3">
                        <div class="feature-icon float-left">
                            <i class="lni-layers"></i>
                        </div>
                        <div class="feature-info float-left">
                            <h4>CCTV footage recovery</h4>
                            <p>We specialize in recovering lost or deleted<br> CCTV footage, ensuring you get back<br> your important video data.</p>
{{--                            <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>--}}
                        </div>
                    </div>
                    <!-- End Fetatures -->
                </div>
                <!-- End Col -->

                <!-- Start Col -->
                <div class="col-lg-6 col-md-6 col-xs-12 p-0">
                    <!-- Start Fetatures -->
                    <div class="feature-item">
                        <div class="feature-icon float-left">
                            <i class="lni-layers"></i>
                        </div>
                        <div class="feature-info float-left">
                            <h4>Ransomware data recovery</h4>
                            <p>Our team can help decrypt and recover data <br>from ransomware attacks, giving you access <br>to critical files once again.</p>
{{--                            <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>--}}
                        </div>
                    </div>
                    <!-- End Fetatures -->
                </div>
                <!-- End Col -->




                <!-- Start Col -->
                <div class="col-lg-6 col-md-6 col-xs-12 p-0">
                    <!-- Start Fetatures -->
                    <div class="feature-item featured-border1">
                        <div class="feature-icon float-left">
                            <i class="lni-layers"></i>
                        </div>
                        <div class="feature-info float-left">
                            <h4>Bitlocker data recovery</h4>
                            <p>Lost access to your BitLocker-encrypted files?<br> We can help retrieve your data from<br> BitLocker-protected drives.</p>
{{--                            <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>--}}
                        </div>
                    </div>
                    <!-- End Fetatures -->
                </div>
                <!-- End Col -->

                <!-- Start Col -->
                <div class="col-lg-6 col-md-6 col-xs-12 p-0">
                    <!-- Start Fetatures -->
                    <div class="feature-item featured-border2">
                        <div class="feature-icon float-left">
                            <i class="lni-layers"></i>
                        </div>
                        <div class="feature-info float-left">
                            <h4>Phone data recovery </h4>
                            <p>Our experts recover data from dead or locked<br> phones using chip-off technology for a wide<br> range of smartphone models.</p>
{{--                            <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>--}}
                        </div>
                    </div>
                    <!-- End Fetatures -->
                </div>
                <!-- End Col -->

                <!-- Start Col -->
                <div class="col-lg-6 col-md-6 col-xs-12 p-0">
                    <!-- Start Fetatures -->
                    <div class="feature-item featured-border1">
                        <div class="feature-icon float-left">
                            <i class="lni-layers"></i>
                        </div>
                        <div class="feature-info float-left">
                            <h4>Hard disk repair</h4>
                            <p>Beyond data recovery, we offer hard disk<br> repair services to address hardware failures, <br>restoring the drive’s functionality.</p>
{{--                            <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>--}}
                        </div>
                    </div>
                    <!-- End Fetatures -->
                </div>
                <!-- End Col -->

                <!-- Start Col -->
                <div class="col-lg-6 col-md-6 col-xs-12 p-0">
                    <!-- Start Fetatures -->
                    <div class="feature-item featured-border2">
                        <div class="feature-icon float-left">
                            <i class="lni-layers"></i>
                        </div>
                        <div class="feature-info float-left">
                            <h4>SSD repair </h4>
                            <p>We provide SSD repair services to address<br> firmware, PCB, and physical issues in SSDs.</p>
{{--                            <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>--}}
                        </div>
                    </div>
                    <!-- End Fetatures -->
                </div>
                <!-- End Col -->



                <!-- Start Col -->
                <div class="col-lg-6 col-md-6 col-xs-12 p-0">
                    <!-- Start Fetatures -->
                    <div class="feature-item featured-border2">
                        <div class="feature-icon float-left">
                            <i class="lni-layers"></i>
                        </div>
                        <div class="feature-info float-left">
                            <h4>Server hdd data recovery </h4>
                            <p>Our team is experienced in handling complex <br> server hard drive recoveries, whether it’s RAID<br>  configuration issues or physical failures.</p>
{{--                            <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>--}}
                        </div>
                    </div>
                    <!-- End Fetatures -->
                </div>
                <!-- End Col -->


                <!-- Start Col -->
                <div class="col-lg-6 col-md-6 col-xs-12 p-0">
                    <!-- Start Fetatures -->
                    <div class="feature-item featured-border2">
                        <div class="feature-icon float-left">
                            <i class="lni-database"></i>
                        </div>
                        <div class="feature-info float-left">
                            <h4>Tape cassettes recovery </h4>
                            <p>We also offer data recovery services for tape <br>cassettes, extracting and restoring archived<br> data from old media formats.</p>
{{--                            <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>--}}
                        </div>
                    </div>
                    <!-- End Fetatures -->
                </div>
                <!-- End Col -->


            </div>
            <!-- End Row -->
        </div>
    </section>
    <!-- Cool Fetatures Section End -->


    <!-- Recent Showcase Section Start -->
    <section id="showcase">
        <div class="container-fluid right-position">
            <!-- Start Row -->
            <div class="row gradient-bg">
                <div class="col-lg-12">
                    <div class="showcase-text section-header text-center">
                        <div>
                            <h2 class="section-title">Recent Works</h2>
                            <div class="desc-text">
                                <p>Recently have completed some data recovery projects.</p>
                                <p>If you have any data recovery-related issues please contact us.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Row -->
            <!-- Start Row -->
            <div class="row justify-content-center showcase-area">
                <div class="col-lg-12 col-md-12 col-xs-12 pr-0">
                    <div class="showcase-slider-custom owl-carousel" id="showcase-slider">


                        <div class="item">
                            <div class="screenshot-thumb">
                                <img src="{{asset('uploads/recent-work/image_1.jpg')}}" class="img-fluid recent-work-img" alt="" />
                                <div class="hover-content text-center">
                                    <div class="fancy-table">
                                        <div class="table-cell">
                                            <div class="single-text">
                                                <p>HDD, SSD Recovery</p>
                                                <h5>Data Recovery BD</h5>
                                            </div>
                                            <div class="zoom-icon">
                                                <a class="lightbox" href="{{asset('uploads/recent-work/image_1.jpg')}}"><i class="lni-zoom-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="item">
                            <div class="screenshot-thumb">
                                <img src="{{asset('uploads/recent-work/image_2.jpg')}}" class="img-fluid recent-work-img" alt="" />
                                <div class="hover-content text-center">
                                    <div class="fancy-table">
                                        <div class="table-cell">
                                            <div class="single-text">
                                                <p>HDD, SSD Recovery</p>
                                                <h5>Data Recovery BD</h5>
                                            </div>
                                            <div class="zoom-icon">
                                                <a class="lightbox" href="{{asset('uploads/recent-work/image_2.jpg')}}"><i class="lni-zoom-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="item">
                            <div class="screenshot-thumb">
                                <img src="{{asset('uploads/recent-work/image_3.jpg')}}" class="img-fluid recent-work-img" alt="" />
                                <div class="hover-content text-center">
                                    <div class="fancy-table">
                                        <div class="table-cell">
                                            <div class="single-text">
                                                <p>HDD, SSD Recovery</p>
                                                <h5>Data Recovery BD</h5>
                                            </div>
                                            <div class="zoom-icon">
                                                <a class="lightbox" href="{{asset('uploads/recent-work/image_3.jpg')}}"><i class="lni-zoom-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="item">
                            <div class="screenshot-thumb">
                                <img src="{{asset('uploads/recent-work/image_4.jpg')}}" class="img-fluid recent-work-img" alt="" />
                                <div class="hover-content text-center">
                                    <div class="fancy-table">
                                        <div class="table-cell">
                                            <div class="single-text">
                                                <p>HDD, SSD Recovery</p>
                                                <h5>Data Recovery BD</h5>
                                            </div>
                                            <div class="zoom-icon">
                                                <a class="lightbox" href="{{asset('uploads/recent-work/image_4.jpg')}}"><i class="lni-zoom-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="item">
                            <div class="screenshot-thumb">
                                <img src="{{asset('uploads/recent-work/image_5.jpg')}}" class="img-fluid recent-work-img" alt="" />
                                <div class="hover-content text-center">
                                    <div class="fancy-table">
                                        <div class="table-cell">
                                            <div class="single-text">
                                                <p>HDD, SSD Recovery</p>
                                                <h5>Data Recovery BD</h5>
                                            </div>
                                            <div class="zoom-icon">
                                                <a class="lightbox" href="{{asset('uploads/recent-work/image_5.jpg')}}"><i class="lni-zoom-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="screenshot-thumb">
                                <img src="{{asset('uploads/recent-work/image_6.jpg')}}" class="img-fluid recent-work-img" alt="" />
                                <div class="hover-content text-center">
                                    <div class="fancy-table">
                                        <div class="table-cell">
                                            <div class="single-text">
                                                <p>HDD, SSD Recovery</p>
                                                <h5>Data Recovery BD</h5>
                                            </div>
                                            <div class="zoom-icon">
                                                <a class="lightbox" href="{{asset('uploads/recent-work/image_6.jpg')}}"><i class="lni-zoom-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </section>
    <!-- Recent Showcase Section End -->



    <!-- Our Pricing Plan Section Start -->
    <section id="pricing" class="section pricing-section-margin-top">
        <div class="container">
            <!-- Start Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="pricing-text section-header text-center">
                        <div>
                            <h2 class="section-title">Pricing Plans</h2>
                            <div class="desc-text">
                                <p>We charge the low cost of our data recovery.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Row -->


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
        </div>
    </section>
    <!-- Our Pricing Plan Section End -->


    <!-- Client Testimoninals Section Start -->
    <section id="testimonial" class="section">
        <div class="container right-position">
            <!-- Start Row -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="video-promo-content text-center">

                        <a id="play-video" class="video-play-button video-popup" href="https://www.youtube.com/watch?v=f41OYRmYyzU">
                            <span></span>
                        </a>

                    </div>
                </div>
            </div>
            <!-- End Row -->

            <!-- Start Row -->
            <div class="row justify-content-center testimonial-area">
                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 pr-20 pl-20" style="overflow: hidden;padding-bottom: 60px">
                    <div id="client-testimonial" class="text-center owl-carousel">

                        @foreach($testimonials as $testimonial)
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="content-inner">
                                    <p class="description">{{$testimonial->comments}}</p>
                                    <div class="author-info">
                                        <h5>{{$testimonial->customer_name}} ; <span> {{$testimonial->designation}}</span></h5>
                                    </div>
                                </div>
                                <div class="client-thumb">
                                    @if($testimonial->image == "")
                                        <img src="{{asset('uploads/testimonials/user_no_image.jpg')}}" alt="{{$testimonial->customer_name}}" height="90">
                                    @else
                                        <img src="{{asset('uploads/testimonials/'.$testimonial->image)}}" alt="{{$testimonial->customer_name}}" height="90">
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </section>
    <!-- Client Testimoninals Section End -->


    <!-- Team section Start -->
    <section id="team" class="section">
        <div class="container">
            <!-- Start Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-text section-header text-center">
                        <div>
                            <h2 class="section-title">Team Members</h2>
                            <div class="desc-text">
                                <p>Our expert team members</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Start Row -->
            <div class="owl-carousel owl-theme" id="team_slider">
                @foreach($teams as $team)
                <div class="item" style="width: 250px !important;margin-bottom: 50px !important;">
                    <div class="single-team">
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



    <!-- Blog Section -->
    <section id="blog" class="section">
        <!-- Container Starts -->
        <div class="container">

            <!-- Start Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-text section-header text-center">
                        <div>
                            <h2 class="section-title">Latest Blog Posts</h2>
                            <div class="desc-text">
                                <p>Data recovery Related latest blog post here</p>
                                <p>if you know about data recovery-related information please read our blog</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Start Row -->
            <div class="row">

                @foreach($blogs as $blog)
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
                            <h3 class="hide-text-after-2-line"><a href="{{route('blogs.show',$blog->id)}}">{{$blog->title}}</a></h3>
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
        </div>
    </section>
    <!-- blog Section End -->

    <!-- Contact Us Section -->
    <section id="contact" class="section">
        <!-- Container Starts -->
        <div class="container">
            <!-- Start Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-text section-header text-center">
                        <div>
                            <h2 class="section-title">Get In Touch</h2>
                            <div class="desc-text">
                                <p>Contact us if you have any questions</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Row -->
            <!-- Start Row -->
            <div class="row">
                <!-- Start Col -->
                <div class="col-lg-6 col-md-12">
                    <form action="{{route('send.message')}}" method="post">
                        @csrf
                        @method('post')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Subject" id="msg_subject" class="form-control" name="subject" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="message"  name="message" placeholder="Write Message" rows="4" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="submit-button">
                                    <button class="btn btn-common" id="submit" type="submit">Submit</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Col -->
                <!-- Start Col -->
                <div class="col-lg-1">

                </div>
                <!-- End Col -->
                <!-- Start Col -->
                <div class="col-lg-4 col-md-12">
                    <div class="contact-img">
                        <img src="{{asset('design/img/contact/01.png')}}" class="img-fluid" alt="">
                    </div>
                </div>
                <!-- End Col -->
                <!-- Start Col -->
                <div class="col-lg-1">
                </div>
                <!-- End Col -->

            </div>
            <!-- End Row -->
        </div>
    </section>
    <!-- Contact Us Section End -->


    <script>
        $('#team_slider').owlCarousel({
            loop:true,
            margin:30,
            padding:50,
            autoPlay: 3000,
            items : 4,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        })


        $('#showcase-slider').owlCarousel({
            loop:true,
            margin:30,
            padding:50,
            autoPlay: 3000,
            items : 4,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:4
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
@endsection


