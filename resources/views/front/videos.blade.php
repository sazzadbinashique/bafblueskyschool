@extends('front.layout')

@section('title')
<title>Videos  &#8211; BAF Blue Sky School</title>
@endsection

@section('content')
<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('frontend/img/header.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Videos</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Videos</li>
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


@php
            $vdos = [
                'frontend/vdo/blue_sky_school1.mp4',
                'frontend/vdo/blue_sky_school2.mp4',
                'frontend/vdo/blue_sky_school3.mp4'
            ];
        @endphp
        <section id="course-part" class="pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title pb-45">
                            <!-- <h5>Photo Gallery</h5> -->
                        </div> <!-- section title -->
                    </div>
                </div> <!-- row -->

                 </br></br>
                <div class="row">
                    @foreach ($vdos as $vdo)
                    <div class="col-md-5 col-xs-5 col-lg-5">
                        <video width="580px" height="350px" controls="controls">
                           <source src="{{ asset($vdo) }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="col-md-1 col-xs-1 col-lg-1"></div>
                    @endforeach
                </div>
            </div> <!-- container -->
        </section>

        
    

</div>
<!--====== ABOUT PART ENDS ======-->
@endsection