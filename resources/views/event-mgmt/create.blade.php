@extends('event-mgmt.base')
@section('action-content')

<section class="content">
    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('event-mgmt.store') }}" enctype="multipart/form-data">
            <!-- general form elements disabled -->
            {{ csrf_field() }}
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Set Event
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
                                            <label>Event Title</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                   <input type="text" class="form-control" id="event_title"
                                                           name="event_title" placeholder="event title"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Event Date</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" id="event_publish_dt"
                                                       name="event_publish_dt" placeholder="date"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Event Time</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="event_time"
                                                           name="event_time" placeholder="event time"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Location</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="location"
                                                           name="location" placeholder="location"
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
                    <a href="{{ url('event-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"
                       data-placement="left" title="edit">Back</a>
                </div>
                <button type="submit" class="btn btn-primary "> Submit</button>
            </div>

        </form>


    </div>

    @endsection

