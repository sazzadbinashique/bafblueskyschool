@extends('front.layout')

@section('title')
    <title>BAF Blue Sky School &#8211; Achieving Excellence Together</title>
@endsection

@section('content')
    <!--====== SLIDER PART START ======-->
    @include('front.includes.slider')
    <!--====== SLIDER PART ENDS ======-->

    <div style="background: #02CCFE;">

        <!--====== CATEGORY PART START ======-->
        <section id="category-part">
            <div class="container">
                <div class="category pt-40 pb-80">
                    <div class="row" style="align-items: center;">
                        <div class="col-lg-4">
                            <div class="category-text pt-40">
                                <h2>Best platform to learn everything</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-8 offset-2">
                            <div class="row category-slide mt-40">

                                <div class="col-lg-4">
                                    <a href="{{route('home')}}">
                                        <span class="single-category text-center color-9">
                                            <span class="icon">
                                                <img src="{{asset('frontend/img/graduation-hat-150x150.png')}}" alt="Icon" style="width: 80px; height: auto;">
                                            </span>
                                            <span class="cont">
                                                <span>Programs</span>
                                            </span>
                                        </span>
                                    </a>
                                </div>

                                <div class="col-lg-4">
                                    <a href="{{route('home')}}">
                                        <span class="single-category text-center color-3">
                                            <span class="icon">
                                                <img src="{{asset('frontend/img/education-150x150.png')}}" alt="Icon" style="width: 80px; height: auto;">
                                            </span>
                                            <span class="cont">
                                                <span>Events</span>
                                            </span>
                                        </span> <!-- single category -->
                                    </a>
                                </div>

                                <div class="col-lg-4">
                                    <a href="{{route('admission')}}">
                                        <span class="single-category text-center color-1">
                                            <span class="icon">
                                                <img src="{{asset('frontend/img/knowledge-150x150.png')}}" alt="Icon" style="width: 80px; height: auto;">
                                            </span>
                                            <span class="cont">
                                                <span>Admissions</span>
                                            </span>
                                        </span> <!-- single category -->
                                    </a>
                                </div>

                                <div class="col-lg-4">
                                    <a href="{{route('noticeBoard')}}">
                                        <span class="single-category text-center color-2">
                                            <span class="icon">
                                                <img src="{{asset('frontend/img/diploma-150x150.png')}}" alt="Icon" style="width: 80px; height: auto;">
                                            </span>
                                            <span class="cont">
                                                <span>Notice</span>
                                            </span>
                                        </span> <!-- single category -->
                                    </a>
                                </div>

                                <div class="col-lg-4">
                                    <a href="{{route('home')}}">
                                        <span class="single-category text-center color-8">
                                            <span class="icon">
                                                <img src="{{asset('frontend/img/open-book-150x150.png')}}" alt="Icon" style="width: 80px; height: auto;">
                                            </span>
                                            <span class="cont">
                                                <span>Courses</span>
                                            </span>
                                        </span> <!-- single category -->
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- category -->
            </div> <!-- container -->
        </section>
        <!--====== CATEGORY PART ENDS ======-->

        <!--====== ABOUT PART START ======-->
        <section id="about-part" class="pt-65">
            <div class="container">
                <div class="row" style="align-items: center;">
                    <div class="col-lg-5">
                        <div class="section-title mt-50">
                            <h5>About us</h5>
                            <h2>Welcome to BAF Blue SKY</h2>
                        </div> <!-- section title -->
                        <div class="about-cont">
                            <p class="text-align">{{$overview->title}}</p>
                            <a href="{{route('overview')}}" class="main-btn mt-55">Explore More</a>
                        </div>
                    </div> <!-- about cont -->
                    <div class="col-lg-6 offset-lg-1">                     
                    @if($upcomingEvent !== null && count($upcomingEvent) > 0)
                        <div class="about-event mt-50">
                            <div class="event-title">
                                <h3>Upcoming eventss</h3>
                            </div> <!-- event title -->
                            <ul>

                                @foreach ($upcomingEvent as $upcomingEvent)
                                <li>
                                    <div class="single-event">
                                        <span><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($upcomingEvent->event_publish_dt)->format('d F Y') }}</span>
                                        <a href="#">
                                            <h4>{{$upcomingEvent->event_title}}</h4>
                                        </a>
                                        <span><i class="fa fa-clock-o"></i> {{$upcomingEvent->event_time}}</span>
                                        <span><i class="fa fa-map-marker"></i> {{$upcomingEvent->location}}</span>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div> <!-- about event -->
                        @endif
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="about-bg">
                <img src="images/about/bg-1.png" alt="About">
            </div>
        </section>
        <!--====== ABOUT PART ENDS ======-->

        <!--====== APPLY PART START ======-->
        <section id="apply-aprt" class="pb-120">
            <div class="container">
                <div class="apply">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="apply-cont apply-color-1">
                                <h3>Admission Process</h3>
                                <p>On receipt of application the applicant is assessed by multidisciplinary team formed by therapist, psychologist and special educator. After the assessment procedure is…</p>
                                <a href="{{route('admission')}}" class="main-btn">Read more</a>
                            </div> <!-- apply cont -->
                        </div>
                        <div class="col-lg-6">
                            <div class="apply-cont apply-color-2">
                                <h3>Apply for Admission</h3>
                                <p>On receipt of application the applicant is assessed by multidisciplinary team formed by therapist, psychologist and special educator. After the assessment procedure is…</p>
                                <a href="{{route('admission')}}" class="main-btn">Apply Now</a>
                            </div> <!-- apply cont -->
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </section>
        <!--====== APPLY PART ENDS ======-->

        <!--====== Photo gallery START ======-->

        <section id="course-part" class="pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title pb-45">
                            <h5>Photo Gallery</h5>
                            <h2>Special Education Program</h2>
                        </div> <!-- section title -->
                    </div>
                </div> <!-- row -->
                <div class="row gallery">
                    @foreach ($speduprogram as $eduprogram)
                    <div class="col-md-3 col-xs-6 thumb">
                        <a href="uploads/image/{{$eduprogram->image}}">
                            <figure>
                                <img class="img-fluid img-thumbnail" src="uploads/image/{{$eduprogram->image}}" alt="Gallery Image">
                            </figure>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div> <!-- container -->
        </section>
        <!--====== Photo gallery ENDS ======-->

        <!--====== VIDEO FEATURE PART START ======-->
        <section id="video-feature" class="bg_cover pt-60 pb-110" style="background-image: url({{asset('frontend/img/banner6.jpg')}})">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-last order-lg-first">
                        <div class="video text-lg-left text-center pt-50">
                            <a class="Video-popup" href="https://www.youtube.com/watch?v=KcZef1jUf6c">
                                <i class="fa fa-play"></i>
                            </a>
                        </div> <!-- row -->
                    </div>
                    <div class="col-lg-5 offset-lg-1 order-first order-lg-last">
                        <div class="feature pt-50">
                            <div class="feature-title">
                                <h3>Our Facilities</h3>
                            </div>
                            <ul>
                                
                                @foreach ($ourfacility as $facilit)
                                <li>
                                    <div class="single-feature">
                                        <div class="icon">
                                            <img src="uploads/image/{{$facilit->image}}" alt="icon" style="width: 70px; height: auto;">
                                        </div>
                                        <div class="cont">
                                            <h4>{{$facilit->title}}</h4>
                                            <p>
                                            {!! nl2br($facilit->description) !!}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                        
                            </ul>
                        </div> <!-- feature -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="feature-bg"></div> <!-- feature bg -->
        </section>
        <!--====== VIDEO FEATURE PART ENDS ======-->

        <!--====== NEWS PART START ======-->
        <section id="news-part" class="pt-115 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title pb-50">
                            <h5>Latest News</h5>
                            <h2>From the news</h2>
                        </div> <!-- section title -->
                    </div>
                </div> <!-- row -->
                <div class="row">

                @foreach ($noticeBoard as $notice)
                    <div class="col-md-4 col-xs-6">
                        <div class="single-news mt-30">
                            <div class="news-thum pb-25">
                                <img src="uploads/image/{{$notice->notice_img}}" alt="News" style="height: 225px; width: 100%;">
                            </div>
                            <div class="news-cont">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-calendar"></i>
                                            {{ \Carbon\Carbon::parse($notice->notice_publish_dt)->format('d F Y') }}
                                        </a>
                                    </li>
                                </ul>
                                <a href="blog-single.html">
                                    <h3>{{ $notice->notice_title }}</h3>
                                </a>
                                <p>
                                {{ $notice->notice_description	 }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach   
                    
                </div> <!-- container -->
        </section>
        <!--====== NEWS PART ENDS ======-->

        <!--====== PATNAR LOGO PART START ======-->
        <div id="patnar-logo" class="pt-40 pb-80" style="background: #f9f9f9;
                    background-image: url({{asset('frontend/img/shape.png')}});
                    background-position: center center;
                    background-repeat: no-repeat;
                    background-size: cover;">
            <div class="container">
                <div class="row patnar-slide">
                    <div class="col-lg-12">
                        <div class="single-patnar text-center mt-40">
                            <img src="{{asset('frontend/img/p1.png')}}" alt="Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-patnar text-center mt-40">
                            <img src="{{asset('frontend/img/p2.png')}}" alt="Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-patnar text-center mt-40">
                            <img src="{{asset('frontend/img/p3.png')}}" alt="Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-patnar text-center mt-40">
                            <img src="{{asset('frontend/img/p4.png')}}" alt="Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-patnar text-center mt-40">
                            <img src="{{asset('frontend/img/p5.png')}}" alt="Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-patnar text-center mt-40">
                            <img src="{{asset('frontend/img/p6.png')}}" alt="Logo">
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
        <!--====== PATNAR LOGO PART ENDS ======-->


    </div>
@endsection


@section('third_party_scripts')

@endsection