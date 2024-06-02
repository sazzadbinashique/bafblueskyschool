@extends('academicnotice-mgmt.base')
@section('action-content')
    <!-- Main content -->

    <section class="content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <form role="form" method="POST" action="{{ route('academicnotice-mgmt.store') }}"
                              enctype="multipart/form-data">
                            <!-- general form elements disabled -->
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="fas fa-edit"></i>
                                                    Upload Notice
                                                </h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <label>Notice Category</label>
                                                            <div class="row">
                                                                <div class="col-sm-9">
                                                                    <select class="form-control select2"
                                                                            style="width: 100%;" name="academicnotice_cat_id">
                                                                        @foreach ($academicnoticelists as $academicnoticelist)
                                                                            <option
                                                                                value="{{$academicnoticelist->id}}">{{$academicnoticelist->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <span class="btn btn-primary col fileinput-button dz-clickable"
                                                                            data-toggle="modal" data-target="#modal-storecat" data-placement="left">
                                                                            <i class="fas fa-plus"></i>
                                                                                <span>Add</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="image">File (Pdf)</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                           id="file"
                                                                           name="file">
                                                                    <label class="custom-file-label" for="file">Choose
                                                                        file</label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label>Notice Title</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="title"
                                                                       name="title" placeholder="File Title" value=""
                                                                       required
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="form-group">
                                                            <label>&nbsp;</label>
                                                            <div class="col-sm-12">
                                                                <button type="submit" class="btn btn-success">Upload
                                                                </button>
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
                        <div class="modal fade" id="modal-storecat">
                            <form role="form" method="POST" action="{{ route('academicnotice-mgmt.storeCategory') }}">
                                {{ csrf_field() }}
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Category </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Enter Category </label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="" value=""
                                                >
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                            </form>
                        </div>

                    </div>

                    <table id="academic_notice_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>

                            <th>Ser</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php $count = 1; @endphp
                        @foreach ($datas as $data)

                            <tr>
                                <td style="width: 20px; overflow: hidden; text-align: center;">{{ $count }}</td>
                                <td>{{ $data->category }}</td>
                                <td>{{ $data->title }}</td>


                                <td style="width: 20%; overflow: hidden; text-align: center;">

                                @can('academicnotice-list')
                                    <a class="btn btn-outline-secondary btn-sm"
                                       href="{{ route('academicnotice-mgmt.edit', [$data->id]) }}" data-placement="left"
                                       title="Edit">
                                        <i class="far fa-edit" style="font-size: 12px;color: #0000C0;"></i> Edit
                                    </a>
                                    <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')"
                                       href="{{ route('academicnotice-mgmt.remove', [$data->id]) }}"
                                       data-placement="left"
                                       title="Cancel">
                                        <i class="fas fa-trash" style="font-size: 12px;color: #7c151f;"></i> Delete
                                    </a>
                                    <a class="btn btn-outline-primary btn-sm"
                                       href="{{$data->file}}"  data-placement="left"
                                       title="Show">
                                        <i class="fas fa-eye" style="font-size: 12px;color: #0000C0;"></i> View
                                    </a>
                                @endcan

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


