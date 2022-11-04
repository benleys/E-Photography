@extends('layouts.admin')

@section('title')
    Dashboard - Luc Leys
@endsection

@section('content')
    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
    <div class="card">
        <div class="card-header">
            <h1>Dashboard</h1>
            <hr>
            <h2>Welcome, {{ Auth::user()->name }}!</h2>
            <p>Please go to <img src="admin\img\tutorial.png" alt="Tutorial Image"></p>
            <p>Here you will find everything you need to make your website at its <span style="color:rgb(235, 206, 16)">best</span>!</p>
            <hr>

        <div class="card overflow-auto" style="width: 100%;">
            <div class="card-header">
                <h1>Contact Messages</h1>
            </div>
            <div class="card-body">
            @if ($messages->first())
                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>User_Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Answer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td>{{ $message->id }}</td>
                                <td>{{ $message->user_id }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->message }}</td>
                                @if (empty($message->answer))
                                    <td>Not answered</td>
                                @else
                                    <td>{{ $message->answer }}</td>
                                @endif
                                <td>
                                    <a href="{{ url('answer-message/'.$message->id) }}" class="btn btn-primary">Answer</a>
                                    <a href="{{ url('delete-message/'.$message->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else 
                <h2 class="text-center">No messages</h2>
            @endif
            </div>
        </div>
        </div>
    </div>
@endsection