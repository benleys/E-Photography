@extends('layouts.admin')

@section('title')
    Add FAQ - Luc Leys
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Add FAQ</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('insert-faq') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Question -->
                <div class="col-md-12 mt-3">
                    <label for="question">Question</label>
                    <input type="text" class="form-control" name='question'>
                </div>

                <!-- FAQCategory -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">FAQ Category</label>
                    <select name="faqcat_id" class="form-select">
                        @if ($faqcategories->isNotEmpty())
                            <option selected disabled>Select a FAQ Category</option>
                            @foreach ($faqcategories as $faqcategory)
                                <option value="{{ $faqcategory->id }}|{{ $faqcategory->name }}">{{ $faqcategory->name }}</option>
                            @endforeach
                        @else
                            <option selected disabled style="color: red">Create a FAQ-category first</option>
                        @endif
                    </select>
                </div>

                <!-- Answer -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">Answer</label>
                    <textarea class="form-control" name="answer" cols="30" rows="10"></textarea>
                </div>

                <!-- Upload button -->
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-outline-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection