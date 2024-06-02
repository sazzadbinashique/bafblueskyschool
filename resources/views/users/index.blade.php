@extends('users.base')
@section('action-content')
<!-- Main content -->

<section class="content">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <a type="button" href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table id="user_datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Ser No</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th >Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php $count = 1; @endphp
                    @foreach ($data as $key => $user)

                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                            @endif
                        </td>
                        <td style="min-width: 50px;  text-align: center;">
                            <a
                                href="{{ route('users.show',$user->id) }}" data-placement="left"
                                title="Show">
                                <i class="fas fa-eye fa-lg" style="margin-right: 10px;"></i>
                            </a>
                            @can('user-edit')
                            <a href="{{ route('users.edit',$user->id) }}" data-placement="left"
                               title="Edit">
                                <i class="far fa-edit fa-lg" style="margin-right: 10px;"></i>
                            </a>
                            @endcan
                            @can('user-delete')
                            <a onclick="return confirm('Are you sure?')"
                               href="{{ route('users.remove', [$user->id]) }}" data-placement="left"
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




@endsection




