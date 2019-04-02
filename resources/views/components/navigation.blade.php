<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="/">Family</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-dropdown">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mobile-dropdown">
        <ul class="navbar-nav mr-auto" id="desktop">
            @if(isset($menu_items))
                @foreach($menu_items as $menu_item)
                    <li class="nav-item {{$menu_item->active}}">
                        <a class="nav-link" href="#">{{$menu_item->name}}</a>
                    </li>
                @endforeach
            @endif
        </ul>

        @if(Auth::check())
            <ul class="navbar-nav mr-auto d-none d-sm-block d-md-block d-lg-none d-xl-none" id="mobile">
                <li class="nav-item">
                    <a class="nav-link" href="/logout"><i class="fa fa-sign-out"></i> {{trans('auth.logout')}} </a>
                </li>
            </ul>

            <div class="form-inline d-none d-lg-flex d-xl-flex text-light">
                <div class="dropdown mx-5">
                    <a class="dropdown-color noselect" id="userDropdown" data-toggle="dropdown"
                       style="cursor: pointer;">
                        {{Auth::user()->familyname}}
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu shadow">
                        <a class="dropdown-item" href="/logout">
                            {{trans('auth.logout')}}
                        </a>
                    </div>
                </div>
            </div>

            <form class="form-inline input-group my-2 my-lg-0 mw d-none d-lg-flex d-xl-flex bg-white rounded-full">
                <input class="form-control rounded-full border-0 py-0" type="search"
                       placeholder="{{trans('dictionary.search')}}"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-outline-dark my-2 my-sm-0 px-3 border-0 rounded-full" type="submit"><i
                                class="fa fa-search"></i></button>
                </div>
            </form>
        @else
            <div class="form-inline">
                <a class="nav-link text-light" href="{{route('login')}}">{{trans('auth.sign_in')}}</a>
            </div>
        @endif


    </div>
</nav>