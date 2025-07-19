@extends('template.layout.app')
@section('title',"Webinar Details")
@section('content')

    <!-- Top Section with Gradient -->
    <div class="webinar-details-top-section">
        <div class="container">
            <div class="row align-items-start">
                <!-- Left -->
                <div class="col-lg-7 mb-5">
                    <h2 class="fw-bold">{{$webinar->title}}</h2>
                    <p class="text-danger mt-3 fw-semibold">🔴 Live class &nbsp;&nbsp; ⏱️ {{$webinar->duration}}</p>
                    <div class="bg-white p-4 rounded mt-3 shadow-sm">
                        <p class="webinar-short-details">{{$webinar->short_description}}</p>
                        <p>📅 {{date('l, dS F',strtotime($webinar->date))}} &nbsp;&nbsp; ⏰ {{date('h:i A',strtotime($webinar->date))}} &nbsp;&nbsp; 💻 {{$webinar->medium}}</p>
                    </div>
                </div>

                <!-- Right Register Box -->
                <div class="col-lg-5">
                    <div class="webinar-details-register-box">
                        <h5 class="text-center fw-bold">Register completely free.</h5>
                        <p class="text-success text-center mb-3">✅ {{$webinarStudentCount}}+ people have already signed up.</p>

{{--                        <div class="webinar-details-countdown-box mb-3">--}}
{{--                            <div id="days" class="webinar-details-item">00 Days</div>--}}
{{--                            <div id="hours" class="webinar-details-item">00 Hrs</div>--}}
{{--                            <div id="minutes" class="webinar-details-item">00 Min</div>--}}
{{--                            <div id="seconds" class="webinar-details-item">00 Sec</div>--}}
{{--                        </div>--}}

                        <div id="countdown">
                            <div class="webinar-details-count-box">
                                <span class="webinar-details-count-value" id="days">0</span>
                                <span class="webinar-details-count-label">Days</span>
                            </div>
                            <div class="webinar-details-count-box">
                                <span class="webinar-details-count-value" id="hours">0</span>
                                <span class="webinar-details-count-label">Hrs</span>
                            </div>
                            <div class="webinar-details-count-box">
                                <span class="webinar-details-count-value" id="minutes">0</span>
                                <span class="webinar-details-count-label">Min</span>
                            </div>
                            <div class="webinar-details-count-box">
                                <span class="webinar-details-count-value" id="seconds">0</span>
                                <span class="webinar-details-count-label">Sec</span>
                            </div>
                        </div>

                        <img src="{{asset('uploads/lms/webinars/image_1.webp')}}" alt="Speaker" class="img-fluid rounded mb-3">

                        <form action="{{route('webinar.register')}}" method="post">
                            @csrf
                            @method("post")
                            <input type="hidden" name="course_id" value="{{$webinar->course_id}}">
                            <input type="hidden" name="webinar_id" value="{{$webinar->id}}">
                        <input type="text" name="name" class="form-control mb-2" placeholder="Enter Name">
                        <input type="email" name="email" class="form-control mb-2" placeholder="Enter Email">
                        <input type="text" name="mobile" class="form-control mb-3" placeholder="Enter Mobile Number">
                        <button type="submit" class="register-button">Registration Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom White Section -->
    <div class="webinar-details-bg-bottom">
        <div class="container ">
            <div class="webinar-details-list-item">
            {!! $webinar->what_is_learn !!}
            </div>

            <div class="webinar-details-list-item why-need-this-course-section">
                {!! $webinar->why_need_this_course !!}
            </div>

        </div>
    </div>


@endsection

@push('scripts')
    <script>
        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }


        $(document).ready(function onDocumentReady() {
            @if(session()->has('success'))
            toastr.success("{{session()->get('success')}}");
            @endif

            @if(session()->has('error'))
            toastr.error("{{session()->get('error')}}");
            @endif
        });


        const targetDate = new Date("{{ \Carbon\Carbon::parse($webinar->date)->toIso8601String() }}").getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance < 0) {
                document.getElementById("countdown").innerHTML = "Countdown Finished!";
                clearInterval(timer);
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").innerText = days;
            document.getElementById("hours").innerText = hours;
            document.getElementById("minutes").innerText = minutes;
            document.getElementById("seconds").innerText = seconds;
        }

        const timer = setInterval(updateCountdown, 1000);



        // $(document).ready(function onDocumentReady() {
        //     setInterval(function doThisEveryTwoSeconds() {
        //         toastr.success("Hello World!");
        //     }, 2000);   // 2000 is 2 seconds
        // });
    </script>
@endpush
