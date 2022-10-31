@extends('layouts.admin')

@section('title')
    Users - Luc Leys
@endsection

@section('content')
    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
    <div class="card overflow-auto" style="width: 100%;">
        <div class="card-header">
            <h1>Users</h1>
        </div>
        <div class="card-body">
        @if ($users->first())
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Email_Verified_At</th>
                        <th>User_Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/profile-image/'.$user->image) }}" class="img-responsive" style="max-width:200px;  width:100%;" alt="Image placed here">
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->email_verified_at }}</td>
                            <td>{{ $user->user_type }}</td>
                            <td>
                                <a href="{{ url('edit-user/'.$user->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('delete-user/'.$user->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else 
            <h2 class="text-center">No users added</h2>
        @endif
        </div>
    </div>
@endsection