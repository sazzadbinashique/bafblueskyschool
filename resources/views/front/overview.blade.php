@extends('front.layout')

@section('title')
<title>Overview &#8211; BAF Blue Sky School</title>
@endsection

@section('content')
<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('frontend/img/header.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Overview</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Overview</li>
                        </ol>
                    </nav>
                </div> <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== ABOUT PART START ======-->
<div style="background: #02CCFE;">

    <section id="about-page" class="pt-70 pb-110">
        <div class="container">
            <div class="row" style="justify-content: space-between; align-items: center;">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h5>Overview</h5>
                        <h2>Welcome to Blue Sky School</h2>
                    </div> <!-- section title -->
                    <div class="about-cont">
                        <p class="text-align">{{$overview->title}}</p>
                    </div>
                </div> <!-- about cont -->

                <div class="col-lg-2"></div>

                <div class="col-lg-5">
                    <div class="about-image-tow mt-55">
                        <img src="uploads/image/{{$overview->image}}" alt="about">
                        <div class="about-shape-tow">
                            <img src="{{asset('frontend/images/about/shape-2.png')}}" alt="shape">
                        </div>
                        <div class="about-shape-three" style="margin-left:-100px;">
                            <img src="{{asset('frontend/images/about/shape-3.png')}}" alt="shape">
                        </div>
                    </div>
                </div>
            </div> <!-- row -->

            <div class="about-items pt-60">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="about-single-items mt-30">
                            <span>01</span>
                            <h4>Our Mission</h4>
                            <p>
                            {!! nl2br($overview->description1) !!}
                            </p>
                        </div> <!-- about single -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="about-single-items mt-30">
                            <span>02</span>
                            <h4>Our Visions</h4>
                            <p>{{$overview->description2}}</p>
                        </div> <!-- about single -->
                    </div>
                </div> <!-- row -->
            </div> <!-- about items -->
        </div> <!-- container -->
    </section>

</div>
<!--====== ABOUT PART ENDS ======-->
@endsection