@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit Image</h1>
        </div>
        <div class="card-body">
            <form action="{{ url('update-image/'.$images->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!-- Title -->
                <div class="col-md-12 mt-3">
                    <label for="title">Title</label>
                    <input type="text" value="{{ $images->title }}" class="form-control" name='title'>
                </div>

                <!-- Image Upload -->
                <div class="col-md-12 mt-3">
                @if ($images->image)
                    <img src="{{ asset('assets/uploads/image/'.$images->image) }}" class="img-responsive" style="max-width:300px;  width:100%;" alt="Image placed here">
                @endif
                <br>
                    <label class="font-weight-bold">Image</label>
                    <input type="file" name="image" class="img-responsive">
                </div>

                <!-- Category -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">Category</label>
                    <select name="category" class="form-select">
                        <!-- <option selected disabled>Select Category</option> -->
                        <option value="{{ $images->category }}">{{ $images->description }}</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">Description</label>
                    <textarea class="form-control" name="description" cols="30" rows="10">{{ $images->description }}</textarea>
                </div>

                <!-- Upload button -->
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-outline-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
@endsection