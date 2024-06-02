@extends('layouts.app')
@section('content')
    <!-- /.login-logo -->
    <div class="login-box" style="width: 420px;">
        <div class="card card-outline card-primary" style="background-color: #f2fcff;">
            <div class="card-header text-center">
                <!-- <img src="{{ asset('manual_img_logo/goldeneagleLogo_hover.png') }}" alt="Logo" class="logo-image" style="width: 100px; height: 120px;"> -->
                <a href="" class="h1">{{ __('appcustom.div_header') }}</a>
            </div>

            <div class="card-body">
                <p class="login-box-msg">Welcome to {{ __('appcustom.div_header') }}</p>

                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email">
                            <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <input id="password" type="password" class="form-control" name="password" required placeholder="Enter your password">
                            <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                            </div>
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
