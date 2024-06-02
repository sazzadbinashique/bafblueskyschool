<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    @yield('title')

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/png">

    @include('front.includes.styles')


</head>

<body>

    <!--====== PRELOADER PART START ======-->
    <!-- @include('front.includes.loader') -->
    <!--====== PRELOADER PART START ======-->

    <!--====== HEADER PART START ======-->
    @include('front.includes.header')
    <!--====== HEADER PART ENDS ======-->

    <!--====== SEARCH BOX PART START ======-->
    @include('front.includes.searchbox')
    <!--====== SEARCH BOX PART ENDS ======-->

    @yield('content')

    <!--====== FOOTER PART START ======-->
    @include('front.includes.footer')
    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TP PART START ======-->
    <a href="#" class="back-to-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!--====== BACK TO TP PART ENDS ======-->


    @include('front.includes.scripts')
    @yield('third_party_scripts')

</body>

</html>