@extends('frontends.layouts.master')
@section('title') {{$page->title}} @endsection
@section('meta_keyword')
    {{$page->meta_keyword}}
@endsection
@section('meta_description')
    {{$page->meta_description}}
@endsection
@section('content')
    <div class="container" style="min-height: 1400px">
        <h1>Static Page</h1>
    </div>
@endsection
