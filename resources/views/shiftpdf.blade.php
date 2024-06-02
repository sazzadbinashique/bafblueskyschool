@extends('layouts.layouts')

@section('main')


<section id="about" class="common bg-common">
    <div class="content-box-large">
        <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center teaching-top-msg">Shift pdf</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12  margin-tb">
                  <iframe
                    src='{{asset("/uploads/{$shift->file}")}}'
                    frameBorder="0"
                    scrolling="auto"
                    height="800px"
                    width="100%"
                  >
                  </iframe>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
