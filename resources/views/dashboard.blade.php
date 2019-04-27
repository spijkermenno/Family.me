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
    <div class="container-fluid min-h-100 bg-info">
        <div class="row pt-3">
            <div class="col-2">

                <div class="family-card">
                    <div class="image">
                        <img src="http://www.onzehost.com.br/images/test-img.jpg" alt="test image" />
                    </div>
                    <div class="header">Test title</div>
                    <div class="content">{{trim_text($loremIpsum, 100)}}</div>
                </div>

            </div>
        </div>
    </div>
    {{-- Section for the site content --}}
@endsection
