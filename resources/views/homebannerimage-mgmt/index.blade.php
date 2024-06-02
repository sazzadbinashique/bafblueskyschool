@extends('homebannerimage-mgmt.base')
@section('action-content')
    <!-- Main content -->

    <section class="content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <form role="form" method="POST" action="{{ route('homebannerimage-mgmt.store') }}" enctype="multipart/form-data">
                            <!-- general form elements disabled -->
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="fas fa-edit"></i>
                                                    Upload Image
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
                                                            <label for="image">Image</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="image"
                                                                           name="image">
                                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Image Title</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="title"
                                                                       name="title" placeholder="Image Title" value=""required
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>&nbsp;</label>
                                                            <div class="col-sm-12">
                                                                <button type="submit" class="btn btn-success">Upload</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>


                    </div>

                    <table id="image_datatable_backend" class="table table-striped table-bordered">
                        <thead>
                        <tr>

                            <th>Ser</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php $count = 1; @endphp
                        @foreach ($datas as $data)

                            <tr>
                                <td style="width: 20px; overflow: hidden; text-align: center;">{{ $count }}</td>
                                <td>{{ $data->title }}</td>
                                <td style="width: 60px; height: 60px; padding: 5px;">
                                    <img src="{{$data->image}}" style="width: 100%; height: 100%;" alt="image">
                                </td>

                                <td style="width: 200px; overflow: hidden; text-align: center;">

                                    <a class="btn btn-outline-secondary btn-sm"
                                       href="{{ route('homebannerimage-mgmt.edit', [$data->id]) }}" data-placement="left"
                                       title="Edit">
                                        <i class="far fa-edit" style="font-size: 12px;color: #0000C0;"></i> Edit
                                    </a>
                                    <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')"
                                       href="{{ route('homebannerimage-mgmt.remove', [$data->id]) }}"
                                       data-placement="left"
                                       title="Cancel">
                                        <i class="fas fa-trash" style="font-size: 12px;color: #7c151f;"></i> Delete
                                    </a>
                                    <a class="btn btn-outline-primary btn-sm"
                                       href="{{ route('homebannerimage-mgmt.show', [$data->id]) }}" data-placement="left"
                                       title="Show">
                                        <i class="fas fa-eye" style="font-size: 12px;color: #0000C0;"></i> View
                                    </a>
                                </td>


                            </tr>
                            @php $count += 1; @endphp
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

@endsection


