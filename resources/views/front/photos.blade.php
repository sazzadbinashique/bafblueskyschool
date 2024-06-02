@extends('front.layout')

@section('title')
<title>Photos  &#8211; BAF Blue Sky School</title>
@endsection

@section('content')
<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('frontend/img/header.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Photos</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Photos</li>
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
                <div class="row gallery">
                    @foreach ($photos as $photo)
                    <div class="col-md-3 col-xs-6 thumb">
                        <a href="uploads/image/{{$photo->image}}">
                            <figure>
                                <img class="img-fluid img-thumbnail" src="uploads/image/{{$photo->image}}" alt="Gallery Image">
                                <p style="text-align:center; margin-top:5px;">{{$photo->title}}</p>
                            </figure>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div> <!-- container -->
        </section>

        
    

</div>
<!--====== ABOUT PART ENDS ======-->
@endsection