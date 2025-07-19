<!-- Header Section Start -->
<div class="static-header"></div>
<header id="home" class="header-style-2">

    <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
        <div class="container">
            <a href="{{route('home')}}" class="navbar-brand"><img src="{{asset('Data-Recovery-Logo-BD.png')}}" alt="Logo" style="max-height: 54px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="lni-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto w-100 justify-content-end main-menu">

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link page-scroll" href="#home">Home</a>--}}
{{--                    </li>--}}

                    @php
                        $menus = \App\Models\Menu::with('dropdown')->where(['is_active'=>1,'is_main_menu'=>1])->orderBy('sort_by','asc')->paginate(10);
                    @endphp

                    @foreach($menus as $menu)
                         <li class="nav-item">
                             @if(!is_null($menu->dropdown) && count($menu->dropdown) > 0)
                                     <a class="nav-link page-scroll" href="#">{{$menu->title}} <i class="fas fa-angle-down"></i></a>
                                     <ul>
                                         @foreach($menu->dropdown as $dropdown)
                                             <li><a href="{{url($dropdown->slug)}}">{{$dropdown->title}}</a> </li>
                                         @endforeach
                                     </ul>
                             @else

                                 @if($menu->slug =='pricing')
                                     @php
                                         $pricingCategories = \App\Models\PricingCategory::where(['is_active'=>1])->orderBy('id','asc')->get(['id','title','slug']);
                                     @endphp
                                     <a class="nav-link page-scroll" href="#">{{$menu->title}}  <i class="fas fa-angle-down"></i></a>
                                     <ul>
                                         @foreach($pricingCategories as $pricing_category)
                                             <li><a href="{{url('pricing/'.$pricing_category->slug)}}">{{$pricing_category->title}}</a> </li>
                                         @endforeach
                                     </ul>
                                 @else
                                     <a class="nav-link page-scroll" href="{{url($menu->slug)}}">{{$menu->title}}</a>
                                 @endif

                             @endif
                         </li>
                    @endforeach


{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link page-scroll" href="#services">About</a>--}}
{{--                        <ul>--}}
{{--                            <li><a href="">Sub Menu 1</a> </li>--}}
{{--                            <li><a href="">Sub Menu 1</a> </li>--}}
{{--                            <li><a href="">Sub Menu 1</a> </li>--}}
{{--                            <li><a href="">Sub Menu 1</a> </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link page-scroll" href="#features">Services</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link page-scroll" href="#showcase">Showcase</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link page-scroll" href="#pricing">Pricing</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link page-scroll" href="#team">Team</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link page-scroll" href="#blog">Blog</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link page-scroll" href="#contact">Contact</a>--}}
{{--                    </li>--}}


                    <li class="nav-item">
                        <a class="btn btn-singin" href="#">Make Payment</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Header Section End -->


{{--Bitlocker data recovery--}}
{{--Phone data recovery--}}
{{--Hard disk repair--}}
{{--SSD repair--}}
{{--Server hdd data recovery--}}
{{--Tape cassettes recovery--}}
