<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CSL Training - Certification | Recognition | Learning for IT Professionals">
    <meta name="keywords" content="Online Training, IT Training, Certification, Job Placement">
    <meta name="author" content="CSL Web Team">
    <title>7 Eyes Technology | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cascadia+Code:ital,wght@0,200..700;1,200..700&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <link href="{{asset('template/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/owl.theme.default.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/design.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/responsive.css')}}" rel="stylesheet">
    @vite('resources/js/app.js')
</head>

<body>
{{--@include('template.includes.header')--}}
<div>
    @yield('content')
</div>
@include('template.includes.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{asset('template/js/owl.carousel.js')}}"></script>
@stack('scripts')
</body>

</html>
