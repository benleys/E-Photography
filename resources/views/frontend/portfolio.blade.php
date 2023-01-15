@extends('layouts.frontend')

@section('title')
    Portfolio - Luc Leys
@endsection

@section('content')
    <h1 class="mt-3" style="text-align: center;">All Categories</h1>
    <hr>
    @if ($categories->first())
    <!-- All Categories -->
    <div class="py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($categories as $category)
                            <a class="col-md-3" href="{{ 'portfolio/view-portfolio/'.strtolower($category->name) }}">
                                <div class="card">
                                    <div class="card-body">
                                        <h2>{{ $category->name }}</h2>
                                        <p>{{ $category->description }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else 
        <h2 class="text-center" style="margin: 30px">No categories</h2>
    @endif


    <!-- All Images -->
    <h1 class="mt-3" style="text-align: center;">Portfolio</h1>
    <hr>
    @if ($images->first())
    <div class="py-5">
        <div class="container">
            <div class="row">
                @foreach ($images as $image)
                    <a class="col-md-3" href="{{ url('portfolio/'.$image->image) }}">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/image/'.$image->image) }}" alt="Image Here">
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    @else 
        <h2 class="text-center" style="margin: 30px">No images</h2>
    @endif
@endsection