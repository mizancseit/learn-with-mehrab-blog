@extends('template.layout.app_for_vue')
@section('title',"Course By Category")
@section('content')

    <!--start learning path section -->
    <section class="learning-path career-path-section" style="padding-top: 30px; !important;">
        <div class="container">
            <search :categories="{{$course_categories}}" :levels="{{$courseLevels}}" :types="{{$courseTypes}}" :data="`{{$search}}`"></search>
        </div>
    </section>
    <!--end learning path section -->

@endsection
