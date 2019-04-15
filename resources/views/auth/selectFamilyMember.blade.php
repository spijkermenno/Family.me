{{-- Extending the main page layout (located at /recourses/views/layouts/app.blade.php) --}}
@extends('layouts.app')

@push('styles')
    {{-- Section for the page style (dont forget the <style> tags --}}
@endpush

@section('navigation')
    {{-- Section for the site navigation --}}
@endsection

@section('content')
    {{-- Section for the site content --}}

    <div id="wrapper" class="container-fluid bg-primary">
        <div class="row justify-content-center">
            @foreach($familyMembers as $familyMember)
                <div class="familyMember">
                    <a class="overlay" href="{{route('manageFamilyMember', ['id' => $familyMember->id])}}">
                        <i class="fa fa-pencil text-light fa-3x"></i>
                    </a>

                    @if($familyMember->filename != null)
                        <div class="box rounded-full bg-dark">
                            <img src="{{$familyMember->filename}}" alt="{{$familyMember->name}}"/>

                        </div>
                    @else
                        <div class="box rounded-full opaqueBackground">
                            <br/>
                        </div>
                    @endif
                    <div class="name text-light h4 mt-3">
                        <p>
                            {{$familyMember->name}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row justify-content-center mt-5">
            <div class="button h4 text-light pointer" id="manageFamilyMembers">
                {{trans('auth.manageAccounts')}}
            </div>
        </div>
    </div>
@endsection
