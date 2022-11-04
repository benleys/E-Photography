@extends('layouts.admin')

@section('title')
    Answer Message - Luc Leys
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Answer Message</h1>
        </div>
        <div class="card-body">
            <form action="{{ url('answered-message/'.$messages->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <!-- Subject -->
                <div class="col-md-12 mt-3">
                    <label for="subject">Subject</label>
                    <input type="text" value="{{ $messages->subject }}" class="form-control" name='subject' disabled>
                </div>

                <!-- Message -->
                <div class="col-md-12 mt-3">
                    <label for="message">Message</label>
                    <input type="text" value="{{ $messages->message }}" class="form-control" name='message' disabled>
                </div>

                <!-- Answer -->
                <div class="col-md-12 mt-3">
                    <label class="font-weight-bold">Answer</label>
                    <textarea class="form-control" name="answer" cols="30" rows="10">{{ $messages->answer }}</textarea>
                </div>

                <!-- Send button -->
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-outline-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection