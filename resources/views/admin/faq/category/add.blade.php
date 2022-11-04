@extends('layouts.admin')

@section('title')
    Add FAQ Category - Luc Leys
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Add FAQ Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('insert-faqcategory') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Name -->
                <div class="col-md-12 mt-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name='name'>
                </div>

                <!-- Description -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">Description</label>
                    <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
                </div>

                <!-- Add button -->
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-outline-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection