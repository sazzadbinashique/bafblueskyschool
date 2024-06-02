@extends('usefulllinks-mgmt.base')
@section('action-content')

<section class="content">
    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('usefulllinks-mgmt.update', [$data->id]) }}" >
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Edit Useful Links
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
                                            <label>Link Name</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="link_name"
                                                           name="link_name" placeholder="Link Name"
                                                           value="{{$data->link_name}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Link Address</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="link_address"
                                                           name="link_address" placeholder="Link Address" value="{{$data->link_address}}">
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
                    <a href="{{ url('usefulllinks-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"  data-placement="left" title="edit">Back</a>
                </div>
                <button type="submit" class="btn btn-primary "> Update</button>
            </div>
        </form>

    </div>

    @endsection