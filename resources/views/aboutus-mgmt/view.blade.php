@extends('aboutus-mgmt.base')
@section('action-content')
<section class="content">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-info-circle"></i>
                <span class="highlight-text">About Us</span> DETAIL
            </h3>

        </div>
        <div class="text-center p-3">           
            <img src="{{ asset('uploads/image/' . $data->image) }}" style="width: 20%; height: 20%;" alt="image">
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 p-3 px-3">
                            <table class="table table-sm table-bordered">
                                <tbody>
                                <tr>
                                    <th  width="20%">Title</th>
                                    <td >{{ $data->title }}</td>
                                </tr>
                                </tbody>

                                <tbody>
                                <tr>
                                    <th  width="20%">Category</th>
                                    <td >{{ $data->category }}</td>
                                </tr>
                                </tbody>

                                <tbody>
                                <tr>
                                    <th  width="20%">Description1</th>
                                    <td >{{ $data->description1 }}</td>
                                </tr>
                                </tbody>

                                <tbody>
                                <tr>
                                    <th  width="20%">Description2</th>
                                    <td >{{ $data->description2 }}</td>
                                </tr>
                                </tbody>

                                <tbody>
                                <tr>
                                    <th  width="20%">Description3</th>
                                    <td >{{ $data->description3 }}</td>
                                </tr>
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-5">
                    <a  href="{{ url('aboutus-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
                </div>
            </div>
    </div>
@endsection
