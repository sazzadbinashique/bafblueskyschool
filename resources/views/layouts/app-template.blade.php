 <!DOCTYPE html>
<!--
  This is a starter template page. Use this page to start your new project from
  scratch. This page gets rid of all links and provides the needed markup only.
  -->
<html>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ __('appcustom.div_header') }}</title>
    <!-- fevicon -->


        <link href="{{ asset("/assets/css/styles.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/assets/css/customstyle.css")}}" rel="stylesheet" type="text/css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('manual_img_logo/goldeneagleLogo_hover.png') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">


    <link href="{{ asset("/assets/AdminLTE-3.2.0/plugins/datepicker/bootstrap-datetimepicker.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.2.0/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css")}}">
  <!-- Toastr -->
  <link href="{{ asset("/assets/AdminLTE-3.2.0/plugins/toastr/toastr.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- App CSS Color File -->
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/appcolor.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.2.0/dist/css/adminlte.min.css")}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">


       <!-- jQuery -->
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/jquery/jquery.min.js")}}" type="text/javascript"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js")}}" type="text/javascript"></script>

<!-- ChartJS -->
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/chart.js/Chart.min.js")}}" type="text/javascript"></script>



  <!-- DataTables  & Plugins -->
  <script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js")}}" type="text/javascript"></script>

  <script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}" type="text/javascript"></script>
  <script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}" type="text/javascript"></script>
  <script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}" type="text/javascript"></script>
  <script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}" type="text/javascript"></script>
  <script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}" type="text/javascript"></script>
  <script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/jszip/jszip.min.js")}}" type="text/javascript"></script>
  <script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js")}}" type="text/javascript"></script>
  <script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js")}}" type="text/javascript"></script>
  <script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js")}}" type="text/javascript"></script>
  <script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js")}}" type="text/javascript"></script>
  <script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js")}}" type="text/javascript"></script>





<!-- overlayScrollbars -->
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/assets/AdminLTE-3.2.0/dist/js/adminlte.min.js")}}" ></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/jquery-mousewheel/jquery.mousewheel.js")}}" ></script>
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/raphael/raphael.min.js")}}" ></script>
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/jquery-mapael/jquery.mapael.min.js")}}" ></script>
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/jquery-mapael/maps/usa_states.min.js")}}" ></script>

<script  src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js") }}"  ></script>
       <script  src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/datepicker/bootstrap-datepicker.min.js") }}"  ></script>

  <!-- SweetAlert2 -->
  <script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/sweetalert2/sweetalert2.min.js")}}" ></script>
<!-- Toastr -->
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/toastr/toastr.min.js")}}" ></script>
<!-- bs-custom-file-input -->
<script src="{{ asset ("/assets/AdminLTE-3.2.0/plugins/bs-custom-file-input/bs-custom-file-input.min.js")}}" ></script>

<!--<script src="{{ asset ("/assets/js/customapp.js")}}" ></script>-->
<!--//<script src="{{ asset ("/assets/js/custom_chart.js")}}" ></script>-->
<script src="{{ asset ("/assets/js/customapp.js")}}" type="text/javascript"></script>
<script src="{{ asset ("/assets/js/custom_chart.js")}}" type="text/javascript"></script>
    <script>
        $('#modal-changeStatus').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget); // Button that triggered the modal

            var item_id = button.data('itemid'); // Extract info from data-* attributes
            var start_date = button.data('startdate');
            var end_date = button.data('enddate');
            var booked_room_number = button.data('bookedroomnumber');
            var room_name = button.data('roomname');

            console.log(end_date);
            var modal = $(this)
            modal.find('.modal-body #item_id').val(item_id)
            modal.find('.modal-body #start_date').val(start_date)
            modal.find('.modal-body #end_date').val(end_date)
            modal.find('.modal-body #booked_room_number').val(booked_room_number)
            modal.find('.modal-body #room_name').val(room_name)
        })

    </script>
    <!-- Main Header -->
    @include('layouts.header')
    <div class="wrapper" >
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!--Main Content-->
        <div class="content-wrapper">
            @yield('content')
        </div>

    </div>
  </body>
</html>
