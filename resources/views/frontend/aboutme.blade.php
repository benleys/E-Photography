@extends('layouts.frontend')

@section('title')
    About Me - Luc Leys
@endsection

@section('content')
    <h1 class="mt-3" style="text-align: center;">About Me</h1>
    <hr>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Who am I?</h1>
            </div>
            <div class="card-body">
                <img src="{{ asset('frontend/img/about-img.jpg') }}" class="img-responsive" style="float: right; margin: 10px; max-width:400px;  width:100%;" alt="Luc Leys image placed here">
                <h5>With a mother who practiced video and a father who took photos, it wasn't long before I would also end up in the audio visual world.</h5>
                <h5>Started as a young guy with videography, joined a video club to eventually, beyond my own recordings, do weddings, communion parties or commissions for friends and acquaintances.</h5>
                <h5>At a later age, wanting to do something different, I joined a photo club, followed evening photography classes for many years, and then, in addition to my own work, carried out photography assignments for friends, acquaintances and companies.</h5>
                <h5>Photographer in secondary occupation became reality.</h5>
                <h4>Sources:</h4>
                <p>
                    <a href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjvrIvpxZT7AhX3_rsIHWUuApwQFnoECBMQAQ&url=https%3A%2F%2Fwww.fundaofwebit.com%2F&usg=AOvVaw26BrluYnkZmzM2eMVxwNuo">fundaofwebit.com</a>
                    <a href="https://www.w3schools.com/">w3schools.com</a>
                    <a href="https://stackoverflow.com/">stackoverflow.com</a>
                    https://laravel.com/
                </p>
                <h4>Templates:</h4>
                <p>
                    <a href="https://getbootstrap.com/">getbootstrap.com</a>
                    <a href="https://freeetemplates.com/bootstrap-5-free-admin-dashboard-template-1/">freeetemplates.com</a>
                    <a href="https://github.com/prabinmagar/photography-site">prabinmagar/photography-site</a>
                </p>
            </div>
        </div>
    </div>
@endsection