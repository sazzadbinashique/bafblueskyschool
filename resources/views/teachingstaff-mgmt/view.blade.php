@extends('teachingstaff-mgmt.base')
@section('action-content')
<section class="content">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-info-circle"></i>
                <span class="highlight-text">TEACHING</span> STAFF DETAIL
            </h3>

        </div>
        <div class="text-center p-3">
            <img src="{{$data ->image}}" alt="Profile Image" style="width: 200px; height: 200px; border: 5px solid #1f76b0; padding: 5px;">
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 p-3 px-3">
                            <table class="table table-sm table-bordered">
                                <tbody>
                                <tr>
                                    <th  width="20%">Name</th>
                                    <td >{{ $data->name }}</td>
                                </tr>
                                <tr>
                                    <th  width="20%">Qualification</th>
                                    <td > {{ $data->qualification }}</td>
                                </tr>
                                <tr>
                                    <th  width="20%">Designation</th>
                                    <td >{{ $data->designation }}</td>
                                </tr>
                                <tr>
                                    <th  width="20%">Branch</th>
                                    <td >{{ $data->branch }}</td>
                                </tr>
                                <tr>
                                    <th  width="20%">Mobile</th>
                                    <td >{{ $data->mobile_no }}</td>
                                </tr>
                                <tr>
                                    <th  width="20%">Email</th>
                                    <td >{{ $data->email }}</td>
                                </tr>
                                <tr>
                                    <th  width="20%">Remarks</th>
                                    <td >{{ $data->remarks }}</td>
                                </tr>
                                <tr>
                                    <th  width="20%">Appointment ser No</th>
                                    <td >{{ $data->appointment_ser_no }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-5">
                    <a  href="{{ url('teachingstaff-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
                </div>
            </div>
    </div>
@endsection
