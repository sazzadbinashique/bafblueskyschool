@extends('latestinfo-mgmt.base')
@section('action-content')

<section class="content">
    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('latestinfo-mgmt.update', [$data->id]) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Edit Latest Info
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
                                            <label>Title</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="title"
                                                           name="title" placeholder="Title" value="{{ $data->title }}" required="true"
                                                    >
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                <strong>Pdf : <span style="color:#ff0000"> MAX 25 MB</span></strong>
                                                <embed src="{{ url('uploads/',$data->latest_news_doc)}}" width="50" height="30"  type="application/pdf">
                                                <input type="file" name="latest_news_doc" class="form-control"  value="" maxlength="150">                 
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
                    <a href="{{ url('latestinfo-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"  data-placement="left" title="edit">Back</a>
                </div>
                @can('latestinfo-list')
                <button type="submit" class="btn btn-primary "> Update</button>
                @endcan
            </div>
        </form>

    </div>

    @endsection
