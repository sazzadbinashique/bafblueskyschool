@extends('front.layout')

@section('title')
<title>Future Plan &#8211; BAF Blue Sky School</title>
@endsection

@section('content')
<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('frontend/img/header.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Future Plan</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Future Plan</li>
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

    <section id="about-page" class="pt-50 pb-110">
        <div class="container">

            <div class="row" >
                <div class="col-lg-6 page-content">
                    <div class="section-title mt-50">
                        <h5>Blue Sky School</h5>
                        <h2>Future Plan</h2>
                    </div>
                    <div class="about-cont">
                        <p>{{$futurePlan->title}}</p>
                    </div>
                </div>

                <div class="col-lg-5 page-content">
                    <div class="about-image-tow mt-55">
                        <img src="uploads/image/{{$futurePlan->image}}" alt="about">
                        <div class="about-shape-tow">
                            <img src="{{asset('frontend/images/about/shape-2.png')}}" alt="shape">
                        </div>
                        <div class="about-shape-three">
                            <img src="{{asset('frontend/images/about/shape-3.png')}}" alt="shape">
                        </div>
                    </div>
                </div>
            </div> 

            
        </div> <!-- container -->
    </section>
<!--====== ABOUT PART ENDS ======-->
@endsection