@extends('template.layout.app_for_vue')
@section('title',"Instructor list")
@section('content')

    <!--start trainer section -->
    <section class="webinars py-5  upcoming-webinar-section our-trainer-section">
        <div class="container">
            <h2 class="text-center mb-4 global-text-heading margin-bottom-20">Our Instructors</h2>


            <div class="upcoming-webinar-section-container trainner-section-container">

                <div class="row">
                @foreach($teachers as $teacher)
                    <!--start item -->
                    <div class="col-md-3" style="margin-bottom: 20px">
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

        </div>
    </section>
    <!--end trainer section -->

@endsection
