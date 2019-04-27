{{-- Extending the main page layout (located at /recourses/views/layouts/app.blade.php) --}}
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
    {{-- Section for the site content --}}

    <div class="bg-primary min-h-100 wrapper pt-5">
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
                            <form method="POST" action="{{ route('RegisterFamilyMembers') }}">
                                @csrf

                                @for($i = 0, $x = $familySize; $i < $x; $i++)
                                    <div id="familyname" class="form-group py-1">
                                        <div id="label" class="row px-3 text-light">
                                            <label for="familyname" class="col-6 text-left p-0">
                                                {{trans('auth.familymember')}} {{($i + 1)}}
                                            </label>
                                        </div>
                                        <input type="text"
                                               class="form-control rounded-full lightOpaqueBackground form-border p-4 {{ $errors->has('familyname') ? ' is-invalid' : '' }}"
                                               name="familyname[{{$i}}][name]" value="{{ old('familyname') }}"
                                               id="familyname"
                                               placeholder="{{ trans('auth.memberName') }}">
                                        @if ($errors->has('familyname'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('familyname') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                @endfor
                                <div id="buttons" class="row py-1">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <button type="submit"
                                                class="btn btn-lg darkOpaqueBackground text-light submit-button w-100">{{ trans('auth.register_familymembers') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('scripts')

@endpush
