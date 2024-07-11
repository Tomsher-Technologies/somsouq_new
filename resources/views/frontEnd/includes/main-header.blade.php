<header class="main-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-8 col-md-5 order-2 order-md-1">
                <div class="header-start">
                    <div class="select-location d-none d-md-block">
                        <div class="dropdown left">
                            <button href="#" class="dropdown-toggle dropbtn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-geo-alt"></i>
                                @session('location')
                                    {{ CommonFunction::getStateName(session('location')) }}
                                @else
                                    Location
                                @endsession
                            </button>
                            <div class="dropdown-content">
                                <ul>
                                    <li><a class="dropdown-item" href="{{ route('home.location', ['location' => 0]) }}">All Location</a></li>
                                    @foreach(CommonFunction::getState() as $key => $state)
                                        <li class="@if($loop->last) {{ "border-0" }}@endif">
                                            <a class="dropdown-item" href="{{ route('home.location', ['location' => $key]) }}"><span>{{ $state }}</span>
                                                @if($key == session('location')) <i class="bi bi-check-lg"></i> @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="select-language">
                        <div class="dropdown location-down">
                            <span class="d-inline-block me-1"><i class="bi bi-globe"></i></span>
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                English
                            </a>
{{--                            <span class="d-inline-block d-md-none"><i class="bi bi-globe"></i></span>--}}
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">English</a></li>
                                <li><a class="dropdown-item" href="#">Omaliyeed</a></li>
                                <li class="border-0"><a class="dropdown-item" href="#">العربية</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 col-md-2 text-center order-1 order-md-2">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('assets/frontEnd/images/logo.png') }}" class="rounded-3" alt="Logo">
                </a>
            </div>
            <div class="col-6 col-md-5 text-end d-none d-md-block order-3 order-md-13">
                <div class="header-end">

                    <div class="account-login">
                        @auth
                        <a href="{{ route('wishlist.index') }}" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        @endauth

                        <div class="user-avatar">
                            <img src="{{ uploaded_asset_profile(auth()->user()->image ?? "") }}" alt="{{ auth()->user()->name ?? "" }}" class="rounded-circle">
                        </div>
                        @guest
                            <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Log in or sign up</a>
                        @endguest
                        @auth
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if(empty(auth()->user()->name))
                                        {{ auth()->user()->username }}
                                    @else
                                        {{ ucfirst(auth()->user()->name) }}
                                    @endif
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('my-account.index') }}">My Account</a></li>

                                    <li class="border-0"><a class="dropdown-item" href="{{ route('front.logout') }}">Logout</a></li>
                                </ul>
                            </div>
                        @endauth


                    </div>
                    <a href="{{ route('post.create') }}" class="btn btn-primary" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @endguest>Post Free Ad</a>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="mob-location d-block d-md-none">
    <div class="container">
        <div class="row">
            <div class="select-location">
                <div class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Find anything in
                        @session('location')
                            <b>{{ CommonFunction::getStateName(session('location')) }}</b>
                        @else
                            <b>Location</b>
                        @endsession

                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('home.location', ['location' => 0]) }}">All Location</a></li>
                        @foreach(CommonFunction::getState() as $key => $state)
                            <li class="@if($loop->last) {{ "border-0" }}@endif"><a class="dropdown-item" href="{{ route('home.location', ['location' => $key]) }}">{{ $state }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
