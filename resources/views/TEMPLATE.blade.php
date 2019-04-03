{{-- Extending the main page layout (located at /recourses/views/layouts/app.blade.php) --}}
@extends('layouts.app')

@push('styles')
    {{-- Section for the page style (dont forget the <style> tags --}}
@endpush

@section('navigation')
    {{-- Section for the site navigation --}}
    @include('components/navigation')
@endsection

@section('content')
    {{-- Section for the site content --}}
@endsection
