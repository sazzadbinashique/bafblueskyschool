@extends('homepageinfo-mgmt.base')
@section('action-content')
<section class="content">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-info-circle"></i>
                <span class="highlight-text">PRINCIPLE</span> MESSAGE DETAIL
            </h3>

        </div>
        <div class="text-center p-3">
            <img src="{{$data ->top_image}}" alt="Top Image" style="width: 200px; height: 200px; border: 5px solid #1f76b0; padding: 5px;">
            <img src="{{$data ->bottom_image}}" alt="Bottom Image" style="width: 200px; height: 200px; border: 5px solid #1f76b0; padding: 5px;">
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 p-3 px-3">
                            <table class="table table-sm table-bordered">
                                <tbody>
                                <tr>
                                    <th  width="20%">Paragraph 1</th>
                                    <td >{{ $data->description_1 }}</td>
                                </tr>
                                <tr>
                                    <th  width="20%">Paragraph 2</th>
                                    <td >{{ $data->description_2 }}</td>
                                </tr>
                                <tr>
                                    <th  width="20%">Copyright Tag</th>
                                    <td >{{ $data->copyright_tag }}</td>
                                </tr>
                                <tr>
                                    <th  width="20%">Developed By Tag</th>
                                    <td >{{ $data->developed_by_tag }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-5">
                    <a  href="{{ url('homepageinfo-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
                </div>
            </div>
    </div>
@endsection
