<!-- Header -->
{{--<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">--}}
{{--    <div class="container">--}}
{{--        <a class="navbar-brand" href="#">--}}
{{--            <img src="{{asset('template/images/eyes_technology_logo.svg')}}" alt="7 Eyes Technology" height="30">--}}
{{--        </a>--}}
{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarNav">--}}
{{--            <ul class="navbar-nav me-auto">--}}
{{--                <li class="nav-item"><a class="nav-link" href="#">All Training</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link" href="#">Job Guarantee</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link" href="#">Webinar</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>--}}
{{--            </ul>--}}
{{--            <a href="#" class="btn btn-danger">Login/Register</a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}


<!-- Sticky Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top" style="z-index: 1030;">
    <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand nav-logo" href="{{route('home')}}">
            <img src="{{asset('template/images/eyes_technology_logo.svg')}}" alt="7 Eyes Technology" height="50">
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar content -->
        <div class="collapse navbar-collapse top-menu-section" id="mainNavbar">

            <!-- Course Category Dropdown -->
            <div class="dropdown me-3 menu-category">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Course Category
                </button>
                <ul class="dropdown-menu">
                    @php
                    $categories = \App\Models\LMS\CourseCategory::where(['is_active'=>1])->get();
                    @endphp
                    @foreach($categories as $category)
                        <li><a class="dropdown-item" href="{{route('fonttier.courseby.category',$category->slug)}}"><i class="fa-solid fa-arrow-right"></i> {{$category->title}}</a></li>
                    @endforeach

{{--                    <li><a class="dropdown-item" href="#"><img src="https://via.placeholder.com/20" alt=""> প্রজেক্ট ম্যানেজমেন্ট</a></li>--}}
{{--                    <li><a class="dropdown-item" href="#"><img src="https://via.placeholder.com/20" alt=""> মার্কেটিং</a></li>--}}
{{--                    <li><a class="dropdown-item" href="#"><img src="https://via.placeholder.com/20" alt=""> এইচএসসি</a></li>--}}
                </ul>
            </div>

            <!-- Search -->
            <form action="{{route('fonttier.search')}}" method="get" class="d-flex me-auto" role="search">
                <input class="form-control me-1" type="search" name="search" placeholder="Search Course" aria-label="Search" value="{{request()->get('search')}}">
                @csrf
                <button class="btn search-btn-outline" type="submit"><i class="fas fa-search"></i></button>
            </form>



            <!-- Menu Links -->
            <ul class="navbar-nav mb-2 mb-lg-0 align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('fonttier.allcourse')}}">All Course</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('fonttier.blog')}}">Blog</a>
{{--                    {{route('fonttier.blog')}}--}}
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('fonttier.contactus')}}">Contact Us</a>
                </li>

                <li class="nav-item">
{{--                    <a class="nav-link" href="#">More</a>--}}
                    <div class="dropdown me-3">
                        <button class="btn btn-light nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            More
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('fonttier.photogallery')}}">Photo Gallery</a></li>
                            <li><a class="dropdown-item" href="{{route('fonttier.freecourse')}}">Free Course</a></li>
                            <li><a class="dropdown-item" href="{{route('fonttier.freeresource')}}">Free Resource</a></li>
                            <li><a class="dropdown-item" href="#">Free Tools</a></li>
{{--                            {{route('fonttier.freetool')}}--}}
                        </ul>
                    </div>
                </li>

                @if(!auth()->check())
                <li class="nav-item">
                    <a class="btn btn-outline-brand btn-sm ms-lg-2 mt-2 mt-lg-0" href="{{route('register')}}">Register</a>
                </li>
                @endif

                @if(auth()->check())
                <li class="nav-item">
                    <a class="btn btn-outline-brand btn-sm ms-lg-2 mt-2 mt-lg-0" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <li class="nav-item">
                        <a class="btn btn-outline-brand btn-sm ms-lg-2 mt-2 mt-lg-0" href="{{route('login')}}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


