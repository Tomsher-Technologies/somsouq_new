<header class="main-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6 col-md-5">
                <div class="header-start">
                    <div class="select-location">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Location
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Borama</a></li>
                                <li><a class="dropdown-item" href="#">Jamaame</a></li>
                                <li><a class="dropdown-item" href="#">Galkayo</a></li>
                                <li><a class="dropdown-item" href="#">Bardere</a></li>
                                <li><a class="dropdown-item" href="#">Garbahaarrey</a></li>
                                <li><a class="dropdown-item" href="#">Bu'aale</a></li>
                                <li><a class="dropdown-item" href="#">Baidoa</a></li>
                                <li><a class="dropdown-item" href="#">Afgoye</a></li>
                                <li class="border-0"><a class="dropdown-item" href="#">Buur Hakaba</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="select-language">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                English
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">English</a></li>
                                <li><a class="dropdown-item" href="#">Omaliyeed</a></li>
                                <li class="border-0"><a class="dropdown-item" href="#">العربية</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('assets/frontEnd/images/logo.png') }}" class="rounded-3" alt="Logo">
                </a>
            </div>
            <div class="col-6 col-md-5 text-end">
                <div class="header-end">

                    <div class="account-login">
                        <div class="user-avatar">
                            <img src="{{ asset('assets/frontEnd/images/user.png') }}" alt="">
                        </div>
                        @guest
                            <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login/Register</a>
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
