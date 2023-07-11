@extends('layouts.app')

@section('title', 'Login')
@section('description', '')
@section('canonical', config('app.url') . Request::path() )

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <div class="login-logo">
                <p>
                    {{ config('app.name') }}
                </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body login-card-body">

                <p class="login-box-msg">
                    {{ trans('global.login') }}
                </p>

                @include('partials.backend.message')

                {{-- @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                @endif --}}

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" name="email" value="{{ old('email', null) }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">{{ trans('global.remember_me') }}</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                {{ trans('global.login') }}
                            </button>
                        </div>
                    </div>
                </form>
                @if(Route::has('password.request'))
                    <p class="mb-1">
                        <a href="{{ route('password.request') }}">
                            {{ trans('global.forgot_password') }}
                        </a>
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
