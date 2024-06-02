@extends('imggallery-mgmt.base')
@section('action-content')

<section class="content">
    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('imggallery-mgmt.update', [$data->id]) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Resource Edit
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
                                            <label>Gallery Category</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <select class="form-control select2"
                                                            style="width: 100%;" name="gallery_cat_id">
                                                        @foreach ($galleryCats as $galleryCat)
                                                            <option value="{{$galleryCat->id}}"<?=$galleryCat->id == $data->gallery_cat_id ? ' selected="selected"' : '';?>>{{$galleryCat->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="imageInput"
                                                           name="image" value="{{ $data->image }}">
                                                    <label class="custom-file-label" for="notice_img">{{ $data->image }}</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Image Title Description</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="title"
                                                       name="title" placeholder="Image Title" value="{{ $data->title }}"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                      <div class="form-group">
                                        <label>Description1</label>
                                        <div class="col-sm-12">
                                            <textarea name="description1" id="description1">{{ $data->description1 }}
                                            </textarea>
                                        </div>
                                      </div>
                                   </div>

                                   
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Description2</label>
                                            <div class="col-sm-12">
                                            <textarea name="description2" id="description2">{{ $data->description2 }}
                                            </textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Description3</label>
                                            <div class="col-sm-12">
                                            <textarea name="description3" id="description3">{{ $data->description3 }}
                                            </textarea>
                                            </div>
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
                    <a href="{{ url('imggallery-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"  data-placement="left" title="edit">Back</a>
                </div>
                <button type="submit" class="btn btn-primary "> Update</button>
            </div>
        </form>

    </div>

    @endsection
