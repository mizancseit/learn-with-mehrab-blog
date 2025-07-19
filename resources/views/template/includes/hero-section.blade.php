<!-- Topbar Section -->
{{--<div class="topbar">--}}
{{--    <div class="container">--}}
{{--        <div class="row text-center text-md-start align-items-center">--}}
{{--            <div class="col-md-4 col-12 mb-2 mb-md-0 text-center text-md-start">--}}
{{--                <div class="logo">--}}
{{--                    <img src="{{asset('template/images/eyes_technology_logo.svg')}}" alt="CSL Logo">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-4 col-6">--}}
{{--                <div><i class="fa-solid fa-mobile-screen-button"></i> +880 1613 275 278 (Vendor Exam)</div>--}}
{{--                <div><i class="fa-solid fa-mobile-screen-button"></i> +880 1613 275 275 (Lalmatia)</div>--}}
{{--            </div>--}}
{{--            <div class="col-md-4 col-6">--}}
{{--                <div> <i class="fa-solid fa-mobile-screen-button"></i> +880 1613 275 276 (Kuril LAB)</div>--}}
{{--                <div><i class="fa-solid fa-mobile-screen-button"></i> +880 1613 275 277 (Online Training)</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}




<div class="homepage-top-header-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 txt-align-right">
                <p><i class="fa-solid fa-mobile-screen-button"></i> +880 1765-300368</p>
                <div class="social-icon-container">
                    <ul>
                        <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Banner Section with Responsive Menu -->
<div class="banner">
    <div class="custom-toggler d-lg-none">
{{--        <a class="navbar-brand" href="#">Navbar</a>--}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuContent">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <nav class="navbar navbar-expand-lg hero-section-navbar">
        <div class="container justify-content-center">
            <div class="collapse navbar-collapse justify-content-center" id="menuContent">
                <img src="{{asset('template/images/eyes_technology_logo.svg')}}" class="home-page-logo" alt="CSL Logo">
                <ul class="navbar-nav mb-2 mb-lg-0 text-center">
                    <li class="nav-item"><a class="nav-link" href="{{route('fonttier.allcourse')}}">ALL Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('fonttier.about')}}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('fonttier.instructors')}}">Instructors</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Upcoming Batches</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Vendor Exam</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('fonttier.blog')}}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('fonttier.contactus')}}">Contact</a></li>
                </ul>
                <form action="{{route('fonttier.search')}}" method="get">
                <div class="search-bar ms-lg-3">
                    <input type="text" name="search" class="form-control" placeholder="search">
                        @csrf
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                </form>
            </div>
        </div>
    </nav>
</div>

