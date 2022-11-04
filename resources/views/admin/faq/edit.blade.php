@extends('layouts.admin')

@section('title')
    Edit FAQ - Luc Leys
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit FAQ</h1>
        </div>
        <div class="card-body">
            <form action="{{ url('update-faq/'.$faqs->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!-- Question -->
                <div class="col-md-12 mt-3">
                    <label for="question">Question</label>
                    <input type="text" value="{{ $faqs->question }}" class="form-control" name='question'>
                </div>

                <!-- FAQCategory -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">FAQ Category <h6 style="color: red;">(Check if this is still correct)</h6></label>
                    <select name="faqcat_id" class="form-select">
                        @foreach ($faqcategories as $faqcategory)
                            <option value="{{ $faqcategory->id }}|{{ $faqcategory->name }}">{{ $faqcategory->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Answer -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">Answer</label>
                    <textarea class="form-control" name="answer" cols="30" rows="10">{{ $faqcategories->answer }}</textarea>
                </div>

                <!-- Upload button -->
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-outline-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
@endsection