@extends('admissionnotice-mgmt.base')
@section('action-content')

<section class="content">
    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('admissionnotice-mgmt.update', [$data->id]) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Admission Notice Edit
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Notice Category</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <select class="form-control select2"
                                                            style="width: 100%;" name="sub_cat_id">
                                                        @foreach ($admissionnoticelists as $admissionnoticelist)
                                                            <option value="{{$admissionnoticelist->id}}"<?=$admissionnoticelist->id == $data->sub_cat_id ? ' selected="selected"' : '';?>>{{$admissionnoticelist->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="file">File</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="imageInput"
                                                           name="file" value="{{ $data->file }}">
                                                    <label class="custom-file-label" for="file">{{$data->file}}</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Notice Title</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="title"
                                                       name="title" placeholder="Image Title" value="{{ $data->title }}"
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

            <div class="card-footer">
                <div class="btn-group mr-2">
                    <a href="{{ url('admissionnotice-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"  data-placement="left" title="edit">Back</a>
                </div>
                @can('admissionnotice-list')
                <button type="submit" class="btn btn-primary "> Update</button>
                @endcan
            </div>
        </form>

    </div>

    @endsection
