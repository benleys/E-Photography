@extends('layouts.credentials')

@section('title')
    Reset Password - Luc Leys
@endsection

@section('content')                    
<div class="card mb-3">
   <div class="card-body">
      <div class="pt-4 pb-2">
         <h5 class="card-title text-center pb-0 fs-4">Reset your password</h5>
         <p class="text-center small">Enter your email to reset your password</p>
      </div>

      <form method="POST" action="{{ route('password.email') }}" class="row g-3 needs-validation" novalidate >
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
            <button class="btn btn-primary w-100" type="submit">Send Password Reset Link</button>
         </div>
      </form>
   </div>
</div>                     
@endsection
