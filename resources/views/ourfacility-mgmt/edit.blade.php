@extends('ourfacility-mgmt.base')
@section('action-content')

<section class="content">
    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('ourfacility-mgmt.update', [$data->id]) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                   Our Facility
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
                                            <label>Facility  Image</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="file" class="form-control" id="image"
                                                           name="image" placeholder="image"
                                                    >
                                                    <label class="custom-file-label" for="image">{{ $data->image }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>title</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="title"
                                                       name="title" placeholder="title" value="{{$data->title}}"
                                                >
                                            </div>
                                        </div>
                                    </div>                                
                                </div>

                                <div class="row">                               
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="description"
                                                           name="description" placeholder="description" value="{{$data->description}}"
                                                    >
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
                    <a href="{{ url('ourfacility-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"  data-placement="left" title="edit">Back</a>
                </div>
                <button type="submit" class="btn btn-primary "> Update</button>
            </div>
        </form>

    </div>

    @endsection
