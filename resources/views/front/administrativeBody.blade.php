@extends('front.layout')

@section('title')
<title>Administrative Body &#8211; BAF Blue Sky School</title>
@endsection

@section('content')
<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('frontend/img/header.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Administrative Body</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Administrative Body</li>
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
                <div class="col-lg-5 page-content">
                    <div class="section-title mt-50">
                        <h5>Blue Sky School</h5>
                        <h2>Administrative Body</h2>
                    </div>
                    <div class="about-cont">
                        <p class="text-align">{{$administrativeBody->title}}</p>
                    </div>
                    </br></br>
                    <div>
                        <table class="table table-bordered">
                            <tr>
                                <td>President, BAFWWA</td>
                                <td>President</td> 
                            </tr>
                            <tr>
                                <td>Assistant Chief of Air Staff(Administration)</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>Director Education</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>Director Finance</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>Director Welfare and Ceremony</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>Director Medical Services (Air)</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>Judge Advocate General</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>Liaison Officer, Central Ladies Club</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>Treasurer, Central BAFWWA</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>Principal/Vice Principal</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>01 X Teacher Representative</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>01 X Guardian Representative</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>Liaison Officer, Central BAFWWA</td>
                                <td>Member</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-lg-2 page-content"></div>
                <div class="col-lg-5 page-content">
                    <div class="about-image-tow mt-55">
                        <img src="uploads/image/{{$administrativeBody->image}}" alt="about">
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
<!--====== ABOUT PART ENDS ======-->
@endsection