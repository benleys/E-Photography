@extends('layouts.admin')

@section('title')
    FAQ Categories - Luc Leys
@endsection

@section('content')
    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
    <div class="card overflow-auto" style="width: 100%;">
        <div class="card-header">
            <h1>FAQ Categories</h1>
        </div>
        <div class="card-body">
        @if ($faqcategories->first())
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
                    @foreach ($faqcategories as $faqcategory)
                        <tr>
                            <td>{{ $faqcategory->id }}</td>
                            <td>{{ $faqcategory->name }}</td>
                            <td>{{ $faqcategory->description }}</td>
                            <td>
                                <a href="{{ url('edit-faqcategory/'.$faqcategory->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('delete-faqcategory/'.$faqcategory->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else 
            <h2 class="text-center">No FAQ categories added</h2>
        @endif
        </div>
    </div>
@endsection