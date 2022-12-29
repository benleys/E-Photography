@extends('layouts.frontend')

@section('title')
Contact Message - {{ $messages->userKey->name }} - Luc Leys
@endsection

@section('content')
<div class="container">
    <h1 class="mt-3" style="text-align: center;">{{ $messages->subject }}</h1>
    <hr>

    <div class="card">
        <div class="card-header">
            <h1>Contact Message From <a href="#">{{ $messages->userKey->name }}</a></h1>
        </div>
        <div class="card-body">
            <form action="{{ url('updated-contactmessage/'.$messages->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                
                @auth
                @if($messages->user_id == Auth::user()->id)
                    <!-- Subject -->
                    <div class="col-md-12 mt-3">
                        <label for="subject">Subject</label>
                        <input type="text" value="{{ $messages->subject }}" class="form-control" name='subject'>
                    </div>

                    <!-- Message -->
                    <div class="col-md-12 mt-3">
                        <label for="message">Message</label>
                        <input type="text" value="{{ $messages->message }}" class="form-control" name='message'>
                    </div>

                     <!-- Answer -->
                    @if (empty($messages->answer))
                        <div class="col-md-12 mt-3">
                            <label class="font-weight-bold">Answer</label>
                            <textarea class="form-control" name="answer" cols="20" rows="4" style="color: grey" disabled>*Not answered yet</textarea>
                        </div>
                    @else
                        <div class="col-md-12 mt-3">
                            <label class="font-weight-bold">Answer</label>
                            <textarea class="form-control" name="answer" cols="20" rows="4" disabled>{{  $messages->answer }}</textarea>
                        </div>
                    @endif

                    <!-- Published -->
                    <div class="col-md-12 mt-3">
                        <label for="published">Published</label>
                        <input type="checkbox" {{ $messages->published == "1" ? 'checked':'' }} name='published'>
                    </div>

                    <!-- Update button -->
                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-outline-primary">Update Message</button>
                    </div>
                @else
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
                    @if (empty($messages->answer))
                        <div class="col-md-12 mt-3">
                            <label class="font-weight-bold">Answer</label>
                            <textarea class="form-control" name="answer" cols="20" rows="4" style="color: grey" disabled>*Not answered yet</textarea>
                        </div>
                    @else
                        <div class="col-md-12 mt-3">
                            <label class="font-weight-bold">Answer</label>
                            <textarea class="form-control" name="answer" cols="20" rows="4" disabled>{{  $messages->answer }}</textarea>
                        </div>
                    @endif

                    <!-- Published -->
                    <div class="col-md-12 mt-3">
                        <label for="published">Published</label>
                        <input type="checkbox" {{ $messages->published == "1" ? 'checked':'' }} name='published' disabled>
                    </div>

                    <!-- Go Back button -->
                    <div class="col-md-12 mt-3">
                        <a href={{ url('contact') }} class="btn btn-outline-primary">Go Back</a>
                    </div>
                @endif
                @endauth
                
                @guest
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
                    @if (empty($messages->answer))
                        <div class="col-md-12 mt-3">
                            <label class="font-weight-bold">Answer</label>
                            <textarea class="form-control" name="answer" cols="20" rows="4" style="color: grey" disabled>*Not answered yet</textarea>
                        </div>
                    @else
                        <div class="col-md-12 mt-3">
                            <label class="font-weight-bold">Answer</label>
                            <textarea class="form-control" name="answer" cols="20" rows="4" disabled>{{  $messages->answer }}</textarea>
                        </div>
                    @endif

                    <!-- Published -->
                    <div class="col-md-12 mt-3">
                        <label for="published">Published</label>
                        <input type="checkbox" {{ $messages->published == "1" ? 'checked':'' }} name='published' disabled>
                    </div>

                    <!-- Go Back button -->
                    <div class="col-md-12 mt-3">
                        <a href={{ url('contact') }} class="btn btn-outline-primary">Go Back</a>
                    </div>
                @endguest
            </form>
        </div>
    </div>
</div>
@endsection