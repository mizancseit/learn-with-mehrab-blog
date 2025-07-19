@extends('template.layout.app')
@section('title',"Trainer Details")
@section('content')

    <div class="teacher-profile-header">
        <h3 class="mb-1">{{$teacher->name}}</h3>
        <p class="mb-0">{{$teacher->work_designation}} ({{$teacher->company_name}})</p>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 teacher-profile-card text-center">
                <div class="row align-items-top">
                    <div class="col-md-3">
{{--                        <img src="https://via.placeholder.com/120x120.png?text=Photo" alt="Profile Photo" class="teacher-profile-img">--}}
{{--                        <img src="{{asset('uploads/lms/teachers/teacher_1.jpg')}}"  class="teacher-profile-img" alt=""/>--}}
                        @if($teacher->picture != "")
                             <img src="{{asset('uploads/lms/teachers/'.$teacher->picture)}}" class="teacher-profile-img" alt="{{$teacher->name}}">
                        @else
                            <img src="{{asset('template/images/customer/user_image_1.png')}}" class="teacher-profile-img" alt="{{$teacher->name}}">
                        @endif
                    </div>
                    <div class="col-md-9">


                        <div class="teacher-profile-stats d-flex flex-wrap gap-3 justify-content-left text-center my-4">
                            <div class="teacher-profile-stat-card p-3 rounded bg-white text-center">
                                <div class="teacher-profile-icon-circle bg-primary text-white mb-2">
                                    <i class="fas fa-users"></i>
                                </div>
                                <h6 class="mb-0 fw-bold">লার্নার</h6>
                                <p class="mb-0 text-primary fw-bold">80</p>
                            </div>

                            <div class="teacher-profile-stat-card p-3 rounded bg-white text-center">
                                <div class="teacher-profile-icon-circle bg-success text-white mb-2">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                <h6 class="mb-0 fw-bold">কোর্স</h6>
                                <p class="mb-0 text-success fw-bold">2</p>
                            </div>

                            <div class="teacher-profile-stat-card p-3 rounded bg-white text-center">
                                <div class="teacher-profile-icon-circle bg-warning text-white mb-2">
                                    <i class="fas fa-certificate"></i>
                                </div>
                                <h6 class="mb-0 fw-bold">চলমান ব্যাচ</h6>
                                <p class="mb-0 text-warning fw-bold">0</p>
                            </div>
                        </div>


                        <div class="teacher-profile-social-icons mb-3 d-flex justify-content-left gap-3">
                            <a href="{{$teacher->fb_link}}" class="teacher-profile-social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{$teacher->twitter_link}}" class="teacher-profile-social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="{{$teacher->linkedin_link}}" class="teacher-profile-social-icon"><i class="fab fa-linkedin-in"></i></a>
                        </div>

                        <div class="text-start teacher-profile-description">
                            {!! $teacher->about_details !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
