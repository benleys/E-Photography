@extends('layouts.credentials')

@section('title')
    Login - Luc Leys
@endsection

@section('content')
                        <div class="card mb-3">
                           <div class="card-body">
                              <div class="pt-4 pb-2">
                                 <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                 <p class="text-center small">Enter your username & password to login</p>
                              </div>

                              <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate >
                                @csrf 
                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                       <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                       
                                       @error('email')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                    @enderror
                                       
                                    <div class="invalid-feedback">Please enter your email.</div>
                                    </div>
                                 </div>

                                 <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label> 
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                    <div class="invalid-feedback">Please enter your password!</div>
                                 </div>


                                 <div class="col-12">
                                    <div class="form-check"> 
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> 
                                        <label class="form-check-label" for="remember">Remember me</label>
                                    </div>
                                 </div>

                                 <div class="col-12"> 
                                    <button class="btn btn-primary w-100" type="submit">Login</button>
                                </div>

                                 <div class="col-12">
                                    <p class="small mb-0">Don't have account? 
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}">{{ __('Create an account') }}</a>
                                    @endif
                                        or 
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    </p>
                                </div>
                              </form>
                           </div>
                        </div>
@endsection