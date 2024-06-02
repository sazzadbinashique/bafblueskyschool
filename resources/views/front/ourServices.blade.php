@extends('front.layout')

@section('title')
<title>Our services &#8211; BAF Blue Sky School</title>
@endsection

@section('content')
<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('frontend/img/header.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Our services</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Our services</li>
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

            <div class="row" >
                <div class="col-lg-5 page-content">
                    <div class="section-title mt-50">
                        <h5>Blue Sky School</h5>
                        <h2>Our services</h2>
                    </div>
                    <div class="about-cont">
                        <p class="text-align"></p>
                    </div>
                    </br>
                    <div>
                     
                        <ul class="outer-list">
                            <li>Intervention clinic</li>
                            <li>Assessment and diagnosis of individuals with certified professionals
                                <ul class="inner-list">
                                    <li>Professional guidelines and counselling for parents</li>
                                    <li>Psychological service and management</li>
                                </ul>
                            </li>
                            <li>A precise special education program for individuals with special needs (Autism, Cerebral Palsy, Downs Syndrome etc.)</li>
                            <li>Vocational training</li>
                            <li>Therapeutic services
                               <ul class="inner-list">
                                    <li>Speech and language therapy</li>
                                    <li>Auditory verbal therapy (AVT)</li>
                                    <li>Occupational therapy</li>
                                    <li>Physiotherapy</li>
                                    <li>Music therapy</li>
                                </ul>
                            </li>
                            <li>Outdoor services</li>
                            <li>Sports and recreational activities</li>
                            <li>Training for professionals and parents</li>
                            <li>Volunteering and internship opportunity</li>
                        </ul>


                        
                    </div>
                </div>

                <div class="col-lg-2 page-content"></div>
                
                <div class="col-lg-5 page-content">
                    <div class="about-image-tow mt-55">
                        <img src="{{asset('frontend/images/about/our_services.png')}}" alt="about">
                        <div class="about-shape-tow">
                            <img src="{{asset('frontend/images/about/shape-2.png')}}" alt="shape">
                        </div>
                        <div class="about-shape-three" style="margin-left:-40px;">
                            <img src="{{asset('frontend/images/about/shape-3.png')}}" alt="shape">
                        </div>
                    </div>
                </div>
            </div> 

            
        </div> <!-- container -->
    </section>

</div>
<!--====== ABOUT PART ENDS ======-->
@endsection