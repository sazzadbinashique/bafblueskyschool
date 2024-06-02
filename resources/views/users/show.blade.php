@extends('users.base')
@section('action-content')

<section class="content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class="pull-right">
                            @can('role-create')<a type="button" href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>@endcan
                            @can('role-list')<a type="button" href="{{ route('users.index') }}" class="btn btn-primary">User List</a>@endcan
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-info-circle"></i>
                User Detail
            </h3>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 p-3 px-3">
                        <table class="table table-sm table-bordered">
                            <tbody>
                            <tr>
                                <th  width="20%">User Name</th>
                                <td >{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th  width="20%">Email</th>
                                <td >   {{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th  width="20%">Roles</th>
                                @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                <td class="badge badge-success">{{ $v }}</td>
                                @endforeach
                                @endif
                            </tr>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-5">
                <a  href="{{ route('users.index') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
            </div>
        </div>
    </div>

@endsection
