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

                <div id="message">
                    <div class="row justify-content-md-center text-light">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ trans('auth.verify_mail_send') }}
                                </div>
                            @endif

                            <p class="h4">{{ trans('auth.check_email_verify') }}</p>
                            <p class="h5">{{ trans('auth.not_recieved_email_verify') }}, <a class="text-info"
                                                                                            href="{{ route('verification.resend') }}">{{ trans('auth.request_new') }}</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
--}}