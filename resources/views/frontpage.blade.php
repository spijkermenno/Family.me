@extends('layouts.app')

@section('navigation')

@endsection

@section('content')
    <div class="wrapper agenda-middle bg-primary">
        <div class="row">
            <div class="d-none d-lg-block d-xl-block d-sm-none d-md-none col-lg-6 col-xl-6 ex-h-100 position-relative">
                <div class="floatingElement text-light">
                    <div class="first">
                        <i class="d-inline-block fa fa-cloud-download fa-3x mr-2"></i>
                        <p class="d-inline-block h3 p-0 m-0 va-top">{!! trans('dictionary.connected_cloud') !!}</p>
                    </div>
                    <div class="second">
                        <i class="fa fa-calendar fa-3x mr-2 d-inline-block"></i>
                        <p class="d-inline-block h3 p-0 m-0 va-top">{!! trans('dictionary.planner_uptodate') !!}</p>
                    </div>
                    <div class="third">
                        <i class="fa fa-group fa-3x mr-2 d-inline-block"></i>
                        <p class="d-inline-block h3 p-0 m-0 va-top">{!! trans('dictionary.whole_family') !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6 ex-h-100 bg-light position-relative">
                {{--Login and Register buttons--}}
                <div class="floatingElement text-dark">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{asset('/images/agenda.png')}}"
                                 style="height: 9rem; position:absolute; left: -1.5rem; top: -7.5rem">
                            <h2>{!! trans('dictionary.family_offer') !!}</h2>
                            <h5 class="">{{trans('dictionary.register_today')}}</h5>
                        </div>
                        <div class="col-12 mb-3">
                            <a href="{{route('register')}}" class="btn btn-outline-primary px-5 w-100 rounded-full">{{trans('auth.register')}}</a>
                        </div>
                        <div class="col-12">
                            <a href="{{route('login')}}" class="btn btn-primary text-light px-5 w-100 rounded-full">{{trans('auth.sign_in')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>

    </style>
@endpush

@push('scripts')

@endpush

