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
    <div class="container-fluid min-h-100 bg-light">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-8">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4 mt-3">
                        <div class="family-card">
                            <div class="image">
                                <img src="http://www.onzehost.com.br/images/test-img.jpg" alt="test image"/>
                            </div>
                            <div class="header">Test title</div>
                            <div class="content">{{trim_text($loremIpsum, 100)}}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4 mt-3">
                        <div class="family-card">
                            <div class="image">
                                <img src="http://www.onzehost.com.br/images/test-img.jpg" alt="test image"/>
                            </div>
                            <div class="header">Test title</div>
                            <div class="content">{{trim_text($loremIpsum, 100)}}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4 mt-3">
                        <div class="family-card">
                            <div class="image">
                                <img src="http://www.onzehost.com.br/images/test-img.jpg" alt="test image"/>
                            </div>
                            <div class="header">Test title</div>
                            <div class="content">{{trim_text($loremIpsum, 100)}}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4 mt-3">
                        <div class="family-card">
                            <div class="image">
                                <img src="http://www.onzehost.com.br/images/test-img.jpg" alt="test image"/>
                            </div>
                            <div class="header">Test title</div>
                            <div class="content">{{trim_text($loremIpsum, 100)}}</div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12 col-lg-6 col-xl-4 mt-3">
                <div class="calender">
                    <div class="month">
                        <ul>
                            <li class="prev">&#10094;</li>
                            <li class="next">&#10095;</li>
                            <li>
                                <p>{{trans('calender.'.strtolower($calender['month']))}}</p>
                                <span style="font-size:18px">{{$calender['year']}}</span>
                            </li>
                        </ul>
                    </div>

                    <ul class="weekdays">
                        <li>{{trans('calender.mo')}}</li>
                        <li>{{trans('calender.tu')}}</li>
                        <li>{{trans('calender.we')}}</li>
                        <li>{{trans('calender.th')}}</li>
                        <li>{{trans('calender.fr')}}</li>
                        <li>{{trans('calender.sa')}}</li>
                        <li>{{trans('calender.su')}}</li>
                    </ul>

                    <ul class="days">
                        @for($i = 1; $i <= $calender['daysInMonth']; $i++)
                            @if($i == $calender['dayInMonth'])
                                <li><span class="active">{{$i}}</span></li>
                            @else
                                <li>{{$i}}</li>
                            @endif
                        @endfor
                    </ul>

                </div>
            </div>
        </div>
    </div>
    {{-- Section for the site content --}}
@endsection
