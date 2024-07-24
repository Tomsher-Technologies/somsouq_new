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
                                    {{ CommonFunction::getStateNameById(session('location')) }}
                                @else
                                    {{ __('home.location') }}
                                @endsession
                            </button>
                            <div class="dropdown-content">
                                <ul>
                                    <li><a class="dropdown-item" href="{{ route('location', ['location' => 0]) }}">{{ __('home.all_location') }}</a></li>
                                    @foreach(CommonFunction::getState() as $state)
                                        <li class="@if($loop->last) {{ "border-0" }}@endif">
                                            <a class="dropdown-item" href="{{ route('location', ['location' => $state->id]) }}"><span>{{ $state->getTranslation('name', App::getLocale() ?? 'en') }}</span>
                                                @if($state->id == session('location')) <i class="bi bi-check-lg"></i> @endif
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
                                @session('locale')
                                {{ LaravelLocalization::getCurrentLocaleNative() }}
                                @else
                                    English
                                @endsession

                            </a>
{{--                            <span class="d-inline-block d-md-none"><i class="bi bi-globe"></i></span>--}}
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('lang', ['lang' => 'en']) }}">English</a></li>
                                <li><a class="dropdown-item" href="{{ route('lang', ['lang' => 'so']) }}">Somali</a></li>
                                <li class="border-0"><a class="dropdown-item" href="{{ route('lang', ['lang' => 'ar']) }}">العربية</a></li>
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
                            <img src="{{ uploaded_asset_profile(webUser()->image ?? "") }}" alt="{{ webUser()->name ?? "" }}" class="rounded-circle">
                        </div>
                        @guest
                            <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">{{ __('home.log_in_sign_up') }}</a>
                        @endguest
                        @auth
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if(empty(webUser()->name))
                                        {{ webUser()->username }}
                                    @else
                                        {{ ucfirst(webUser()->name) }}
                                    @endif
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('my-account.index') }}">{{ __('home.my_account') }}</a></li>

                                    <li class="border-0"><a class="dropdown-item" href="{{ route('front.logout') }}">{{ __('home.logout') }}</a></li>
                                </ul>
                            </div>
                        @endauth


                    </div>
                    <button class="btn btn-primary" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="isProfileUpdated()" @endguest>{{ __('home.post_free_ad') }}</button>
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
                        {{ __('home.find_anything_in') }}
                        @session('location')
                            <b>{{ CommonFunction::getStateNameById(session('location')) }}</b>
                        @else
                            <b>{{ __('home.location') }}</b>
                        @endsession

                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('location', ['location' => 0]) }}">{{ __('home.all_location') }}</a></li>
                        @foreach(CommonFunction::getState() as $state)
                            <li class="@if($loop->last) {{ "border-0" }}@endif"><a class="dropdown-item" href="{{ route('location', ['location' => $state->id]) }}">{{ $state->getTranslation('name', App::getLocale() ?? 'en') }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
