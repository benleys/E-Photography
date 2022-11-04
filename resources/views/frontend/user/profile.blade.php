@extends('layouts.frontend')

@section('title')
    My Profile - Luc Leys
@endsection

@section('content')
<div class="container">
    <h1 class="mt-3" style="text-align: center;">My Profile</h1>
    <hr>

    <div class="card">
        <div class="card-header">
            <h1>Edit Profile</h1>
        </div>
        <div class="card-body">
            <form action="{{ url('update-my-profile') }}" method="post" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div class="col-md-12 mt-3">
                    <label for="name">Name</label>
                    <input type="text" value="{{ Auth::user()->name }}" class="form-control" name='name'>
                </div>

                <!-- Email -->
                <div class="col-md-12 mt-3">
                    <label for="email">Email</label>
                    <input type="text" value="{{ Auth::user()->email }}" class="form-control" name='email'>
                </div>

                <!-- Birthday -->
                <div class="col-md-12 mt-3">
                    <label for="birthday">Birthday</label>
                    <input type="date" value="{{ Auth::user()->date_of_birth }}" class="form-control" name='birthday'>
                </div>

                <!-- Image Upload -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">Avatar</label>
                    @if (Auth::user()->image)
                        <img src="{{ asset('assets/uploads/profile-image/'.Auth::user()->image) }}" class="img-responsive" style="max-width:200px;  width:100%;" alt="Avatar placed here">
                    @endif
                    <br>
                    <input type="file" name="image" class="img-responsive col-md-12 mt-3">
                </div>

                <!-- About Me -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">About Me</label>
                    <textarea class="form-control" name="about_me" cols="20" rows="4">{{  Auth::user()->about_me }}</textarea>
                </div>

                <!-- Update button -->
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-outline-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection