@extends('layouts.app-template')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>|| Non Teaching Staff ||</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">No Teaching Staff </li>
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

    </script>


</section>
@endsection
