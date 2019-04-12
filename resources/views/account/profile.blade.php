{{-- Extending the main page layout (located at /recourses/views/layouts/app.blade.php) --}}
@extends('layouts.app')

@push('styles')
    {{-- Section for the page style (dont forget the <style> tags --}}
    <style>

    </style>
@endpush

@section('navigation')
    {{-- Section for the site navigation --}}
    @include('components/navigation')
@endsection

@section('content')
    {{-- Section for the site content --}}
    <div class="container p-2">
        <div class="row">
            <div class="col-4 p-3 border">
                <p class="h2">{{trans('dictionary.familymembers')}}</p>
                @foreach($FamilyMembers as $FamilyMember)
                    <p class="h4">{{$FamilyMember->name}}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
