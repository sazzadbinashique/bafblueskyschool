@extends('noticeboard-mgmt.base')
@section('action-content')
<section class="content">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-info-circle"></i>
                <span class="highlight-text">Notice</span> DETAIL
            </h3>

        </div>
        <div class="text-center p-3">
        <img src="{{ asset('uploads/image/' . $data->notice_img) }}" style="width: 20%; height: 20%;" alt="image">
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 p-3 px-3">
                            <table class="table table-sm table-bordered">
                                <tbody>
                                <tr>
                                    <th  width="20%">Publish Date</th>
                                    <td >{{ $data->notice_publish_dt }}</td>
                                </tr>
                                </tbody>

                                <tbody>
                                <tr>
                                    <th  width="20%">Admin Name</th>
                                    <td >{{ $data->notice_admin_name }}</td>
                                </tr>
                                </tbody>

                                <tbody>
                                <tr>
                                    <th  width="20%">Notice title</th>
                                    <td >{{ $data->notice_title }}</td>
                                </tr>
                                </tbody>

                                <tbody>
                                <tr>
                                    <th  width="20%">Notice Description</th>
                                    <td >{{ $data->notice_description }}</td>
                                </tr>
                                </tbody>
                                

                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-5">
                    <a  href="{{ url('noticeboard-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
                </div>
            </div>
    </div>
@endsection
