@extends('layouts.admin')

@section('title')
    Add User - Luc Leys
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Add User</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('insert-user') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Title -->
                <div class="col-md-12 mt-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name='name'>
                </div>

                <!-- Email -->
                <div class="col-md-12 mt-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name='email'>
                </div>

                <!-- Admin -->
                <div class="col-md-12 mt-3">
                    <label for="admin">Admin</label>
                    <input type="checkbox" name='admin'>
                </div>

                <!-- Add button -->
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-outline-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection