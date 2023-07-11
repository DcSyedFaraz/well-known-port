


@extends('layouts.app')

@section('title', 'Login')
@section('description', '')
@section('canonical', config('app.url') . Request::path() )

@section('content')
    <div class="login-box" style="width: 32rem;">
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
                    {{ trans('global.reset_password') }}
                </p>

                @include('partials.backend.message')


                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" name="email" value="{{ $email ?? old('email') }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ trans('global.login_password') }}" autocomplete="new-password">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ trans('global.login_password_confirmation') }}">
                    </div>

                    <div class="row">
                        <div class="col-6">
                            @if (auth()->user())
                                <p class="pt-2">
                                    <a href="{{ route('login') }}">
                                        {{ trans('global.back') }}
                                    </a>
                                </p>
                            @else
                                <p class="pt-2">
                                    <a href="{{ route('login') }}">
                                        {{ trans('global.back_to_login') }}
                                    </a>
                                </p>
                            @endif
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
