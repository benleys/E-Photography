@extends('layouts.credentials')

@section('title')
    Register - Luc Leys
@endsection

@section('content')    
<div class="card mb-5">
   <div class="card-body">
      <div class="pt-4 pb-2">
         <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
         <p class="text-center small">Enter your personal details to create account</p>
      </div>
      
      <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation" novalidate>
      @csrf  
      <div class="col-12">
            <label for="name" class="form-label">Your Name</label> 
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
            @error('name')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
      @enderror

            <!--<div class="invalid-feedback">Please, enter your name!</div>-->
         </div>
         
         <div class="col-12">
            <label for="email" class="form-label">Your Email</label> 
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
            @error('email')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
      @enderror

            <!--<div class="invalid-feedback">Please enter a valid Email adddress!</div>-->
         </div>

         <div class="col-12">
            <label for="password" class="form-label">New Password</label> 
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
            @error('password')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
      @enderror

            <!--<div class="invalid-feedback">Please enter your password!</div>-->
         </div>

         <div class="col-12">
         <label for="password_confirmation" class="form-label">Confirm Password</label> 
         <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

         @error('password')
         <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
         </span>
      @enderror
      
         <!--<div class="invalid-feedback">Please enter your password a second time!</div>-->
      </div>
         
         <div class="col-12">
            <div class="form-check">
               <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required> <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
               <div class="invalid-feedback">You must agree before submitting.</div>
            </div>
         </div>
         
         <div class="col-12"> <button class="btn btn-primary w-100" type="submit">Create Account</button></div>
         <div class="col-12">
            <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
         </div>
      </form>
   </div>
</div>
@endsection
