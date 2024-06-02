@extends('latestinfo-mgmt.base')
@section('action-content')
    <!-- Main content -->

    <section class="content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <a type="button" href="{{ route('latestinfo-mgmt.create') }}" class="btn btn-primary">Create
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
                            <th>Pdf</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php $count = 1; @endphp
                        @foreach ($datas as $data)

                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $data->title }}</td>
                                <td>
                                    @if($data->latest_news_doc !='') 
                                    <a href="{{url('/uploads', $data->latest_news_doc)}}" class="btn bg-my" target="_blank">
                                     <i class="fa fa-eye" style="font-size:28px; color:red"></i>                              
                                    </a>
                                    @else
                                    @endif 
                                </td>
                                <td>{{ dMY($data->created_at) }}</td>

                                <td style="width: 200px;  text-align: center;">

                                @can('latestinfo-list')
                                    <a class="btn btn-outline-secondary btn-sm"
                                       href="{{ route('latestinfo-mgmt.edit', [$data->id]) }}" data-placement="left"
                                       title="Edit">
                                        <i class="far fa-edit" style="font-size: 12px;color: #0000C0;"></i> Edit
                                    </a>
                                    <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')"
                                       href="{{ route('latestinfo-mgmt.remove', [$data->id]) }}"
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


