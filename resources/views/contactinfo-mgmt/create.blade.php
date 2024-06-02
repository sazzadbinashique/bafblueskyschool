@extends('contactinfo-mgmt.base')
@section('action-content')

    <section class="content">
        <div class="col-md-12">
            <form role="form" method="POST" action="{{ route('contactinfo-mgmt.store') }}">
                <!-- general form elements disabled -->
                {{ csrf_field() }}
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-edit"></i>
                                        Set Contact Information
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Institute Name</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="institute_name"
                                                               name="institute_name" placeholder="Institute Name"
                                                               value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="address"
                                                               name="address" placeholder="Address" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Mobile No</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="mobile_no"
                                                               name="mobile_no" placeholder="Mobile No" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Phone No</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="phone_no"
                                                               name="phone_no" placeholder="Phone No" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="email_add"
                                                               name="email_add" placeholder="Email Address" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Alternate Email</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="email_alternate"
                                                               name="email_alternate" placeholder="Email Address" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Facebook Link</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="facebook_link"
                                                               name="facebook_link" placeholder="Facebook Link"
                                                               value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Whatsapp link</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="whatsapp_link"
                                                               name="whatsapp_link" placeholder="Whatsapp link"
                                                               value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Twitter Link</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="tweeter_link"
                                                               name="tweeter_link" placeholder="Twitter Link" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                       <textarea class="form-control" rows="3" id="location_txt"
                                                                 name="location_txt"
                                                                 placeholder="Location"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-footer">
                    <div class="btn-group mr-2">
                        <a href="{{ url('contactinfo-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"
                           data-placement="left" title="edit">Back</a>
                    </div>
                    <button type="submit" class="btn btn-primary "> Submit</button>
                </div>

            </form>


        </div>

@endsection

