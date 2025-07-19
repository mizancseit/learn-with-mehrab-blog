@extends('frontends.layouts.master')
@section('title','Mission and Vision')
@section('meta_keyword','Mission and Vision, Data Recovery DB')
@section('meta_description','Mission and Vision, Data Recovery DB')
@section('content')


    <div class="blog-hero-area">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="contents text-center">
                        <h2 class="wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Mission and Vision</h2>
                        <p class="white-text-color">Our Company Mission and Vision.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="business-plan">
        <div class="container">

            <div class="row">
                <div class="col-lg-9 col-md-12 pl-4">
                    <div class="business-item-info">
                        <h3>Mission</h3>
                        <p>At Data Recovery BD, our mission is to empower businesses and individuals across Bangladesh by restoring access to their valuable data and ensuring the smooth operation of their essential IT equipment. Founded in 2014 by Abdur Rahim Sopon, we are dedicated to providing top-quality data recovery and IT services, from retrieving critical information from damaged devices to optimizing and repairing desktops, laptops, and printers. We believe in leveraging cutting-edge technology and expertise to bring reliable, efficient solutions to every client, helping them stay connected, productive, and resilient in a rapidly evolving digital world </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                    <div class="simple-image-position">
                        <img src="{{asset('design/img/business/mission.svg')}}" class="img-fluid margin-top-100" alt="Data Recovery BD Mission">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-9 col-md-12 pl-4">
                    <div class="business-item-info">
                        <h3>Vision</h3>
                        <p>Company Vision
                            Our vision at Data Recovery BD is to be the most trusted and innovative data recovery and IT solutions provider in Bangladesh. We strive to set new standards in the industry by constantly advancing our technology and expanding our expertise. Our goal is to empower businesses and individuals with reliable access to their data and seamless IT support, ensuring they can confidently navigate the digital landscape. Through a commitment to excellence, integrity, and customer satisfaction, we aim to lead the way in fostering a connected and resilient future for our clients and the communities we serve.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                    <div class="simple-image-position">
                        <img src="{{asset('design/img/business/vision.svg')}}" class="img-fluid margin-top-100" alt="Data Recovery BD Vision">
                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection
