<div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm">
        <div class="container">

            <div class="d-flex justify-content-center py-4"> 
                <a href="{{ url('/') }}" class="logo d-flex align-items-center"> 
                     <!-- <img src="frontend/img/cameralogo.png" alt="">  -->
                    <span class="d-none d-lg-block">Luc Leys</span> 
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
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
                            @if (Route::has('login'))
                                @auth
                                    <a class="nav-link" href="{{ url('/home') }}">Home</a>
                                @else
                                    <a class="nav-link" href="{{ route('login') }}">Log in</a>
        
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                        @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('#') }}">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('#') }}">About me</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('#') }}">Contact</a>
                        </li>
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>

                                </li>

                                <li>
                                    <a class="dropdown-item" href="#">
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