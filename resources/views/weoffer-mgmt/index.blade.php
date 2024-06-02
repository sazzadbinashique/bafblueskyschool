@extends('weoffer-mgmt.base')
@section('action-content')
    <!-- Main content -->

    <section class="content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <a type="button" href="{{ route('weoffer-mgmt.create') }}" class="btn btn-primary">Create
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
                            <th>Title</th>
                            <th>Offer Detail</th>
                            <th>Image 1</th>
                            <th>Image 2</th>
                            <th>Image 3</th>
                            <th>Image 4</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php $count = 1; @endphp
                        @foreach ($datas as $data)

                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $data->offer_title }}</td>
                                <td>{{ $data->offer_detail }}</td>
                                <td style="width: 60px; height: 60px; padding: 5px;">
                                    <img src="{{$data->image_1}}" style="width: 100%; height: 100%;" alt="image">
                                </td>
                                <td style="width: 60px; height: 60px; padding: 5px;">
                                    <img src="{{$data->image_2}}" style="width: 100%; height: 100%;" alt="image">
                                </td>
                                <td style="width: 60px; height: 60px; padding: 5px;">
                                    <img src="{{$data->image_3}}" style="width: 100%; height: 100%;" alt="image">
                                </td>
                                <td style="width: 60px; height: 60px; padding: 5px;">
                                    <img src="{{$data->image_4}}" style="width: 100%; height: 100%;" alt="image">
                                </td>
                                <td style="width: 200px;  text-align: center;">


                                    <a class="btn btn-outline-secondary btn-sm"
                                       href="{{ route('weoffer-mgmt.edit', [$data->id]) }}" data-placement="left"
                                       title="Edit">
                                        <i class="far fa-edit" style="font-size: 12px;color: #0000C0;"></i> Edit
                                    </a>
                                    <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')"
                                       href="{{ route('weoffer-mgmt.remove', [$data->id]) }}"
                                       data-placement="left"
                                       title="Cancel">
                                        <i class="fas fa-trash" style="font-size: 12px;color: #7c151f;"></i> Delete
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


