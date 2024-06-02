<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css")}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">

    <!-- Select style -->
    <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.2.0/plugins/select2/css/select2.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.2.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.2.0/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css")}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.2.0/dist/css/adminlte.min.css")}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet">
</head>
<style>
    body {
        /* Set background image */
        background-image: url('{{ asset("manual_img_logo/main_bg1.jpg") }}');
        /* Adjust background image size and position */
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        /* Set initial transparency */
        opacity: 0.8; /* Adjust as needed */
        position: relative;
    }

    body::before {
        /* Create a semi-transparent overlay with the color #f1f6fe */
        content: '';
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(241, 246, 254, 0.8); /* Adjust the last value for transparency (0 to 1) */
        z-index: -1; /* Place it behind the content */
    }
</style>

<body class="hold-transition login-page">
<div id="app">
    @yield('content')
</div>

<!-- Scripts -->
<!-- <script src="{{ asset("/assets/js/jquery-3.5.0.min.js") }}"></script>


<script src="{{ asset ("/assets/js/scripts.js") }}" type="text/javascript"></script>
<script src="{{ asset("/assets/js/app.js") }}"></script> -->
<!-- jQuery -->
<script src="{{ asset("/assets/AdminLTE-3.2.0/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js")}}" type="text/javascript"></script>
<!-- Select App -->
<script src="{{ asset("/assets/AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/assets/AdminLTE-3.2.0/dist/js/adminlte.min.js")}}" type="text/javascript"></script>

<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/bs-custom-file-input/bs-custom-file-input.min.js")}}" type="text/javascript"></script>
<style>
    /* Style for the logo image */
    .logo-image {
        max-width: 150px; /* Set the maximum width for the logo */
        height: auto; /* Maintain the aspect ratio of the logo */
        display: block; /* Ensure the image behaves as a block element */
        margin: 0 auto 10px; /* Center the logo horizontally and add some margin below it */
    }
</style>

</body>
</html>
