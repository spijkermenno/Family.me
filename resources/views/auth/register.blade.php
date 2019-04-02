@extends('layouts.app')

@push('styles')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endpush

@section('content')
    <div class="gradient-primary min-h-100 pt-5 wrapper">
        <div class="container mt-1 pt-1">
            <div class="text-center mt-1 pt-1">

                <div class="row justify-content-center">
                    <div class="col-10 col-md-5 col-lg-5">
                        <div class="display-5 text-white-50 text-left" id="title">
                            {{trans('auth.register_now')}}
                        </div>
                        <div class="display-1 text-white" id="title">
                            Family
                        </div>
                        <div class="display-5 mb-5 text-white-50 text-right" id="title">
                            {{trans('dictionary.slogan')}}
                        </div>
                    </div>
                </div>

                <div class="row justify-content-md-center">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group rounded-full">
                                <input type="text"
                                       class="form-control bg-light rounded-pill form-border {{ $errors->has('familyname') ? ' is-invalid' : '' }}"
                                       name="familyname" value="{{ old('familyname') }}" id="familyname"
                                       placeholder="{{ trans('auth.familyname') }}">
                                @if ($errors->has('familyname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('familyname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group rounded-full">
                                <input type="email"
                                       class="form-control bg-light rounded-pill form-border {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email" value="{{ old('email') }}" id="emailadress"
                                       placeholder="{{ trans('auth.emailaddress') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group rounded-full">
                                <input type="number" min="1" max="20" step="1"
                                       class="form-control rounded-pill bg-light form-border {{ $errors->has('familysize') ? ' is-invalid' : '' }}"
                                       name="familysize" value="{{ old('familysize') }}" id="familysize"
                                       placeholder="{{ trans('auth.familysize') }}">
                                @if ($errors->has('familysize'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('familysize') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group rounded-full">
                                <input type="password"
                                       class="form-control rounded-pill bg-light form-border {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required id="password"
                                       placeholder="{{ trans('auth.password') }}">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group rounded-full">
                                <input type="password"
                                       class="form-control rounded-pill bg-light form-border"
                                       name="password_confirmation" required id="password_confirm"
                                       placeholder="{{ trans('auth.password_confirm') }}">
                            </div>

                            <div class="row">
                                <span class="col-1"></span>
                                <button type="submit" class="btn btn-lg btn-outline-dark submit-button col-10">{{ trans('auth.register_new_account') }}</button>
                                <p class="col-12 text-dark mt-2 text-center">
                                    Heeft u al een account?
                                    <a class="text-secondary" href="{{route('login')}}">Inloggen!</a>
                                </p>
                            </div>
                    </div>
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
