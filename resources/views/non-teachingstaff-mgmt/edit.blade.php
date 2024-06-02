@extends('non-teachingstaff-mgmt.base')
@section('action-content')

<section class="content">
    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('non-teachingstaff-mgmt.update', [$data->id]) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Non Teaching Information Edit
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
                                            <label>Name</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="name"
                                                           name="name" placeholder="Name" value="{{ $data->name }}" required="true"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Qualification</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="qualification"
                                                           name="qualification" placeholder="Qualification" value="{{ $data->qualification }}" required="true"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="designation"
                                                       name="designation" placeholder="Designation" value="{{ $data->designation }}"
                                                       required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Branch</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="branch"
                                                       name="branch" placeholder="Branch" value="{{ $data->branch }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="mobile_no"
                                                       name="mobile_no" placeholder="Mobile" value="{{ $data->mobile_no }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="email"
                                                       name="email" placeholder="Email" value="{{ $data->email }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Remarks</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="remarks"
                                                       name="remarks" placeholder="Remarks" value="{{ $data->remarks }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control"  id="imageInput" placeholder="image" value="{{ $data->image }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-center align-items-center">
                                        <div class="form-group text-center">
                                            <img id="imagePreview" src="{{$data->image}}" width="200px" height="200px" class="img-thumbnail" alt="Preview Image">
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
                    <a href="{{ url('non-teachingstaff-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"  data-placement="left" title="edit">Back</a>
                </div>
                <button type="submit" class="btn btn-primary "> Update</button>
            </div>
        </form>

    </div>

    @endsection
