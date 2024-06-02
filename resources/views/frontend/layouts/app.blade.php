
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="author" content="Sazzad Bin Ashique">

    <!-- Favicons -->
{{--    <link href="{{asset('frontend/img/favicon.png')}}" rel="icon">--}}
{{--    <link href="{{asset('frontend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">--}}

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
{{--    <link href="{{asset('frontend/vendor/aos/aos.css')}}" rel="stylesheet">--}}
    <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
</head>

<body>

<!-- ======= Header ======= -->

@include('frontend.includes.header')
<!-- ======= Hero Section ======= -->
{{-- only for home page--}}
 @if(Request::is('/') || Request::is('home'))
     @include('frontend.includes.slider')
 @endif

<main id="main">
   @yield('content')
</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('frontend.includes.footer')
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('frontend/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('frontend/vendor/aos/aos.js')}}"></script>
<script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('frontend/vendor/php-email-form/validate.js')}}"></script>
<!-- Template Main JS File -->
<script src="{{asset('frontend/js/main.js')}}"></script>
@yield('scripts')
<script>
    // JavaScript for video control
    @if(Request::is('/') || Request::is('home'))
    const video = document.getElementById('video-upload');
    const playPauseBtn = document.getElementById('play-pause');
    const seekBar = document.getElementById('seek-bar');
    const currentTimeDisplay = document.getElementById('current-time');

    // Format time in minutes and seconds
    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
    }

    // Play/Pause the video
    playPauseBtn.addEventListener('click', function(event) {
        event.preventDefault();
        if (video.paused) {
            video.play();
            playPauseBtn.innerHTML = '<i class="fa fa-pause-circle" aria-hidden="true"></i>';
        } else {
            video.pause();
            playPauseBtn.innerHTML = '<i class="fa fa-play-circle" aria-hidden="true"></i>';
        }
    });
    // Update seek bar as video plays
    video.addEventListener('timeupdate', function() {
        const value = (100 / video.duration) * video.currentTime;
        seekBar.value = value;
        currentTimeDisplay.textContent = formatTime(video.currentTime);
    });

    // Seek video
    seekBar.addEventListener('input', function() {
        const time = video.duration * (seekBar.value / 100);
        video.currentTime = time;
    });
    @endif

</script>
<script>
    window.addEventListener('scroll', function() {
        var header = document.querySelector('.site-header');
        var scrollTop = window.scrollY;

        if (scrollTop > 0) {
            header.classList.add('fixed-navbar');
        } else {
            header.classList.remove('fixed-navbar');
        }
    });
</script>
</body>

</html>
