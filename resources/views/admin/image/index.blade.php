@extends('layouts.admin')

@section('content')
    <div class="card overflow-auto" style="width: 100%;">
        <div class="card-header">
            <h1>Images</h1>
        </div>
        <div class="card-body">
        @if ($images->first())
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $image)
                        <tr>
                            <td>{{ $image->id }}</td>
                            <td>{{ $image->title }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/image/'.$image->image) }}" class="img-responsive" style="max-width:200px;  width:100%;" alt="Image placed here">
                            </td>
                            <td>{{ $image->category }}</td>
                            <td>{{ $image->description }}</td>
                            <td>
                                <a href="{{ url('edit-image/'.$image->id) }}" class="btn btn-primary">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else 
            <h2 class="text-center">No images added</h2>
        @endif
        </div>
    </div>
@endsection