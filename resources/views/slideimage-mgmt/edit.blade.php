@extends('slideimage-mgmt.base')
@section('action-content')

<section class="content">
    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('slideimage-mgmt.update', [$data->id]) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Edit Slide
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
                                            <label>Img title</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="img_title"
                                                       name="img_title" placeholder="img_title"  value="{{$data->img_title}}"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Notice Image</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="file" class="custom-file-input" id="slide_img"
                                                           name="slide_img">
                                                    <label class="custom-file-label" for="slide_img">{{ $data->slide_img }}</label>
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
                    <a href="{{ url('slideimage-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"  data-placement="left" title="edit">Back</a>
                </div>
                <button type="submit" class="btn btn-primary "> Update</button>
            </div>
        </form>

    </div>

    @endsection