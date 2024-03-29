@extends('layouts.frontend')

@section('title')
    Portfolio - {{ $category->name }} - Luc Leys
@endsection

@section('content')
    <h1 class="mt-3" style="text-align: center;">{{ $category->name }}</h1>
    <hr>
    @if ($images->isNotEmpty())
    <div class="py-5">
        <div class="container">
            <div class="row">
                @foreach ($images as $image)
                    <a class="col-md-3" href="{{ url('portfolio/'.$image->image) }}">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/image/'.$image->image) }}" alt="">
                            <div class="card-body">
                                <h2>{{ $image->title }}</h2>
                                <p>{{ $image->description }}</p>
                                <small>{{ date('d-m-Y', strtotime($image->updated_at)) }}</small>
                            </div>
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