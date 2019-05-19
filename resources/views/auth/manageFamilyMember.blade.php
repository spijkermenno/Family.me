{{-- Extending the main page layout (located at /recourses/views/layouts/app.blade.php) --}}
@extends('layouts.app')

@push('styles')
    {{-- Section for the page style (dont forget the <style> tags --}}
    <style>
        .custom-file-label {
            line-height: 2.3 !important;
        }

        .custom-file-label:after {
            height: unset !important;
            line-height: 2.3 !important;

            content: '{{trans('dictionary.browse')}}' !important;
            right: -5px !important;
        }
    </style>
@endpush

@section('content')
    {{-- Section for the site content --}}

    <div id="wrapper" class="container-fluid bg-primary">
        <div class="row justify-content-center">
            <div id="formfield">
                <div class="row justify-content-md-center">

                    <form method="POST" action="{{route('processFamilyMember')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="familyMemberId" value="{{$familyMember->id}}">
                        <div id="formfield-image" class="form-group text-center">
                            @if($familyMember->filename != null)
                                <div id="image-preview" class="box rounded-full bg-dark">
                                    <img src="{{ asset("storage/app/$familyMember->filename")}}"
                                         alt="{{$familyMember->name}}" id="image-preview-img"/>
                                </div>
                            @else
                                <div id="image-preview" class="box rounded-full opaqueBackground">

                                </div>
                            @endif
                        </div>

                        @if($familyMember->filename == null)
                            <div id="formfield-image" class="form-group">
                                <div id="label" class="row px-3 text-light">
                                    <label for="file" class=" text-left p-0">
                                        {{trans('auth.image')}}*
                                    </label>
                                </div>
                                <div class="custom-file rounded-full lightOpaqueBackground form-border p-4 overflow-hidden">
                                    <input type="file" name="userImage"
                                           onchange="$('#imageUpload').text(this.files[0].name); let img = document.createElement('img'); img.src = window.URL.createObjectURL(this.files[0]); document.getElementById('image-preview').appendChild(img);"
                                           class="custom-file-input h-100" id="validatedCustomFile">
                                    <label id="imageUpload" class="custom-file-label h-100"
                                           for="validatedCustomFile">{{trans('dictionary.chooseImage')}}</label>
                                </div>
                            </div>
                        @endif

                        <div id="formfield-name" class="form-group">
                            <div id="label" class="row px-3 text-light">
                                <label for="name" class=" text-left p-0">
                                    {{trans('auth.name')}}*
                                </label>
                            </div>
                            <input type="text"
                                   class="form-control rounded-full bg-light form-border p-4 {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   name="name" value="{{ $familyMember->name }}"
                                   id="name"
                                   placeholder="{{ trans('auth.name') }}" disabled>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div id="formfield-role" class="form-group">
                            <div id="label" class="row px-3 text-light">
                                <label for="role" class=" text-left p-0">
                                    {{trans('auth.role')}}
                                </label>
                            </div>
                            <select class="form-control rounded-top lightOpaqueBackground border-0 text-dark"
                                    name="role" id="role">
                                <option disabled="disabled" selected></option>
                                @foreach($roles as $role)
                                    <option value="{{$role['value']}}"
                                            @if($role['active'] == true) selected @endif>{{trans($role['translationText'])}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div id="formfield-gender" class="form-group">
                            <div id="label" class="row px-3 text-light">
                                <label for="role" class=" text-left p-0">
                                    {{trans('auth.gender')}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="male"
                                       @if($familyMember->gender == 'male') checked @endif>
                                <label class="form-check-label text-light" for="gender">
                                    {{trans('auth.male')}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="female"
                                       @if($familyMember->gender == 'female') checked @endif>
                                <label class="form-check-label text-light" for="gender">
                                    {{trans('auth.female')}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="other"
                                       @if($familyMember->gender == 'other') checked @endif>
                                <label class="form-check-label text-light" for="gender">
                                    {{trans('auth.otherGender')}}
                                </label>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-5">
                            <button type="submit" class="button border-0 h4 px-5 text-light">
                                {{trans('auth.saveFamilyMember')}}
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
