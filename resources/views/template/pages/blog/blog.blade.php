@extends('template.layout.app_for_vue')
@section('title',"Blog list")
@section('content')

    <!--start upcoming webinar -->
    <section class="webinars py-5 bg-light upcoming-webinar-section">
        <div class="container">

            <h2 class="text-center mb-4 global-text-heading margin-bottom-20">Latest Blogs</h2>

            <div class="upcoming-webinar-section-container upcoming-webinar-carousel blog-post-section">



                <div class="row">
                @foreach($blogs as $webinar)
                    <!--start item -->
                    <div class="col-md-4" style="margin-bottom: 30px">
                        <div class="card h-100 text-center upcoming-webinar-card">
                            <img src="{{asset('uploads/blogs/'.$webinar->thumbnail)}}" alt="{{$webinar->title}}" width="100%">
                            <div class="card-body">
                                {{--                            <h6 class="fw-bold">Md. Azaj Iqbal</h6>--}}
                                <p class="mb-1 blog-title">{{$webinar->title}}</p>

                                <div class="blog-info">
                                    <p class="blog-category text-muted small">
                                        <i class="fa-solid fa-clock"></i> {{date('d F Y',strtotime($webinar->created_at))}}
                                    </p>
                                    <p class="blog-author text-muted small"><i class="fa-solid fa-eye"></i> {{$webinar->category?->title}}</p>
                                </div>
                                <p class="text-muted small mb-3" style="text-align: left">
                                    <i class="fa-solid fa-user"></i> {{$webinar->author?->name}}
                                </p>
                                <a href="{{route('fonttier.blog_details',$webinar->slug)}}" class="btn btn-danger w-100">Details →</a>
                            </div>
                        </div>
                    </div>
                    <!--end item -->
                @endforeach
                </div>


            </div>

        </div>
    </section>
    <!--end upcoming webinar -->

@endsection
