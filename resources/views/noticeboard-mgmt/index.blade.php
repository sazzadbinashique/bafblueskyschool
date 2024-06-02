@extends('noticeboard-mgmt.base')
@section('action-content')
    <!-- Main content -->

    <section class="content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <a type="button" href="{{ route('noticeboard-mgmt.create') }}" class="btn btn-primary">Create
                                New</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table id="image_datatable_backend" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Ser</th>
                            <th>Notice Image</th>
                            <th>Publication Date</th>
                            <th>Admin Name</th>
                            <th>Notice Title</th>
                            <th>Notice Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php $count = 1; @endphp
                        @foreach ($datas as $data)

                            <tr>
                                <td>{{ $count }}</td>
                                <td style="width: 60px; height: 60px; padding: 5px;">
                                    <img src="uploads/image/{{$data->notice_img}}" style="width: 100%; height: 100%;" alt="image">
                                </td>
                                <td>{{ $data->notice_publish_dt }}</td>
                                <td>{{ $data->notice_admin_name }}</td>
                                <td>{{ $data->notice_title }}</td>
                                <td>{{ $data->notice_description }}</td>  
                               

                                <td style="min-width: 150px;  text-align: center;">
                                    <a class="btn btn-outline-secondary btn-sm"
                                       href="{{ route('noticeboard-mgmt.edit', [$data->id]) }}" data-placement="left"
                                       title="Edit">
                                        <i class="far fa-edit" style="font-size: 12px;color: #0000C0;"></i> Edit
                                    </a>

                                    <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')"
                                       href="{{ route('noticeboard-mgmt.remove', [$data->id]) }}"
                                       data-placement="left"
                                       title="Cancel">
                                        <i class="fas fa-trash" style="font-size: 12px;color: #7c151f;"></i> Delete
                                    </a>

                                    <a class="btn btn-outline-primary btn-sm"
                                       href="{{ route('noticeboard-mgmt.show', [$data->id]) }}" data-placement="left"
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

