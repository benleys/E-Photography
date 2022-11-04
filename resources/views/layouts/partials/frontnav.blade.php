<div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm">
        <div class="container">

            <div class="d-flex justify-content-center py-4"> 
                <a href="{{ url('/') }}" class="d-flex align-items-center"> 
                    <img src="{{ asset('frontend/img/lucleyslogo.png') }}" height="50" alt="Luc Leys Logo">
                    <img src="frontend/img/cameralogo.png" height="30" alt="">
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
                        <a class="nav-link" href="{{ url('#') }}">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('#') }}">About me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('#') }}">Contact</a>
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
                            <a class="nav-link" href="{{ url('#') }}">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('#') }}">About me</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('#') }}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bi bi-cart-fill" href="{{ url('#') }}">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bi bi-heart-fill" href="{{ url('#') }}">Wishlist</a>
                        </li>
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
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