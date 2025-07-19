@extends('template.layout.app')
@section('title',"Certification | Recognition | Learning for IT Professionals")
@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-8">
                <div class="course-content">
                    <h2>{{$batch->course?->title}}</h2>
                    <div class="course-short-description">
                        {!! $batch->course?->short_description !!}
                    </div>

                    <div class="row my-3 text-center course-details-batch-section">
                        <div class="col-3"><strong>Batch Start</strong><br><span>{{$batch->start_time}}</span></div>
                        <div class="col-3"><strong>Batch Name</strong><br><span class="badge bg-info">{{$batch->batch_name}}</span></div>
                        <div class="col-3"><strong>First Class</strong><br>{{$batch->first_class}}</div>
                        <div class="col-3"><strong>Duration</strong><br>{{$batch->duration}}</div>
                    </div>


                    <!-- start summery -->
                    <div class="row my-3 text-center course-details-short-menu">
                        <ul>
                            <li><a href="#date_and_time">Date & Time</a> </li>
                            <li><a href="#course-objective-section">Course Objectives</a> </li>
                            <li><a href="#teacher-section">Course instructor</a> </li>
                            <li><a href="#benefit-section">Benefits</a> </li>
                            <li><a href="#faq-section">FAQ</a> </li>
                        </ul>
                    </div>
                    <!-- end summery -->



                    @php
                        $kk = [
                            ["day"=>"Fri","time"=>"12"],
                            ["day"=>"Sat","time"=>"32"],
                        ];
                        //"[{"day":"Fri","time":"12"},{"day":"Sat","time":"32"}]"
                        //[{"day":"Satharday","date":"12/12/12"},{"day":"Friday","date":"11/12/12"}]

                       $batch_schedule = json_decode($batch->schedule);
                       $scheduleObjectKeys = [];
                       if (!empty($batch_schedule)){
                           $firstScheduleObject = $batch_schedule[0];
                           $scheduleObjectKeys = array_keys((array) $firstScheduleObject);
                       }

                    @endphp

                    @if(!empty($batch_schedule))
                    <div class="course-details-heading" id="date_and_time">Date & Time</div>
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            @if(!empty($scheduleObjectKeys))
                                @foreach($scheduleObjectKeys as $schedule_key)
                                    <th>{{ucwords($schedule_key)}}</th>
                                @endforeach
                            @endif
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($batch_schedule as $b_schedule)
                        <tr>
                            @foreach($scheduleObjectKeys as $schedule_key)
                            <td>{{ $b_schedule->{$schedule_key} }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @endif


                    @if(!is_null($batch->course?->courseContent))
                    <div class="course-details-heading">Our <span class="text-danger">Course Module</span></div>
                    <table class="table table-bordered text-center course-module-table">
                        <tr>
                            <td>Total Week: {{$batch->course?->courseContent?->total_week}}</td>
                            <td>Total Time: {{$batch->course?->courseContent?->total_time}}</td>
                        </tr>
                        <tr>
                            <td>Total Class: {{$batch->course?->courseContent?->total_class}}</td>
                            <td>Total Live Class: {{$batch->course?->courseContent?->total_live_class}}</td>
                        </tr>
                        <tr>
                            <td>Total Quiz: {{$batch->course?->courseContent?->total_quiz}}</td>
                            <td>Total Assignment: {{$batch->course?->courseContent?->total_assignment}}</td>
                        </tr>
                    </table>

                    <!-- Accordion Starts -->
                        @if($batch->course?->courseContent?->contentDetails)
                        <div class="accordion course-details-accordion" id="weekAccordion">

{{--                        <div class="accordion-item">--}}
{{--                            <h2 class="accordion-header" id="headingOne">--}}
{{--                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#week1" aria-expanded="true" aria-controls="week1">--}}
{{--                                    <i class="fas fa-youtube-square fa-2x mb-2"></i> সপ্তাহ ১ : Learning Linux Basics<br/>--}}
{{--                                    <p>--}}
{{--                                        <span><i class="fas fa-chalkboard-teacher fa-2x mb-2"></i>Live Class 2</span>--}}
{{--                                        <span><i class="fas fa-chalkboard-teacher fa-2x mb-2"></i>Quiz 2</span>--}}
{{--                                        <span> <i class="fas fa-chalkboard-teacher fa-2x mb-2"></i>Assignment 3</span>--}}
{{--                                        <span><i class="fas fa-chalkboard-teacher fa-2x mb-2"></i>Time: 3:00:00</span>--}}
{{--                                    </p>--}}
{{--                                </button>--}}

{{--                            </h2>--}}
{{--                            <div id="week1" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#weekAccordion">--}}
{{--                                <div class="accordion-body">--}}
{{--                                    <ul>--}}
{{--                                        <li>লাইভ ক্লাস ১: Introduction to Linux, Working with Shell, Core concepts Linux, Package management - ১:৩০:০০</li>--}}
{{--                                        <li>লাইভ ক্লাস ২: Networking and Linux Security and File Permissions - ১:৩০:০০</li>--}}
{{--                                        <li>কুইজঃ Quiz</li>--}}
{{--                                        <li>লাইভ ক্লাস ৩: Service management with SYSTEMD, Storage management, Client demo</li>--}}
{{--                                        <li>অ্যাসাইনমেন্টঃ Assignment</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


                         @foreach($batch->course?->courseContent?->contentDetails as $k => $content)
                        <!-- Start accordion -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading_{{$k}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#week_{{$k}}" aria-expanded="false" aria-controls="week_{{$k}}">
                                    {!!  $content->icon == "" ? '<i class="fa-brands fa-youtube"></i>' : $content->icon !!}
                                      {{$content->title}}
                                    <p>
                                        @php
                                        $content_subtitle = explode(",",$content->subtitle);
                                        @endphp
                                        @foreach($content_subtitle as $su_title)
                                        <span>{!! $su_title !!}</span>
                                        @endforeach
                                    </p>
                                </button>
                            </h2>
                            <div id="week_{{$k}}" class="accordion-collapse collapse" aria-labelledby="heading_{{$k}}" data-bs-parent="#weekAccordion">
                                <div class="accordion-body">
                                    {!! $content->description !!}

{{--                                    <ul>--}}
{{--                                        <li>লাইভ ক্লাস ১: Introduction to AWS and account setup</li>--}}
{{--                                        <li>লাইভ ক্লাস ২: EC2, S3, IAM, and Hands-on Lab</li>--}}
{{--                                        <li>কুইজঃ Quiz</li>--}}
{{--                                        <li>অ্যাসাইনমেন্টঃ Assignment</li>--}}
{{--                                    </ul>--}}
                                </div>
                            </div>
                        </div>
                        <!-- End Accordion -->
                        @endforeach


                            <!-- Example Week 2 -->
{{--                        <div class="accordion-item">--}}
{{--                            <h2 class="accordion-header" id="headingThree">--}}
{{--                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#week3" aria-expanded="false" aria-controls="week3">--}}
{{--                                    <i class="fas fa-chalkboard-teacher fa-2x mb-2"></i>  সপ্তাহ 3 : Cloud Computing - Amazon Web Services--}}
{{--                                    <p>--}}
{{--                                        <span><i class="fas fa-chalkboard-teacher fa-2x mb-2"></i>Live Class 2</span>--}}
{{--                                        <span><i class="fas fa-chalkboard-teacher fa-2x mb-2"></i>Quiz 2</span>--}}
{{--                                        <span> <i class="fas fa-chalkboard-teacher fa-2x mb-2"></i>Assignment 3</span>--}}
{{--                                        <span><i class="fas fa-chalkboard-teacher fa-2x mb-2"></i>Time: 3:00:00</span>--}}
{{--                                    </p>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="week3" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#weekAccordion">--}}
{{--                                <div class="accordion-body">--}}
{{--                                    <ul>--}}
{{--                                        <li>লাইভ ক্লাস ১: Introduction to AWS and account setup</li>--}}
{{--                                        <li>লাইভ ক্লাস ২: EC2, S3, IAM, and Hands-on Lab</li>--}}
{{--                                        <li>কুইজঃ Quiz</li>--}}
{{--                                        <li>অ্যাসাইনমেন্টঃ Assignment</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- Add more weeks below as needed -->
                    </div>
                        <!-- Accordion Ends -->
                        @endif
                    @endif

                </div>


                <!--start course objection section -->
                <div id="course-objective-section">
                    {!! $batch->course?->objective !!}
                </div>
                <!--end course objection section -->

                <!--start teacher section -->
                <div class="teacher-section-details" id="teacher-section">
                    <h3 class="course-details-heading"> About Teacher</h3>
                    @foreach($batchTeachers as $batchTeacher)
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-3">
                                    @if($batchTeacher->picture != "")
                                        <img src="{{asset('uploads/lms/teachers/'.$batchTeacher->picture)}}" style=" width: 100%;max-height: 200px;" alt="{{$batchTeacher->name}}"/>
                                    @else
                                        <img src="{{asset('uploads/lms/teachers/teacher_1.jpg')}}" style=" width: 100%;max-height: 200px;" alt="{{$batchTeacher->name}}"/>
                                    @endif
                                </div>
                                <div class="col-md-8 col-lg-9 details-info-section">
                                    <h2 class="teacher-title">{{$batchTeacher->name}}</h2>
                                    {!! $batchTeacher->about_details !!}
                                </div>
                            </div>

                            <hr/>
                            <div class="row teacher-short-info">
                                <div class="col-md-3">
                                    <p>0 Learner</p>
                                </div>
                                <div class="col-md-3">
                                    <p>{{$batchTeacher->teacherCourse->count()}} Course</p>
                                </div>
                                <div class="col-md-3">
                                    <p>{{$batchTeacher->teacherCourse->count()}} Batch Running</p>
                                </div>

                                <div class="col-md-3">
                                    <p><a href="{{route('trainer.details',$batchTeacher->id)}}">Read About Teacher</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--end teacher section -->

                <!--start benefit section -->
                <div id="benefit-section" style="margin-top: 50px">
                    {!! $batch->course?->benefits !!}
                </div>
                <!--end benefit section -->


                <!--start benefit section -->
                <div style="margin-top: 50px">
                    {!! $batch->course?->long_description !!}
                </div>
                <!--end benefit section -->

                <!--start faq section -->
                <div id="faq-section"></div>
                <!--end faq section -->

            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4">
                <div class="course-content-sidebar">
                    @if($batch->course?->thumbnail != "")
                        <img src="{{asset('uploads/lms/courses/'.$batch->course?->thumbnail)}}" alt="{{$batch->course?->title}}">
                    @else
                        <img src="https://i.ibb.co/s2zdMp5/devops-thumbnail.png" alt="Course Image">
                    @endif

                    @if($batch->discount != 0)
                         <h5 class="mt-3">৳ {{$batch->fee - $batch->discount}} <del>৳ {{$batch->fee}}</del></h5>
                    @else
                        <h5 class="mt-3">৳ {{$batch->fee}} </h5>
                    @endif

                    @if($batch->advanced != 0)
                        <h6 class="text-heading">Advanced Payment: ৳ {{$batch->advanced}}</h6>
                    @endif

                    @if(auth()->check())
                        <form action="{{route('student.course.purchase')}}" method="post">
                            @csrf
                            @method('post')
                            <input type="hidden" value="{{$batch->course->id}}" name="course_id">
                            <input type="hidden" value="{{$batch->id}}" name="batch_id">
                            <input type="hidden" value="{{$batch->fee}}" name="fee">
                            <input type="hidden" value="{{$batch->discount}}" name="discount">
                            <input type="hidden" value="{{$batch->advanced}}" name="advanced">
                            <button type="submit" class="register-button" style="margin-top: 20px">Enroll Now</button>
                        </form>

                    @else
                          <a href="{{route('login')}}"><button class="register-button" style="margin-top: 20px">Enroll Now</button></a>
                    @endif


                    <hr class="bg-light">
                    <div class="d-flex justify-content-around">
                        <a href="#" class="text-heading"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-heading"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="text-heading"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('script')

@endpush
