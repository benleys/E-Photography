@extends('layouts.admin')

@section('title')
    Edit Image - Luc Leys
@endsection

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

                <!-- Price -->
                <div class="col-md-12 mt-3">
                    <label for="price">Price</label>
                    <input type="number" value="{{ $images->price }}" class="form-control" name='price'>
                </div>

                <!-- Image Upload -->
                <div class="col-md-12 mt-3">
                <label class="font-weight-bold">Image</label>
                @if ($images->image)
                    <img src="{{ asset('assets/uploads/image/'.$images->image) }}" class="img-responsive" style="max-width:300px;  width:100%;" alt="Image placed here">
                @endif
                <br>
                    <input class="col-md-12 mt-3" type="file" name="image" class="img-responsive">
                </div>

                <!-- Category -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">Category</label>
                    <select name="cat_id" class="form-select">
                        <option value="{{ $images->cat_id }}|{{ $images->categoryKey->name }}" selected>{{ $images->categoryKey->name }}</option>
                        @foreach ($categories as $category)
                            @if ($category->name != $images->categoryKey->name)
                            <option value="{{ $category->id }}|{{ $category->name }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <!-- Description -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">Description</label>
                    <textarea class="form-control" name="description" cols="30" rows="10">{{ $images->description }}</textarea>
                </div>

                <!-- Spotlight -->
                <div class="col-md-6 mt-3">
                    <label for="spotlight">Spotlight</label>
                    <input type="checkbox" {{ $images->spotlight == "1" ? 'checked':'' }} name='spotlight'>
                </div>

                <!-- Upload button -->
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-outline-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
@endsection