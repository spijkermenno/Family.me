@extends('layouts.app')

@push('styles')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .invalid-feedback {
            color: whitesmoke;
            font-weight: normal !important;
        }
    </style>
@endpush

@section('content')
    <div class="bg-primary min-h-100 wrapper">
        <div class="container-fluid min-h-100">
            <div class="text-center">

                <div id="text" class="title_text">
                    <div class="display-1 pt-lg-3 pt-xl-3 pt-md-0 pt-sm-0 text-white bg-primary noselect"
                         id="title">
                        {{trans('dictionary.title')}}
                    </div>
                    <div class="display-5 mb-5 text-white-50 noselect" id="title">
                        {{trans('dictionary.slogan')}}
                    </div>
                </div>

                <div id="formfield">
                    <div class="row justify-content-md-center">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div id="familyname" class="form-group py-1">
                                    <div id="label" class="row px-3 text-light">
                                        <label for="familyname" class="col-6 text-left p-0">
                                            {{trans('auth.familyname')}}
                                        </label>
                                    </div>
                                    <input type="text"
                                           class="form-control rounded-full bg-light form-border p-4 {{ $errors->has('familyname') ? ' is-invalid' : '' }}"
                                           name="familyname" value="{{ old('familyname') }}" id="familyname"
                                           placeholder="{{ trans('auth.familyname') }}">
                                    @if ($errors->has('familyname'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('familyname') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group py-1">
                                    <div id="label" class="row px-3 text-light">
                                        <label for="email" class="col-6 text-left p-0">
                                            {{trans('auth.emailaddress')}}
                                        </label>
                                    </div>
                                    <input type="email"
                                           class="form-control rounded-full bg-light form-border p-4 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" id="emailadress"
                                           placeholder="{{ trans('auth.emailaddress') }}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group py-1">
                                    <div id="label" class="row px-3 text-light">
                                        <label for="familysize" class="col-6 text-left p-0">
                                            {{trans('auth.familysize')}}
                                        </label>
                                    </div>
                                    <input type="number" min="1" max="20" step="1"
                                           class="form-control rounded-full bg-light form-border p-4 {{ $errors->has('familysize') ? ' is-invalid' : '' }}"
                                           name="familysize" value="{{ old('familysize') }}" id="familysize"
                                           placeholder="{{ trans('auth.familysize') }}">
                                    @if ($errors->has('familysize'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('familysize') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group py-1">
                                    <div id="label" class="row px-3 text-light">
                                        <label for="password" class="col-6 text-left p-0">
                                            {{trans('auth.password')}}
                                        </label>
                                    </div>
                                    <input type="password"
                                           class="form-control rounded-full bg-light form-border p-4 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required id="password"
                                           placeholder="{{ trans('auth.password') }}">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group py-1">
                                    <div id="label" class="row px-3 text-light">
                                        <label for="password_confirm" class="col-6 text-left p-0">
                                            {{trans('auth.password_confirm')}}
                                        </label>
                                    </div>
                                    <input type="password"
                                           class="form-control rounded-full bg-light form-border p-4"
                                           name="password_confirmation" required id="password_confirm"
                                           placeholder="{{ trans('auth.password_confirm') }}">
                                </div>

                                <div id="buttons" class="row py-1">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <button type="submit"
                                                class="btn btn-lg btn-dark text-light submit-button w-100">{{ trans('auth.register_new_account') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="register-block mb-5 mt-3">
                    <p class="text-light">{{ trans('auth.allready_member') }}</p>
                    <div class="row justify-content-md-center">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <a href="{{route('login')}}"
                               class="register-now w-100">{{ trans('auth.login_now') }}</a>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('scripts')

@endpush

{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input
                                id="name" type="text"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                name="name"
                                value="{{ old('name') }}"
                                required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
