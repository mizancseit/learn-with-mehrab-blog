@extends('frontends.layouts.master')
@section('title','Contact with Data Recovery BD')
@section('meta_keyword','Contact with Data Recovery BD')
@section('meta_description','Data Recovery BD')
@section('content')


    <div class="blog-hero-area">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="contents text-center">
                        <h2 class="wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Contact Us</h2>
                        <p class="white-text-color">Contact with our company.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


{{--    <section id="business-plan">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-8 col-md-12 pl-4">--}}
{{--                    <div class="business-item-info">--}}
{{--                        <h3>Contact Us</h3>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}




{{--        </div>--}}
{{--    </section>--}}



    <div class="container contact-us-page">

        <section class="contact-us-card-section">
            <div class="row">

                <div class="col-md-4">
                    <div class="contact-us-card">
                        <i class="d-icon-home"></i>
                        <h4>Need to Pay a Bill? Have a Billing Question?</h4>
                        <p>Phone :   01912-881685</p>
                        <p>Telephone:  0241060319</p>
                        <div class="plan-button margin-top-10">
                            <a href="#" class="btn btn-common">Call Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-us-card">
                        <i class="d-icon-home"></i>
                        <h4>Contact our World-Class 24/7 Support</h4>
                        <p>Phone :   01912-881685</p>
                        <p>Telephone:  0241060319</p>
                        <div class="plan-button margin-top-10">
                            <a href="#" class="btn btn-common">Call Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-us-card">
                        <i class="d-icon-home"></i>
                        <h4>Office Address</h4>
                        <p>
                            Data Recovery BD
                            shop no #-870, Multiplan Center, New Elephant Rd, Dhaka 1205. <br/> <b>Mob: 01912-881685, Tel: 0241060319.</b>
                        </p>
                    </div>
                </div>

            </div>
        </section>

    </div>



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
                    <form action="{{route('send.contact-us.message')}}" method="post">
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


    <section>
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="contact-text section-header text-center">--}}
{{--                        <div>--}}
{{--                            <h2 class="section-title">Our Location</h2>--}}
{{--                            <div class="desc-text">--}}
{{--                                <p>Find Us using Google Map</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.239861305424!2d90.38289897424205!3d23.738824478678318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b91d6dfaaa1d%3A0x6fa96b76df7c43db!2sData%20Recovery%20BD!5e0!3m2!1sen!2sbd!4v1730270750926!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </section>


@endsection
