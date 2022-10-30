@extends('layouts.admin')

@section('content')
    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
    <div class="card overflow-auto" style="width: 100%;">
        <div class="card-header">
            <h1>Categories</h1>
        </div>
        <div class="card-body">
        @if ($categories->first())
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="{{ url('edit-category/'.$category->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('delete-category/'.$category->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else 
            <h2 class="text-center">No categories added</h2>
        @endif
        </div>
    </div>
@endsection