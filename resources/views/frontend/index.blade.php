@extends('layouts.frontend')

@section('title')
    Home - Luc Leys
@endsection

@section('content')
@include('layouts.partials.frontslider')

    <h1 class="mt-3" style="text-align: center;">Spotlight</h1>
    <hr>
    @if ($spotlight_images->isNotEmpty())
    <!-- Spotlight -->
    <div class="py-5">
        <div class="container">
            <div class="row">
                @foreach ($spotlight_images as $spotimg)
                    <a class="col-md-3" href="{{ url('portfolio/'.$spotimg->image) }}">
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
    @else 
        <h2 class="text-center" style="margin: 30px">No spotlight images</h2>
    @endif


    <!-- What People Say -->
    <h1 class="mt-3" style="text-align: center;">What People Say</h1>
    <hr>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <a class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('frontend/img/profile-pictures/Ajami-Newsha.jpg') }}" alt="Profile Picture">  <!-- Source: https://eesa.lbl.gov/our-people/ -->
                        <div class="card-body">
                            <h2>"Amazing photos! Sympathetic photographer who takes beautiful pictures. Recommended!"</h2>
                            <p>Ajami Newsha</p>
                        </div>
                    </div>
                </a>

                <a class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('frontend/img/profile-pictures/ackerly-david.jpg') }}" alt="Profile Picture">  <!-- Source: https://eesa.lbl.gov/our-people/ -->
                        <div class="card-body">
                            <h2>"Always very nice pictures from Luc!"</h2>
                            <p>Ackerly David</p>
                        </div>
                    </div>
                </a>

                <a class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('frontend/img/profile-pictures/Alumbaugh-David.jpg') }}" alt="Profile Picture">  <!-- Source: https://eesa.lbl.gov/our-people/ -->
                        <div class="card-body">
                            <h2>"Very nice photos, a photographer with patience!"</h2>
                            <p>Alumbaugh David</p>
                        </div>
                    </div>
                </a>

                <a class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('frontend/img/profile-pictures/Bomfim-Barbara.jpg') }}" alt="Profile Picture">  <!-- Source: https://eesa.lbl.gov/our-people/ -->
                        <div class="card-body">
                            <h2>"Fantastic photographer who really knows what he is doing. Beautiful work!"</h2>
                            <p>Bomfim Barbara</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Social Media -->
    <h1 class="mt-3" style="text-align: center;">Social Media</h1>
    <hr>

    <div class="social-icons">
        <ul>
            <li>
                <a href="#"><i class="bi bi-facebook"></i></a>
            </li>
            <li>
                <a href="#"><i class="bi bi-twitter"></i></a>
            </li>
            <li>
                <a href="#"><i class="bi bi-instagram"></i></a>
            </li>
            <li>
                <a href="#"><i class="bi bi-pinterest"></i></a>
            </li>
        </ul>
    </div>
@endsection