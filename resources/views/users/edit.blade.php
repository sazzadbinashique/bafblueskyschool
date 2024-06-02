@extends('users.base')
@section('action-content')

<section class="content">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class="pull-right">
                            <a type="button" href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>
                            <a type="button" href="{{ route('users.index') }}" class="btn btn-primary">User List</a>
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


    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('users.update', $user->id) }}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    User Information Edit
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
                                            <div class="form-group">
                                                <strong>User Name: <span style="color:#ff0000">*</span></strong>
                                                <!-- {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!} -->
                                                <input type="text" name="name" value="{{$user->name}}" placeholder="name" class="form-control" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <strong>Email: <span style="color:#ff0000">*</span></strong>
                                                <!-- {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!} -->
                                                <input type="text" name="email" value="{{$user->email}}" placeholder="email" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <strong>Password: <span style="color:#ff0000">*</span></strong>
                                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control', 'required' =>'true')) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <strong>Confirm Password: <span style="color:#ff0000">*</span></strong>
                                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' =>
                                                'form-control', 'required' =>'true')) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <strong>Role: <span style="color:#ff0000">*</span></strong>
                                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="btn-group mr-2">
                    <a href="{{ route('users.index') }}" class=" btn btn-primary " data-toggle="tooltip"  data-placement="left" title="edit">Back</a>
                </div>
                <button type="submit" class="btn btn-primary "> Update</button>
            </div>
        </form>

    </div>
    @endsection
