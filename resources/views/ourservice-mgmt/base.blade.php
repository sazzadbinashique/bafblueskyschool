@extends('layouts.app-template')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>|| Our Service ||</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Education</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="wrapper">

        @yield('action-content')


    </div>
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))toastr.success('{{ Session::get('success') }}');
            @elseif(Session::has('warning'))toastr.warning('{{ Session::get('warning') }}');
            @endif
        });

        $(document).ready(function () {
            // Listen for changes in the file input
            $('#imageInput').on('change', function () {
                // Get the selected file
                var file = this.files[0];

                if (file) {
                    // Create a FileReader
                    var reader = new FileReader();

                    // Set a callback function to handle the file reading
                    reader.onload = function (e) {
                        // Update the source of the image to the data URL
                        $('#imagePreview').attr('src', e.target.result);
                    };

                    // Read the file as a data URL
                    reader.readAsDataURL(file);
                }
            });
        });
        $(document).ready(function() {
            var table1Config = configureDataTable('Education Image  List', 'Our Service Image List', null);
            // var table1Config = configureDataTable('Branch List', 'Branch List', [1,2]);
            $('#ourservice_table').DataTable(table1Config).buttons().container().appendTo('#ourservice_table_wrapper .col-md-6:eq(0)');
            $("#ourservice_table thead th").css({
                "background-color": "#FFCC00",
                "color": "#000" // Set the text color to black or a color that contrasts well with yellow
            });
        });
    </script>


</section>
@endsection
