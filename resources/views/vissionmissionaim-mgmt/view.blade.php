@extends('vissionmissionaim-mgmt.base')
@section('action-content')
<section class="content">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-info-circle"></i>
                <span class="highlight-text">VISION</span>  MISSION AMI
            </h3>

        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 p-3 px-3">
                            <table class="table table-sm table-bordered">
                                <tbody>
                                <th  width="20%">Vision</th>
                                <td >{{ $data->vision_txt }}</td>
                                <th  width="20%">Mission</th>
                                <td >{{ $data->mission_txt }}</td>
                                <th  width="20%">Aim</th>
                                <td >{{ $data->aim_txt }}</td>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-5">
                    <a  href="{{ url('vissionmissionaim-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
                </div>
            </div>
    </div>
@endsection
