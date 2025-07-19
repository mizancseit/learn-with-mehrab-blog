<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="author" content="Grayrids">
    <title>Data Recovery BD | @yield('title')</title>
    <!--====== Favicon Icon ======-->
    {{--    <link rel="shortcut icon" href="img/2.png" type="image/png">--}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('design/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('design/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('design/css/LineIcons.css')}}">
    <link rel="stylesheet" href="{{asset('design/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('design/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('design/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('design/css/nivo-lightbox.css')}}">
    <link rel="stylesheet" href="{{asset('design/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('design/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
</head>
<body>

<!-- Header area start here  -->
@include('frontends.common.single-menu')
<!-- Header area end here  -->

<main>
    @yield('content')
</main>


<!-- Footer area start here  -->
@include('frontends.common.footer')
<!-- Footer area end here  -->



<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="{{asset('design/js/jquery-min.js')}}"></script>
<script src="{{asset('design/js/popper.min.js')}}"></script>
<script src="{{asset('design/js/bootstrap.min.js')}}"></script>
<script src="{{asset('design/js/owl.carousel.js')}}"></script>
<script src="{{asset('design/js/jquery.nav.js')}}"></script>
<script src="{{asset('design/js/scrolling-nav.js')}}"></script>
<script src="{{asset('design/js/jquery.easing.min.js')}}"></script>
<script src="{{asset('design/js/nivo-lightbox.js')}}"></script>
<script src="{{asset('design/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('design/js/form-validator.min.js')}}"></script>
<script src="{{asset('design/js/contact-form-script.js')}}"></script>
<script src="{{asset('design/js/main.js')}}"></script>
</body>
</html>
