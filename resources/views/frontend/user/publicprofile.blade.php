@extends('layouts.frontend')

@section('title')
    Profile - {{ $profiles->name }} - Luc Leys
@endsection

@section('content')
    <h1 class="mt-3" style="text-align: center;">Profile</h1>
    <hr>

    <div class="container">
        <div class="card shadow image_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/profile-image/'.$profiles->image) }}" height="500" width="380" alt="">
                    </div>
                    <div class="col-md-8" style="margin: auto; text-align: center; font-size: 5vh">
                        <label class="fw-bold">Name</label>
                        <p style="font-size: 4vh">
                            {{ $profiles->name }}
                            {{-- @if ($images->spotlight == '1')
                                <label style="font-size: 16px" class="float-end badge bg-warning text-dark trending_tag">Spotlight</label>
                            @endif --}}
                        </p>
                        <label class="fw-bold">About Me</label>
                        <p style="font-size: 4vh">
                            {{ $profiles->about_me }}
                            {{-- @if ($images->spotlight == '1')
                                <label style="font-size: 16px" class="float-end badge bg-warning text-dark trending_tag">Spotlight</label>
                            @endif --}}
                        </p>
                        <label class="fw-bold">Date of Birth</label>
                        <p style="font-size: 4vh">
                            {{ $profiles->date_of_birth }}
                        </p>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" value="{{ $profiles->id }}" class="image_id">
                            </div>
                            {{-- <div class="col-md-9">
                                <br>
                                <button class="btn btn-success me-3 addToWishlistBtn"><i class="bi bi-heart-fill"></i> Add to Wishlist</button>
                                <button class="btn btn-primary me-3 addToCartBtn"><i class="bi bi-cart-fill"></i> Add to Cart</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection