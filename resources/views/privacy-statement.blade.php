@extends('layouts.app')

@push('styles')

@endpush

@section('navigation')
    @include('components/navigation')
@endsection

@section('content')
    <div class="container pb-5">
        {!! trans('privacy.privacystatement') !!}
    </div>
@endsection
