@extends('principlemessage-mgmt.base')
@section('action-content')

<section class="content">
    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('principlemessage-mgmt.update', [$data->id]) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Edit Principle Message
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <div class="col-sm-12 d-flex justify-content-center align-items-center">
                                    <div class="form-group text-center">
                                        <img id="imagePreview" src="{{$data->image}}" width="200px" height="200px" class="img-thumbnail" alt="Preview Image">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="name"
                                                           name="name" placeholder="name" value="{{$data->name}}" required="true"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="imageInput"
                                                           name="image">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Paragraph 1</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" rows="3" id="description_1"
                                                              name="description_1"
                                                              placeholder=""><?php echo htmlspecialchars($data->description_1); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Paragraph 2</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" rows="3" id="description_2"
                                                          name="description_2"
                                                          placeholder=""><?php echo htmlspecialchars($data->description_2); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Paragraph 3</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" rows="3" id="description_3"
                                                              name="description_3"
                                                              placeholder=""><?php echo htmlspecialchars($data->description_3); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Conclusion</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" rows="3" id="conclusion"
                                                              name="conclusion"
                                                              placeholder=""><?php echo htmlspecialchars($data->conclusion); ?></textarea>
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
                    <a href="{{ url('principlemessage-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"  data-placement="left" title="edit">Back</a>
                </div>
                <button type="submit" class="btn btn-primary "> Update</button>
            </div>
        </form>

    </div>

    @endsection
