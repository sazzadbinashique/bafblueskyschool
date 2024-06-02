@extends('parentsfeedback-mgmt.base')
@section('action-content')

<section class="content">
    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('parentsfeedback-mgmt.update', [$data->id]) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Parents Feedback
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
                                    <div class="col-sm-12">
                                    <div class="form-group">
                                            <input type="hidden" name="updated_by" value="{{$updated_by}}">
                                            <label>Feedback Reply Email</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="title"
                                                           name="email" value="{{ $data->email }}" placeholder="Enter Your Email ID" required="true">
                                                </div>
                                            </div>

                                            </br>
                                            <label>Subject</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="subject"
                                                           name="subject" placeholder="Subject" value="{{ $data->subject }}" required="true">
                                                </div>
                                            </div>

                                            </br>
                                            <label>Suggestion / Comments</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                <textarea name="comments" class="form-control" rows="5" id="comments" placeholder="Enter comments..." required>{{ $data->comments }}</textarea>
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
                    <a href="{{ url('parentsfeedback-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"  data-placement="left" title="edit">Back</a>
                </div>
                <button type="submit" class="btn btn-primary "> Update</button>
            </div>
        </form>

    </div>

    @endsection
