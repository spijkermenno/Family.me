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

        <a class="position-absolute opaqueText pointer" style="top: 1rem; right: 1rem;" href="/logout">
            <i class="fa fa-3x fa-times" data-toggle="tooltip" data-placement="bottom"
               title="{{trans('auth.logout')}}"></i>
        </a>

        <div class="row justify-content-center">
            @foreach($familyMembers as $familyMember)
                <div class="familyMember pointer mx-4">
                    <form class="overlay-manage" method="POST" action="{{route('manageFamilyMember')}}"
                          onclick="this.submit()">
                        @csrf
                        <input type="hidden" name="id" value="{{$familyMember->id}}"/>
                    </form>

                    <form class="overlay-browse" method="POST" action="{{route('selectFamilyMember')}}"
                          onclick="this.submit()">
                        @csrf
                        <input type="hidden" name="id" value="{{$familyMember->id}}"/>
                    </form>

                    @if($familyMember->filename != null)
                        <div class="box rounded-full bg-dark">
                            <img src="{{asset("storage/app/$familyMember->filename")}}" alt="{{$familyMember->name}}"/>

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

            <div class="button h4 text-light pointer" id="browseFamilyMembers" style="display: none">
                {{trans('auth.browseAccounts')}}
            </div>
        </div>

        <form id="manageFamilyMembersForm" class="d-none" method="post" action="{{route('manageFamilyMember')}}">

        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection