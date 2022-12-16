@extends('layouts.admin')

@section('title')
    FAQ - Luc Leys
@endsection

@section('content')
    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
    <div class="card overflow-auto" style="width: 100%;">
        <div class="card-header">
            <h1>FAQ</h1>
        </div>
        <div class="card-body">
        @if ($faqs->first())
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>FAQ Cat_Id</th>
                        <th>Question</th>
                        <th>FAQ Category</th>
                        <th>Answer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $faq)
                        <tr>
                            <td>{{ $faq->id }}</td>
                            <td>{{ $faq->faqcat_id }}</td>
                            <td>{{ $faq->question }}</td>
                            <td>{{ $faq->faqcategoryKey->name }}</td>
                            <td>{{ $faq->answer }}</td>
                            <td>
                                <a href="{{ url('edit-faq/'.$faq->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('delete-faq/'.$faq->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else 
            <h2 class="text-center">No FAQ added</h2>
        @endif
        </div>
    </div>
@endsection