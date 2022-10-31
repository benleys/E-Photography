@extends('layouts.admin')

@section('title')
    Edit Category - Luc Leys
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category/'.$categories->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!-- Name -->
                <div class="col-md-12 mt-3">
                    <label for="name">Name</label>
                    <input type="text" value="{{ $categories->name }}" class="form-control" name='name'>
                </div>

                <!-- Description -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">Description</label>
                    <textarea class="form-control" name="description" cols="30" rows="10">{{ $categories->description }}</textarea>
                </div>

                <!-- Upload button -->
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection