<div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm">
        <div class="container">

            <div class="d-flex justify-content-center py-4"> 
                <a href="{{ url('/') }}" class="d-flex align-items-center"> 
                    <img src="{{ asset('frontend/img/lucleyslogo.png') }}" height="50" alt="Luc Leys Logo">
                    <img src="{{ asset('frontend/img/cameralogo.png') }}" height="30" alt=""> <!-- Source: https://www.freepnglogos.com/pics/camera-logo-hd -->
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @auth
                    @if (Auth::user()->user_type == '1')
                        <ul class="navbar-nav me-auto">
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        </ul>
                    @endif
                @endauth
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('portfolio') }}">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('aboutme') }}">About me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('faq-q&a') }}">FAQ</a>
                    </li>
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('portfolio') }}">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('aboutme') }}">About me</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('faq-q&a') }}">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bi bi-cart-fill" href="{{ url('view-cart') }}"> Cart <span class="badge badge-pill bg-primary cartCount">0</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bi bi-heart-fill" href="{{ url('view-wishlist') }}"> Wishlist <span class="badge badge-pill bg-primary bg-success wishlistCount">0</span></a>
                        </li>
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="dropdown-header">
                                    <img src="{{ asset('assets/uploads/profile-image/'.Auth::user()->image) }}" alt="Profile" class="rounded-circle" width="100" height="110">
                                 </li>

                                <li>
                                    <a class="dropdown-item" href="{{ url('my-profile') }}">
                                        My Profile
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>