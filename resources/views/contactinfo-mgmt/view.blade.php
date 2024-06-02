@extends('contactinfo-mgmt.base')
@section('action-content')
<section class="content">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-info-circle"></i>
                <span class="highlight-text">CONTACT</span>  INFORMATION
            </h3>

        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 p-3 px-3">
                            <table class="table table-sm table-bordered">
                                <tbody>
                                <th  width="20%">Institute Name</th>
                                <td >{{ $data->institute_name }}</td>
                                </tbody>
                                <tbody>
                                <th  width="20%">Address</th>
                                <td >{{ $data->address }}</td>
                                </tbody>
                                <tbody>
                                <th  width="20%">Mobile No</th>
                                <td >{{ $data->mobile_no }}</td>
                                </tbody>
                                <tbody>
                                <th  width="20%">Phone No</th>
                                <td >{{ $data->phone_no }}</td>
                                </tbody>
                                <tbody>
                                <th  width="20%">Email</th>
                                <td >{{ $data->email_add }}</td>
                                </tbody>
                                <tbody>
                                <th  width="20%">Alternate Email</th>
                                <td >{{ $data->email_alternate }}</td>
                                </tbody>
                                <tbody>
                                <th  width="20%">Facebook</th>
                                <td >{{ $data->tweeter_link }}</td>
                                </tbody>
                                <tbody>
                                <th  width="20%">WhatsApp</th>
                                <td >{{ $data->facebook_link }}</td>
                                </tbody>
                                <tbody>
                                <th  width="20%">Twitter</th>
                                <td >{{ $data->whatsapp_link }}</td>
                                </tbody>
                                <tbody>
                                <th  width="20%">Location</th>
                                <td >{{ $data->location_txt }}</td>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-5">
                    <a  href="{{ url('contactinfo-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
                </div>
            </div>
    </div>
@endsection
