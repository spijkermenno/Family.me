@extends('layouts.app')

@section('content')
    <div class="bg-primary min-h-100 wrapper">
        <div class="container-fluid min-h-100 pt-lg-5 pt-xl-5 pt-md-0 pt-sm-0">
            <div class="text-center mt-3 pt-3">

                <div id="text" class="title_text">
                    <div class="display-1 mt-5 pt-lg-5 pt-xl-5 pt-md-0 pt-sm-0 text-white bg-primary noselect"
                         id="title">
                        {{trans('dictionary.title')}}
                    </div>
                    <div class="display-5 mb-5 text-white-50 noselect" id="title">
                        {{trans('dictionary.slogan')}}
                    </div>
                </div>

                <div id="formfields">
                    <div class="row justify-content-md-center">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div id="username" class="form-group py-1">
                                    <div id="labels" class="row px-3 text-light">
                                        <label for="emailadress" class="col-6 text-left p-0">
                                            {{trans('auth.emailaddress')}}
                                        </label>
                                    </div>
                                    <div id="input">
                                        <input type="email"
                                               class="form-control rounded-full bg-light form-border p-4 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email"
                                               value="{{ old('email') }}"
                                               id="emailadress"
                                               placeholder="{{ trans('auth.emailaddress') }}">
                                    </div>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div id="password" class="form-group py-1">
                                    <div id="labels" class="row px-3 text-light">
                                        <label for="password" class="col-6 text-left p-0">
                                            {{trans('auth.password')}}
                                        </label>
                                    </div>
                                    <div id="input">
                                        <input type="password"
                                               class="form-control rounded-full bg-light form-border p-4 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="password"
                                               id="password"
                                               placeholder="{{ trans('auth.password') }}">
                                    </div>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div id="password_confirm" class="form-group py-1">
                                    <div id="labels" class="row px-3 text-light">
                                        <label for="password_confirm" class="col-6 text-left p-0">
                                            {{trans('auth.password_confirm')}}
                                        </label>
                                    </div>
                                    <div id="input">
                                        <input type="password"
                                               class="form-control rounded-full bg-light form-border p-4 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="password_confirmation"
                                               id="password_confirm"
                                               placeholder="{{ trans('auth.password_confirm') }}">
                                    </div>
                                </div>

                                <div id="buttons" class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <button type="submit"
                                                class="btn btn-lg btn-dark text-light submit-button w-100">{{ trans('auth.reset_password') }}</button>
                                    </div>
                                </div>

                                @if (session('status'))
                                    <div class="mt-2">
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
@endsection
