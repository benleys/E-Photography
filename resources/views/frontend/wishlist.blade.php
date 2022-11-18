@extends('layouts.frontend')

@section('title')
    My Wishlist - Luc Leys
@endsection

@section('content')
<div class="container my-5">
    <h1 class="mt-3" style="text-align: center;">My Wishlist</h1>
    <hr>

    <div class="card image_data">
        <div class="card-body">
            @if ($wishlistItems->count() > 0)
                @foreach ($wishlistItems as $wishlistItem)
                <div class="row text-center">
                    <div class="col-md-2">
                        <img src="{{ asset('assets/uploads/image/'.$wishlistItem->imagesKey->image) }}" height="150px" width="140px" alt="Image Here">
                    </div>
                    <div class="col-md-5 mt-5">
                        <h3>{{ $wishlistItem->imagesKey->title }}</h3>
                        <h6>{{ $wishlistItem->imagesKey->description }}</h6>
                    </div>
                    <div class="col-md-3 mt-5">
                        <input type="hidden" value="{{ $wishlistItem->image_id }}" class="image_id">
                        <button class="btn btn-primary addToCartBtn"><i class="bi bi-cart-fill"></i> Add to Cart</button>
                        <button class="btn btn-danger removeFromWishlistBtn"><i class="bi bi-trash-fill"></i> Remove</button>
                    </div>
                </div>
                @endforeach
            @else
                <h4 class="text-center">There are no images in your wishlist.</h4>
            @endif
        </div>
    </div>
</div>
@endsection