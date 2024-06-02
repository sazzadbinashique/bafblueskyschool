@extends('layouts.layouts')

@section('main')


<section id="about" class="common bg-common">
    <div class="content-box-large">
        <div class="container">
            
             <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center teaching-top-msg">Admission Eligibility pdf</h2>
                </div>
             </div>

             <div class="row">
                <div class="col-lg-12  margin-tb">
                    <iframe
                      src='{{asset("/uploads/{$eligibility->file}")}}'
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
