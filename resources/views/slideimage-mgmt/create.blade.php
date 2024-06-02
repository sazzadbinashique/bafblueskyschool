@extends('slideimage-mgmt.base')
@section('action-content')

<section class="content">
    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('slideimage-mgmt.store') }}" enctype="multipart/form-data">
            <!-- general form elements disabled -->
            {{ csrf_field() }}
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Set Slide
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
                                                       name="img_title" placeholder="img_title"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Slide Image</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="file" class="form-control" id="slide_img"
                                                           name="slide_img" placeholder="slide_img"
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
                    <a href="{{ url('slideimage-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"
                       data-placement="left" title="edit">Back</a>
                </div>
                <button type="submit" class="btn btn-primary "> Submit</button>
            </div>

        </form>


    </div>

    @endsection

