@extends('layouts.frontend')

@section('title')
    Portfolio - {{ $images->title }} - Luc Leys
@endsection

@section('content')
    <h1 class="mt-3" style="text-align: center;">{{ $images->title }}</h1>
    <hr>

    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/image/'.$images->image) }}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                        <p class="mt-3">
                            {{ $images->description }}
                            @if ($images->spotlight == '1')
                                <label style="font-size: 16px" class="float-end badge bg-warning text-dark trending_tag">Spotlight</label>
                            @endif
                        </p>
                        <hr>
                        {{-- <label class="fw-bold">Selling Price: €{{ $images->price }}</label> --}}
                        <div class="row mt-2">
                            <div class="col-md-10">
                                <br>
                                <button class="btn btn-success me-3 float-start addToCartBtn">Add to Wishlist <i class="bi bi-heart-fill"></i></button>
                                <button class="btn btn-primary me-3 float-start addToWishlistBtn">Add to Cart <i class="bi bi-cart-fill"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    
</script>
@endsection