{{-- Extending the main page layout (located at /recourses/views/layouts/app.blade.php) --}}
@extends('layouts.app')

@push('styles')
    {{-- Section for the page style (dont forget the <style> tags --}}
    <style>
        #wrapper {
            height: 100vh;
            padding: 10rem 1rem;
        }

        .opaqueBackground {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .opaqueBackground:hover {
            background-color: rgba(0, 0, 0, 0.2);
        }

        .familyMember {
            display: inline-block;
            margin: 1rem;
        }

        .familyMember .name {
            text-align: center;
        }

        .familyMember .box {
            display: inline-block;
            width: 10rem;
            height: 10rem;

            transition: background-color 150ms;

            overflow: hidden;
        }

        .familyMember .box img {
            width: 150%;
            margin: 0 -25%;
        }

        .familyMember .box:hover img {
            opacity: 0.9;
        }

        .button {
            display: inline-block;
            padding: 1rem;

            background-color: rgba(0, 0, 0, 0.2);
            color: #e0e0e0;

            -webkit-border-radius: 1rem;
            -moz-border-radius: 1rem;
            border-radius: 1rem;

            transition: background-color 150ms;
        }

        .button:hover {
            background-color: rgba(0, 0, 0, 0.3);
            color: #eee;
        }
    </style>
@endpush

@section('navigation')
    {{-- Section for the site navigation --}}
    {{-- @include('components/navigation') --}}
@endsection

@section('content')
    {{-- Section for the site content --}}
    <div id="wrapper" class="container-fluid bg-primary">
        <div class="row justify-content-center">
            @foreach($familyMembers as $familyMember)
                <div class="familyMember">
                    <div class="box @if($familyMember->img != null) bg-dark @else opaqueBackground @endif">
                        <img src="{{$familyMember->img}}" alt=""/>
                    </div>
                    <div class="name text-light h4 mt-3">
                        {{$familyMember->name}}
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row justify-content-center mt-5">
            <div class="button h4">
                {{trans('auth.manageAccounts')}}
            </div>
        </div>
    </div>
@endsection
