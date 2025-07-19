@extends('template.layout.master')
@section('title',"Certification | Recognition | Learning for IT Professionals")
@section('content')

    @include('template.includes.hero-section')


    <!-- start Hero Section -->
{{--    <section class="text-center bg-light hero-section">--}}
{{--        <div class="container">--}}
{{--            <h1 class="display-5 fw-bold heading">Training | Certification | Recognition</h1>--}}
{{--            <p class="lead sub-heading">Learning for IT Professionals</p>--}}
{{--            <a href="#" class="btn btn-danger mt-3">Start Your Journey</a>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- end Hero Section -->



    <!-- Services Section -->
    <section class="service-section">
        <div class="container">
            <h2 class="section-title text-center global-text-heading">Our Services</h2>
            <div class="row text-center">
                <div class="col-md-2 col-6 mb-4">
                    <div class="service-box">
                        <i class="fas fa-laptop-code fa-2x mb-2"></i>
                        <p>Online Training</p>
                    </div>
                </div>
                <div class="col-md-2 col-6 mb-4">
                    <div class="service-box">
                        <i class="fas fa-chalkboard-teacher fa-2x mb-2"></i>
                        <p>Offline Training</p>
                    </div>
                </div>
                <div class="col-md-2 col-6 mb-4">
                    <div class="service-box">
                        <i class="fas fa-industry fa-2x mb-2"></i>
                        <p>Industrial Training</p>
                    </div>
                </div>
                <div class="col-md-2 col-6 mb-4">
                    <div class="service-box">
                        <i class="fas fa-briefcase fa-2x mb-2"></i>
                        <p>Job Placement</p>
                    </div>
                </div>
                <div class="col-md-2 col-6 mb-4">
                    <div class="service-box">
                        <i class="fas fa-certificate fa-2x mb-2"></i>
                        <p>Vendor Exam</p>
                    </div>
                </div>
                <div class="col-md-2 col-6 mb-4">
                    <div class="service-box">
                        <i class="fas fa-ticket-alt fa-2x mb-2"></i>
                        <p>Exam Voucher</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Services Section -->

    <!--start vendor section -->
    <section class="vendor-section">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Left: Image -->
                <div class="col-lg-6 mb-lg-0" style="padding: 0">
                    <img src="{{asset('template/images/vendor_bg_img.png')}}" alt="Vendor Image" class="img-fluid shadow-sm w-100 vendor-section-left-image">
                </div>

                <!-- Right: Content -->
                <div class="col-lg-6">
                    <div class="vendor-section-right-side text-white h-100 d-flex flex-column justify-content-center">
                        <h4 class="fw-bold mb-3 title">Train and certify on top technologies from popular vendors.</h4>

                        <div class="mb-4 d-flex flex-wrap gap-2">
                            <a href="#" class="btn btn-warning px-4 fw-semibold">Browse by vendor</a>
                            <a href="#" class="btn btn-light px-4 fw-semibold">Browse by IT paths</a>
                        </div>

                        <div class="mb-3 d-flex flex-wrap gap-3 text-white-50 vendor-section-vendor-name">
                            <span>Amazon Web Services</span>
                            <span>CISCO</span>
                            <span>Linux</span>
                            <span>CompTIA</span>
                            <span>Microsoft</span>
                            <span>VMware</span>
                            <span>CCNA</span>
                            <span>CCNP</span>
                            <span>Network+</span>
                            <span>Security+</span>
                            <span>MCSA</span>
                            <span>MCSE</span>
                        </div>

                        <a href="#" class="text-white text-decoration-none mt-3">
                            See all training →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end vendor section -->


    <!--start learning path section -->
    <section class="learning-path career-path-section" id="app">
        <div class="container">
            <h2 class="text-center fw-bold mb-4 global-text-heading">Choose a Learning Path</h2>
            <learning-path :categories="{{$course_categories}}"></learning-path>
        </div>
    </section>
    <!--end learning path section -->


    <!--start upcoming webinar -->
    <section class="webinars py-5 bg-light upcoming-webinar-section">
        <div class="container">
            <h2 class="text-center mb-4 global-text-heading margin-bottom-20">Upcoming Webinar</h2>


            <div class="owl-carousel owl-theme upcoming-webinar-section-container upcoming-webinar-carousel">

                @foreach($webinars as $webinar)
                <!--start item -->
                <div class="item">
                    <div class="card h-100 text-center upcoming-webinar-card">
                        <img src="{{asset('uploads/lms/webinars/'.$webinar->thumbnail)}}" class="mb-2" alt="Trainer" width="80">
                        <div class="card-body">
{{--                            <h6 class="fw-bold">Md. Azaj Iqbal</h6>--}}
                            <p class="mb-1">{{$webinar->title}}</p>
                            <p class="text-muted small mb-3">
                                <i class="bi bi-calendar3"></i> {{date('d F Y h:i A',strtotime($webinar->date))}}
                            </p>
                            <a href="{{route('webinar.details',$webinar->id)}}" class="btn btn-danger w-100">Details →</a>
                        </div>
                    </div>
                </div>
                <!--end item -->
                @endforeach


            </div>

        </div>
    </section>
    <!--end upcoming webinar -->



    <!--start trainer section -->
    <section class="webinars py-5  upcoming-webinar-section our-trainer-section">
        <div class="container">
            <h2 class="text-center mb-4 global-text-heading margin-bottom-20">Our Trainer</h2>


            <div class="owl-carousel owl-theme  upcoming-webinar-section-container trainner-section-container">

                @foreach($teachers as $teacher)
                <!--start item -->
                <div class="item">
                    <div class="trainer-card h-100">
                        <div class="trainer-img">
                            @if($teacher->picture != "")
                                <a href="{{route('trainer.details',$teacher->id)}}" class="teacher-name"> <img src="{{asset('uploads/lms/teachers/'.$teacher->picture)}}" class="rounded-circle mb-2" alt="{{$teacher->name}}" width="80"></a>
                            @else
                                <a href="{{route('trainer.details',$teacher->id)}}" class="teacher-name"><img src="{{asset('template/images/customer/user_image_1.png')}}" class="rounded-circle mb-2" alt="{{$teacher->name}}" width="80"></a>
                            @endif
                        </div>
                        <h5 class="mt-2 fw-bold"> <a href="{{route('trainer.details',$teacher->id)}}" class="teacher-name">{{$teacher->name}}</a></h5>
                        <small class="text-muted">{{$teacher->work_designation}}</small>
                        <div class="rating my-1">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                        </div>
                        @if($teacher->experts != "")
                        <div class="tags my-2">
                            @php
                                $teacher_data = explode(",",$teacher->experts);
                            @endphp
                            @foreach($teacher_data as $teacher_ex)
                                <span class="tag" style="text-transform: uppercase">{{$teacher_ex}}</span>
                            @endforeach
                        </div>
                        @endif
                        <div class="social-icons mt-2">
                            <a href="{{$teacher->linkedin_link}}"><i class="bi bi-linkedin"></i></a>
                            <a href="{{$teacher->twitter_link}}"><i class="bi bi-youtube"></i></a>
                            <a href="{{$teacher->fb_link}}"><i class="bi bi-facebook"></i></a>
                        </div>
                    </div>
                </div>
                <!--end item -->
                @endforeach

            </div>

        </div>
    </section>
    <!--end trainer section -->


    <!--start achievement section -->
{{--    <div class="bg-light">--}}
{{--    <div class="container py-5">--}}
{{--        <!-- Our Achievement -->--}}
{{--        <h2 class="text-center fw-bold mb-4 global-text-heading">Our Achievement</h2>--}}
{{--        <div class="row text-center g-4">--}}
{{--            <div class="col-6 col-md-3">--}}
{{--                <div class="achievement-box">--}}
{{--                    <div class="achievement-icon"><i class="fa-solid fa-calendar-days"></i></div>--}}
{{--                    <div class="achievement-title">18 Years</div>--}}
{{--                    <div class="achievement-desc">Excellent Training Delivering</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-6 col-md-3">--}}
{{--                <div class="achievement-box">--}}
{{--                    <div class="achievement-icon"><i class="fa-solid fa-users"></i></div>--}}
{{--                    <div class="achievement-title">8,000+</div>--}}
{{--                    <div class="achievement-desc">Happy Students Trained</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-6 col-md-3">--}}
{{--                <div class="achievement-box">--}}
{{--                    <div class="achievement-icon"><i class="fa-solid fa-user-check"></i></div>--}}
{{--                    <div class="achievement-title">300+</div>--}}
{{--                    <div class="achievement-desc">Job Placement</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-6 col-md-3">--}}
{{--                <div class="achievement-box">--}}
{{--                    <div class="achievement-icon"><i class="fa-solid fa-briefcase"></i></div>--}}
{{--                    <div class="achievement-title">100+</div>--}}
{{--                    <div class="achievement-desc">Companies Associated</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    </div>--}}
    <!--end achievement section -->



    <!--start corporate client section -->
{{--    <div class="container py-5">--}}
{{--        <!-- Our Corporate Client -->--}}
{{--        <h2 class="text-center fw-bold my-5 global-text-heading">Our Corporate Client</h2>--}}
{{--        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3">--}}
{{--            <!-- Repeat these blocks for each client logo -->--}}
{{--            @foreach($corporate_clients as $corporate_client)--}}
{{--            <div class="col">--}}
{{--                <div class="clients-logo">--}}
{{--                    <a href="{{$corporate_client->link == '' ? '#' : $corporate_client->link}}"><img src="{{asset('uploads/lms/clients/'.$corporate_client->image)}}" alt="{{$corporate_client->title}}"></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--            <!-- Add more logos here as needed -->--}}
{{--        </div>--}}

{{--    </div>--}}
    <!--end corporate client section -->

@endsection

@push('scripts')
    <script>
        // $('.career-path-category-carousel-container').owlCarousel({
        //     loop:true,
        //     margin:4,
        //     responsiveClass:true,
        //     responsive:{
        //         0:{
        //             items:1,
        //             nav:true
        //         },
        //         600:{
        //             items:3,
        //             nav:false
        //         },
        //         1000:{
        //             items:5,
        //             nav:true,
        //             loop:false
        //         }
        //     }
        // })


        $('.upcoming-webinar-carousel').owlCarousel({
            loop:true,
            margin:20,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:4,
                    nav:true,
                    loop:false
                }
            }
        })

        $('.trainner-section-container').owlCarousel({
            loop:true,
            margin:20,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:4,
                    nav:true,
                    loop:false
                }
            }
        })



    </script>
@endpush
