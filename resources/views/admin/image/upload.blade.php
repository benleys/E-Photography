@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Upload Image</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('insert-image') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Title -->
                <div class="col-md-12 mt-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name='title'>
                </div>

                <!-- Image Upload -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <!-- Category -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">Category</label>
                    <select name="category" class="form-select">
                        <option selected disabled>Select Category</option>
                        <option value="family">Family</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">Description</label>
                    <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
                </div>

                <!-- Upload button -->
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-outline-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
@endsection