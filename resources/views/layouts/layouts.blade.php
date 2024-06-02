<!DOCTYPE html>
<html lang="en">

<head>

    <!-- References: https://github.com/fancyapps/fancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
          media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <!-- gallery css end -->
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <!-- site metas -->
    <title>BAF Blue Sky School</title>

    <!-- Musafir ALi -->
    <link href="{{ asset("/assets/css/styles.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/css/customstyle.css")}}" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet"
          href="{{ asset("/assets/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet"
          href="{{ asset("/assets/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
    <link rel="stylesheet"
          href="{{ asset("/assets/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">

    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.2.0/plugins/ekko-lightbox/ekko-lightbox.css")}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
            crossorigin="anonymous"></script>

    <!-- Musafir ALi -->

    <link rel="icon" type="image/x-icon" href="{{ asset('manual_img_logo/goldeneagleLogo_hover.png') }}">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- fevicon -->
    <link href="https://fonts.googleapis.com/css?family=Raleway+Dots&display=swap&subset=latin-ext" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Raleway+Dots&display=swap&subset=latin-ext"
        rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/vendor/aos/aos.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/vendor/icofont/icofont.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/vendor/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/vendor/glightbox/css/glightbox.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/vendor/nivo-slider/css/nivo-slider.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/vendor/remixicon/remixicon.css">
    {{--    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/vendor/swiper/swiper-bundle.min.css">--}}
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/vendor/venobox/venobox.css">


    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/style.css">
    <!-- App CSS Color File -->
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/appcolor.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/developercustom.css">
</head>

<body class="main-layout section-bg" id="main-body">
<!-- Start Header -->
@include('frontend.header')
<!-- End Header -->
<div class="content-box-large " >
    <div class="conatiner" style="background-image: url('/manual_img_logo/background.png');background-position: center; position: relative;">
        <div class="opacity-overlay"
             style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.2);"></div>
        <!-- Start Other Content -->
        @yield('content')
        <!-- End Other Content -->
    </div>
    <!-- Start footer -->
    @include('frontend.footer')
    <!-- End footer -->

    <div class="header__topbar">
        <div class="container-fluid px-5 px-md-0">
            <div class="breakingNews">
                <div class="bn-title"><h2>Highlights</h2><span></span></div>
                <ul style="display: flex; justify-content: center; align-items: center; list-style: none; padding: 0;">
                    <marquee behavior="scroll" direction="left" scrollamount="7" onmouseover="this.stop();" onmouseout="this.start()" style="margin: 0;">
                        <!-- <a style="color: #0a001f;" href="#"> অনলাইনে ছাত্রদের হোম ওয়ার্ক (HW) প্রদানের নিয়মাবলি || </a> -->
                        <!-- <a style="color: #0a001f;" href="#"> অনলাইনে ছাত্রদের হোম ওয়ার্ক (HW) প্রদানের নিয়মাবলি || </a> -->
                               @foreach ($latestInfos as $latestInfo)
                                    <!-- <a href="#" style="color: black !important;">{{$latestInfo->title}}</a> -->
                                    <a style="color: #0a001f;" href="{{url('/uploads', $latestInfo->latest_news_doc)}}"> {{$latestInfo->title}}    **  </a>
                                @endforeach
                    </marquee>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Vendor JS Files -->
{{--<script src="{{ asset('assets') }}/frontend/vendor/jquery/jquery.min.js"></script>--}}
<script src="{{ asset('assets') }}/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets') }}/frontend/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="{{ asset('assets') }}/frontend/vendor/php-email-form/validate.js"></script>
<script src="{{ asset('assets') }}/frontend/vendor/waypoints/jquery.waypoints.min.js"></script>
{{--<script src="{{ asset('assets') }}/frontend/vendor/swiper/swiper-bundle.min.js"></script>--}}
<script src="{{ asset('assets') }}/frontend/vendor/counterup/counterup.min.js"></script>
<script src="{{ asset('assets') }}/frontend/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="{{ asset('assets') }}/frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{ asset('assets') }}/frontend/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('assets') }}/frontend/vendor/venobox/venobox.min.js"></script>
<script src="{{ asset('assets') }}/frontend/vendor/aos/aos.js"></script>
<script src="{{ asset('assets') }}/frontend/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{ asset('assets') }}/frontend/vendor/nivo-slider/js/jquery.nivo.slider.js"></script>
<script href="{{ asset('assets') }}/frontend/vendor/wow/wow.min.js"></script>
<script href="{{ asset('assets') }}/frontend/vendor/wow/wow.min.js"></script>


<!-- Bootstrap 4 -->
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"
        type="text/javascript"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js")}}"
        type="text/javascript"></script>

<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"
        type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"
        type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"
        type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"
        type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"
        type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/jszip/jszip.min.js")}}" type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js")}}" type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js")}}" type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js")}}"
        type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js")}}"
        type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js")}}"
        type="text/javascript"></script>


<!-- overlayScrollbars -->

<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datepicker/bootstrap-datepicker.min.js") }}"></script>

<!-- SweetAlert2 -->
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/sweetalert2/sweetalert2.min.js")}}"></script>
<!-- Toastr -->

<!-- Ekko Lightbox -->
<script src="/assets/AdminLTE-3.2.0/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!--<script src="{{ asset ("/assets/js/customapp.js")}}" ></script>-->
<script src="{{ asset ("/assets/js/customapp.js")}}" type="text/javascript"></script>
<!-- Template Main JS File -->
<script src="{{ asset('assets') }}/frontend/js/main.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->
<script>


    $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({gutterPixels: 3});
        $('.btn[data-filter]').on('click', function () {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })

    $(document).ready(function () {
        $('#carouselExampleIndicators').carousel();
    });


</script>
</body>

</html>
