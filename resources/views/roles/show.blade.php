@extends('users.base')
@section('action-content')

<section class="content">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <div class="pull-right">
                        @can('role-create')<a type="button" href="{{ route('roles.create') }}" class="btn btn-primary">Add New Role</a>@endcan
                        @can('role-list')<a type="button" href="{{ route('roles.index') }}" class="btn btn-primary">Role List</a>@endcan
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


    <div class="card">
        <div class="card-body">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role Name:</strong>
                    {{ $role->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permissions:</strong>
                    @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                    <label style="background-color: transparent; color: #333; padding: 10px 15px; border-radius: 20px; border: 2px solid #333; font-size: 1rem;">{{ $v->name }},</label>
                    @endforeach
                    @endif
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}"> Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection
