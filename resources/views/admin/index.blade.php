@extends('layouts.admin')

@section('content')

    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
    
    <div class="card">
        <div class="card-header">
            <h1>Dashboard</h1>
        </div>
    </div>
@endsection