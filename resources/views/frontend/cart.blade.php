@extends('layouts.frontend')

@section('title')
    My Cart - Luc Leys
@endsection

@section('content')
<div class="container my-5">
    <h1 class="mt-3" style="text-align: center;">My Cart</h1>
    <hr>

    <div class="card image_data2">
        <div class="card-body">
            @foreach ($cartItems as $cartItem)
            <div class="row text-center">
                <div class="col-md-2">
                    <img src="{{ asset('assets/uploads/image/'.$cartItem->imagesKey->image) }}" height="150px" width="140px" alt="Image Here">
                </div>
                <div class="col-md-5 mt-5">
                    <h3>{{ $cartItem->imagesKey->title }}</h3>
                    <h6>{{ $cartItem->imagesKey->description }}</h6>
                </div>
                <div class="col-md-3 mt-5">
                    <input type="hidden" value="{{ $cartItem->image_id }}" class="image_id">
                    <button class="btn btn-danger removeFromCartBtn"><i class="bi bi-trash-fill"></i> Remove</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection