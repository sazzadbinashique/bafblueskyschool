<section id="slider-part" class="slider-active ">

    @foreach($slideimg as $slideimg)
    <div class="single-slider bg_cover pt-150" style="background-image: url({{ asset('uploads/image/'.$slideimg->slide_img) }}); height: 680px;" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach


</section>