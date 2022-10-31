@extends('layouts.admin')

@section('title')
    Dashboard - Luc Leys
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Dashboard</h1>
            <hr>
            <h2>Welcome, {{ Auth::user()->name }}!</h2>
            <p>Please go to <img src="admin\img\tutorial.png" alt="Tutorial Image"></p>
            <p>Here you will find everything you need to make your website at its <span style="color:rgb(64, 38, 236)">best</span>!</p>
        </div>
    </div>
@endsection