@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
@yield('css')
@stop

@section('body_class', 'register-page')

@section('body')
<div class="register-box">
    <div class="logo-login">
      <img src="{{ asset('images/logo.png') }}" width="350">
    </div>
    <div class="register-box-body">
        <p class="login-box-msg">Criar conta</p>
        <form action="{{ route('register') }}" method="post">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nome completo">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="E-mail">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
                <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="Usuário">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" name="password" class="form-control" placeholder="Senha">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Repetir senha">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-flat">Criar</button>
        </form>
        <div class="auth-links">
            <a href="{{ url(config('adminlte.login_url', 'login')) }}" class="text-center">Já possuo conta criada</a>
        </div>
    </div>
    <!-- /.form-box -->
</div><!-- /.register-box -->
@stop

@section('adminlte_js')
@yield('js')
@stop