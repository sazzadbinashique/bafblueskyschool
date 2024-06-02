@extends('roles.base')
@section('action-content')

<section class="content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class="pull-right">
                            @can('role-list')<a type="button" href="{{ route('roles.index') }}" class="btn btn-primary">Role
                                List</a>@endcan
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-edit"></i>
                Role Edit
            </h3>

        </div>
        <div class="col-md-12">
                <form role="form" method="POST" action="{{ route('roles.store') }}">
                    {{ csrf_field() }}
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Role Name: <span style="color:#ff0000">*</span></strong>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Permission: <span style="color:#ff0000">*</span></strong>
                            <br/>
                            <div class="form-group">

                                @foreach($permission as $value)

                                <label class="col-sm-2 control-label">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>

                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="btn-group mr-2">
                        <a href="{{ route('roles.index') }}" class=" btn btn-primary " data-toggle="tooltip"
                           data-placement="left" title="edit">Back</a>
                    </div>
                    <button type="submit" class="btn btn-primary "> Update</button>
                </div>
            </form>

        </div>
    </div>


    @endsection