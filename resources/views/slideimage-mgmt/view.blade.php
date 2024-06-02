@extends('slideimage-mgmt.base')
@section('action-content')
<section class="content">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-info-circle"></i>
                <span class="highlight-text">Slide</span> DETAIL
            </h3>

        </div>
        <div class="text-center p-3">
        <img src="{{ asset('uploads/image/' . $data->slide_img) }}" style="width: 20%; height: 20%;" alt="image">
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 p-3 px-3">
                            <table class="table table-sm table-bordered">

                                <tbody>
                                    <tr>
                                        <th  width="20%">Image Title</th>
                                        <td >{{ $data->img_title }}</td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-5">
                    <a  href="{{ url('slideimage-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
                </div>
            </div>
    </div>
@endsection