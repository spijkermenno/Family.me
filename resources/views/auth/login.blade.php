@extends('layouts.app')

@push('styles')
    <style>
        .invalid-feedback {
            color: whitesmoke;
            font-weight: normal !important;
        }
    </style>
@endpush

@section('content')
    <div class="bg-primary min-h-100 wrapper">
        <div class="container-fluid min-h-100 pt-5">
            <div class="text-center mt-3 pt-3">

                <div id="text">
                    <div class="display-1 mt-5 pt-5 text-white noselect" id="title">
                        {{trans('dictionary.title')}}
                    </div>
                    <div class="display-5 mb-5 text-white-50 noselect" id="title">
                        {{trans('dictionary.slogan')}}
                    </div>
                </div>

                <div id="formfield">
                    <div class="row justify-content-md-center">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div id="username" class="form-group py-1">
                                    <div class="row px-3">
                                        <label for="emailadress"
                                               class="col-6 text-left p-0">{{trans('auth.emailaddress')}}</label>
                                        <label class="col-6 text-right text-dark p-0"><a class="text-dark" href="{{route('password.request')}}">{{trans('auth.forgot_password')}}</a></label>
                                    </div>
                                    <input type="email"
                                           class="form-control rounded-full bg-light form-border p-4 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email"
                                           value="{{ old('email') }}"
                                           id="emailadress"
                                           placeholder="{{ trans('auth.emailaddress') }}">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                                <div id="password" class="form-group">
                                    <label for="password"
                                           class="d-block text-left pl-1">{{trans('auth.password')}}</label>

                                    <input type="password"
                                           class="form-control rounded-full bg-light form-border p-4 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password"
                                           required
                                           id="password"
                                           placeholder="{{ trans('auth.password') }}">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                                <div id="buttons" class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <button type="submit"
                                                class="btn btn-lg btn-dark submit-button w-100">{{ trans('auth.sign_in') }}</button>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                        <div class="border btn w-100 p-3">
                                            {{ trans('auth.no_account') }} &nbsp;
                                            <a href="{{route('register')}}"
                                               class="text-light">{{ trans('auth.register_direct') }}</a>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{--<div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>

@endsection
