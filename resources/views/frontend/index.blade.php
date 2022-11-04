@extends('layouts.frontend')

@section('title')
    Home - Luc Leys
@endsection

@section('content')
    @include('layouts.partials.frontslider')

    <h1 class="mt-3" style="text-align: center;">Spotlight</h1>
    <hr>

    <div class="py-5">
        <div class="container">
            <div class="row">
                @foreach ($spotlight_images as $spotimg)
                    <a class="col-md-3" href="{{ asset('assets/uploads/image/'.$spotimg->image) }}">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/image/'.$spotimg->image) }}" alt="">
                            <div class="card-body">
                                <h2>{{ $spotimg->title }}</h2>
                                <p>{{ $spotimg->description }}</p>
                                <small>{{ date('d-m-Y', strtotime($spotimg->updated_at)) }}</small>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection