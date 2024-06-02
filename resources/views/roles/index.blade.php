@extends('roles.base')
@section('action-content')

<section class="content">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <a type="button" href="{{ route('roles.create') }}" class="btn btn-primary">Add New Role</a>
                    </div>
                </div>

            </div>
        </div>
    </div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table id="role_datatable" class="table table-striped table-bordered">

                    <thead>
                    <tr>

                        <th>Ser No</th>
                        <th>Role Name</th>
                        <th >Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php $count = 1; @endphp
                    @foreach ($roles as $key => $role)

                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $role->name }}</td>
                        <td style="min-width: 50px;  text-align: center;">
                            <a
                                href="{{ route('roles.show',$role->id) }}" data-placement="left"
                                title="Show">
                                <i class="fas fa-eye fa-lg" style="margin-right: 10px;"></i>
                            </a>
                            @can('role-edit')
                            <a href="{{ route('roles.edit',$role->id) }}" data-placement="left"
                               title="Edit">
                                <i class="far fa-edit fa-lg" style="margin-right: 10px;"></i>
                            </a>
                            @endcan
                            @can('role-delete')
                            <a onclick="return confirm('Are you sure?')"
                               href="{{ route('roles.remove', [$role->id]) }}" data-placement="left"
                               title="Cancel">
                                <i class="fas fa-trash fa-lg"></i>
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



{!! $roles->render() !!}

@endsection
