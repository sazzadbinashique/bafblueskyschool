<!-- Main Header -->
@extends('layouts.app-template')
@section('content')
    <!-- /.content-wrapper -->
    <section class="content">
        <h1 class="mt-4"></h1>
        <div class="col-md-12">

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item ">Dashboard</li>
            </ol>
             <div class="row">
                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">Home Slide</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ url('slideimage-mgmt') }}">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">Upcoming Event</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ url('event-mgmt') }}">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">Special Education Program</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ url('specialeducationprogram-mgmt') }}">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">Our Facilities</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ url('ourfacility-mgmt') }}">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
            </div>


            <div class="row">
                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">About Us</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ url('aboutus-mgmt') }}">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">Our Services</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ url('ourservice-mgmt') }}">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">Education Program</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ url('educationprogram-mgmt') }}">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">Resource</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ url('imggallery-mgmt') }}">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
            </div>


            <div class="row">
                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">Notice</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ url('noticeboard-mgmt') }}">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">Contact Info</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ url('contactinfo-mgmt') }}">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">Useful Link</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ url('usefulllinks-mgmt') }}">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

            </div>




    </section>
@endsection

