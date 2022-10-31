@extends('layouts.admin')

@section('title')
    Edit User - Luc Leys
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit User</h1>
        </div>
        <div class="card-body">
            <form action="{{ url('update-user/'.$users->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!-- Name -->
                <div class="col-md-12 mt-3">
                    <label for="name">Name</label>
                    <input type="text" value="{{ $users->name }}" class="form-control" name='name'>
                </div>

                <!-- Profile-Image Upload -->
                    <div class="col-md-12 mt-3">
                        @if ($users->image)
                                <img src="{{ asset('assets/uploads/profile-image/'.$users->image) }}" class="img-responsive" style="max-width:300px;  width:100%;" alt="Image placed here">
                        @endif
                        <br>
                        <label class="font-weight-bold">Image</label>
                        <input type="file" name="image" class="img-responsive">
                    </div>

                <!-- Email -->
                <div class="col-md-12 mt-3">
                    <label for="email">Email</label>
                    <input type="text" value="{{ $users->email }}" class="form-control" name='email'>
                </div>

                <!-- Admin -->
                <div class="col-md-6 mb-3">
                    <label for="admin">Admin</label>
                    <input type="checkbox" {{ $users->user_type == "1" ? 'checked':'' }} name='admin'>
                </div>

                <!-- Upload button -->
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection