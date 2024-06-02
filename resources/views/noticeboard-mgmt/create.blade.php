@extends('noticeboard-mgmt.base')
@section('action-content')

<section class="content">
    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('noticeboard-mgmt.store') }}" enctype="multipart/form-data">
            <!-- general form elements disabled -->
            {{ csrf_field() }}
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Set Notice
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
                                            <label>Notice Image</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="file" class="form-control" id="notice_img"
                                                           name="notice_img" placeholder="notice_img"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Publish Date</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" id="notice_publish_dt"
                                                       name="notice_publish_dt" placeholder="date"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Notice Admin Name</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="notice_admin_name"
                                                           name="notice_admin_name" placeholder="admin name"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Notice Title</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="notice_title"
                                                       name="notice_title" placeholder="notice title"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="image">Notice Description</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="text" class="form-control" id="notice_description"
                                                           name="notice_description">
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Notice Pdf</label>
                                            <div class="col-sm-12">
                                                <input type="file" class="form-control" id="notice_pdf"
                                                       name="notice_pdf" placeholder="Description"
                                                >
                                            </div>
                                        </div>
                                    </div> -->
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-footer">
                <div class="btn-group mr-2">
                    <a href="{{ url('noticeboard-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"
                       data-placement="left" title="edit">Back</a>
                </div>
                <button type="submit" class="btn btn-primary "> Submit</button>
            </div>

        </form>


    </div>

    @endsection

