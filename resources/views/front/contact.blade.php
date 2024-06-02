@extends('front.layout')

@section('title')
<title>Contact &#8211; BAF Blue Sky School</title>
@endsection

@section('content')
<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('frontend/img/header.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Contact</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
                <div class="col-lg-8">
                    
                         <div style="padding:40px; background:#fff; height:660px;">

                                @if(Session::has('user_feedback'))
                                    <div class="alert alert-success" role="alert">
                                    {{ Session::get('user_feedback') }}
                                    </div>
                                @endif

                                <h5>Contact Us</h5>

                                <span class="title-seperator"></span>
                                </br>

                                <h2>Keep in Touch</h2>
                                </br>
                                
                                <form action="{{ route('feedbackStore') }}" method="POST">
                                @csrf

                                    <input type="text" class="form-control" name="firstname" placeholder="First Name" maxlength="50" required> </br>
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" maxlength="50" required> </br>
                                    <input type="text" class="form-control" name="email" placeholder="Your Email" maxlength="50"required> </br>
                                    <input type="text" class="form-control" name="subject" placeholder="Your Subject" maxlength="500" required> </br>
                                    <textarea class="form-control" name="message" placeholder="Your Message" maxlength="1000" required></textarea></br>

                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>

                                </form>
                        </div>
                </div>

                <div class="col-lg-4">
                <div style="padding:40px; background:#fff;">
                                <h2>Address</h2>
                            

                                <span class="title-seperator"></span>
                                </br>
                                <p> <i class="fa fa-home"></i>&nbsp; {{$contactInfo->address}}</p>
                                <span class="line-seperator"></span>
                                <p>  <i class="fa fa-envelope-o"></i>&nbsp; {{$contactInfo->email_add}} </p>
                                <span class="line-seperator"></span>
                                <p><i class="fa fa-phone"></i>&nbsp;  {{$contactInfo->phone_no}} # {{$contactInfo->mobile_no}}</p>
                                <span class="line-seperator"></span>
                                <p><i class="fa fa-globe"></i>&nbsp;  {{$contactInfo->whatsapp_link}}</p>

                                 </br></br>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7300.888990143399!2d90.3932!3d23.802788!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c742c05e119f%3A0xdb521f4eddc9fa1a!2sBAFWWA%20Shopping%20Complex!5e0!3m2!1sen!2sus!4v1710999188930!5m2!1sen!2sus" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                
                        </div>
                </div>
            </div> <!-- row -->

            

        </div> <!-- container -->
    </section>
</div> <!-- container -->
<!--====== ABOUT PART ENDS ======-->
@endsection