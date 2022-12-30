@extends('layouts.admin')

@section('title')
    Images - Luc Leys
@endsection

@section('content')
    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
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
                        <th>Category</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Spotlight</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $image)
                        <tr>
                            <td>{{ $image->id }}</td>
                            <td>{{ $image->categoryKey->name }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/image/'.$image->image) }}" class="img-responsive" style="max-width:200px;  width:100%;" alt="Image placed here">
                            </td>
                            <td>{{ $image->title }}</td>
                            <td>{{ $image->description }}</td>

                            @if ( $image->spotlight == '1')
                                <td>Yes</td>
                            @else
                                <td>No</td>
                            @endif
                            
                            <td>
                                <a href="{{ url('edit-image/'.$image->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('delete-image/'.$image->id) }}" class="btn btn-danger">Delete</a>
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