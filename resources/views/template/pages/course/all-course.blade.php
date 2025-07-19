@extends('template.layout.app')
@section('title',"All Courses")
@section('content')

    <!--start learning path section -->
    <section class="learning-path career-path-section" id="app">
        <div class="container">
            <all-course :categories="{{$course_categories}}" :levels="{{$courseLevels}}" :types="{{$courseTypes}}"></all-course>
        </div>
    </section>
    <!--end learning path section -->

@endsection
