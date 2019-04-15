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

        </div>

        <div class="row justify-content-center mt-5">
            <button type="submit" class="button border-0 h4 text-light">
                {{trans('auth.saveFamilyMember')}}
            </button>
        </div>
    </div>
@endsection
