@extends('frontends.layouts.master')
@section('title','Company Profile')
@section('meta_keyword','Data Recovery BD, Company Profile')
@section('meta_description','Data Recovery BD, Company Profile')
@section('content')


    <div class="blog-hero-area">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="contents text-center">
                        <h2 class="wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Company Profile</h2>
                        <p class="white-text-color">Our Company Profile.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <section id="business-plan">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-12 pl-4">
                    <div class="business-item-info">
                        <h3>About Our Company</h3>
                        <p>Company profile for Data Recovery BD:
                            Data Recovery BD was founded in 2014 by Abdur Rahim Sopon, and has since established itself as a leading IT service provider in Bangladesh. With a focus on providing top-notch data recovery services, as well as desktop PC, laptop, printer, and other IT products service, Data Recovery BD is dedicated to helping businesses and individuals stay connected and productive.</p>
                        <p>With years of experience in the industry, our team of expert technicians are equipped with the latest tools and technologies to tackle any IT issue. Whether it’s data recovery from a crashed hard drive, fixing a slow laptop, or repairing a malfunctioning printer, we’ve got you covered.</p>
                        <p>At Data Recovery BD, we believe in building long-lasting relationships with our clients, and that’s why we always go above and beyond to ensure complete satisfaction. Our commitment to providing high-quality service at affordable prices has earned us a reputation as one of the best IT service providers in Bangladesh.</p>
                        <p>So if you’re looking for reliable and professional IT services, look no further than Data Recovery BD. Contact us today to experience the difference.</p>
                    </div>
                </div>

                <!-- Start Col -->
                <div class="col-lg-4 col-md-12 pl-0 pt-70 pr-5">
                    <div class="business-item-img">
                        <img src="{{asset('design/img/business/noetbook.svg')}}" class="img-fluid image-vertical-align" alt="Data Recovery BD">
                    </div>
                </div>
                <!-- End Col -->
                <!-- Start Col -->
                <!-- End Col -->
            </div>

        </div>
    </section>


@endsection
