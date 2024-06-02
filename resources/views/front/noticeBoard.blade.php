@extends('front.layout')

@section('title')
<title>Notice Board &#8211; BAF Blue Sky School</title>
@endsection

@section('content')
<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('frontend/img/header.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Notice Board</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Notice Board</li>
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

                <div class="row">

                @foreach ($noticeBoard as $notice)
                    <div class="col-md-4 col-xs-6">
                        <div class="single-news mt-30" style="background:#fff;">
                            <div class="news-thum pb-25">
                            <img src="uploads/image/{{$notice->notice_img}}" alt="News" style="height: 225px; width: 100%;">
                            </div>
                            <div class="news-cont news-text">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-calendar"></i>
                                            {{ \Carbon\Carbon::parse($notice->notice_publish_dt)->format('d F Y') }}
                                        </a>
                                    </li>
                                </ul>
                                <a href="noticeBoardDtls/{{$notice->id}}">
                                    <h4> {{ $notice->notice_title }} </h4>
                          
                                <p>
                                {{ Illuminate\Support\Str::limit($notice->notice_description, 80) }}
                                </p>
                                </a>
                            </div>
                        </div>
                    </div>

                    
                @endforeach
                    
                </div> <!-- container -->
        </section>

</div>
<!--====== ABOUT PART ENDS ======-->
@endsection