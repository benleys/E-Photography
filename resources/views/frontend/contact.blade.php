@extends('layouts.frontend')

@section('title')
    Contact - Luc Leys
@endsection

@section('content')
<div class="container">
    <h1 class="mt-3" style="text-align: center;">Contact</h1>
    <p style="text-align: center;">Fill in the form to get further in touch</p>
    <hr>

    <div class="contact-middle">
        <div>
            <span class="contact-icon">
                <i class="bi bi-geo-alt-fill"></i>
            </span>
            <span>Address</span>
            <p>Ternat</p>
            <!-- Map -->
            <div style="width: 100%">
                <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Ternat+(Photography)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/sport-gps/">bike gps</a></iframe>
            </div>
        </div>

        <div>
            <span class="contact-icon">
                <i class="bi bi-telephone-fill"></i>
            </span>
            <span>Contact Number</span>
            <p>+32477777777</p>
        </div>

        <div>
            <span class="contact-icon">
                <i class="bi bi-envelope-fill"></i>
            </span>
            <span>Email Address</span>
            <p>info@gmail.com</p>
        </div>

        <div>
            <span class="contact-icon">
                <i class="bi bi-globe"></i>
            </span>
            <span>Website</span>
            <p>www.lucleys.com</p>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h1>Contact Me</h1>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-contactmessage') }}" method="post" enctype="multipart/form-data">
                @csrf

                @auth
                    <!-- Hidden user_id -->
                    <input hidden type="text" value="{{ Auth::user()->id }}" class="form-control" name='user_id'>
                    <input hidden type="text" value="{{ Auth::user()->name }}" class="form-control" name='name'>
                    <input hidden type="text" value="{{ Auth::user()->email }}" class="form-control" name='email'>
                    
                    <!-- Name -->
                    <div class="col-md-12 mt-3">
                        <label for="name">Your Name</label>
                        <input type="text" value="{{ Auth::user()->name }}" class="form-control" disabled>
                    </div>

                    <!-- Email -->
                    <div class="col-md-12 mt-3">
                        <label for="email">Your Email</label>
                        <input type="text" value="{{ Auth::user()->email }}" class="form-control" disabled>
                    </div>

                    <!-- Subject -->
                    <div class="col-md-12 mt-3">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name='subject'>
                    </div>

                    <!-- Message -->
                    <div class="col-md-12 mt-3">
                        <label class="font-weight-bold">Message</label>
                        <textarea class="form-control" name="message" cols="20" rows="4"></textarea>
                    </div>

                    <!-- Publish -->
                    <div class="col-md-12 mt-3">
                        <label for="published">Publish<small class="mt-1">(visible for everyone in contact forum)</small></label>
                        <input type="checkbox" name='published'>
                    </div>

                    <!-- Send Message button -->
                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-light">Send Message</button>
                    </div> 
                @else
                @if (empty(Auth::user()->id))
                    <!-- Hidden user_id -->
                    <input hidden type="text" value="0" class="form-control" name='user_id'>
                @endif

                    <!-- Name -->
                    <div class="col-md-12 mt-3">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" name='name'>
                    </div>

                    <!-- Email -->
                    <div class="col-md-12 mt-3">
                        <label for="email">Your Email</label>
                        <input type="text" class="form-control" name='email'>
                    </div>

                    <!-- Subject -->
                    <div class="col-md-12 mt-3">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name='subject'>
                    </div>

                    <!-- Message -->
                    <div class="col-md-12 mt-3">
                        <label class="font-weight-bold">Message</label>
                        <textarea class="form-control" name="message" cols="20" rows="4"></textarea>
                    </div>

                    <!-- Publish -->
                    <div class="col-md-12 mt-3">
                        <label for="published">Publish<small class="mt-1">(might be useful for everyone in contact forum)</small></label>
                        <input type="checkbox" name='published'>
                    </div>

                    <!-- Send Message button -->
                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-light">Send Message</button>
                    </div>
                @endauth
                <small style="color: red">**login required</small>
            </form> 
        </div>
    </div>
    @auth
    <h1 class="mt-3" style="text-align: center;">My Contact Forum</h1>
    <p style="text-align: center;">Here you see all private messages</p>
    <hr>
    @if ($messages->first())
    <div class="py-5">
        <div class="container">
            <div class="row">
                @foreach ($messages as $message)
                    @if (Auth::id() == $message->user_id)
                        <a class="col-md-3" href="{{ url('contactmessage/'.$message->id) }}">
                            <div class="card">
                                <div class="card-body">
                                    <h2>{{ $message->subject }}</h2>
                                    <h5 style="margin: 10px 0px 10px 0px">{{ $message->message }}</h5>
                                    @if (empty($message->answer))
                                        <h6>*Not answered yet</h6> 
                                    @else
                                        <h6>Answer: {{ $message->answer }}</h6>
                                    @endif
                                    <small style="margin-top: 20px; float: left">{{ $message->userKey->name }}</small>
                                    <small style="margin-top: 20px; float: right">{{ \Carbon\Carbon::parse($message->updated_at)->diffForHumans() }}</small>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @else 
        <h2 class="text-center" style="margin: 30px">No messages</h2>
    @endif
    @endauth
    
    <h1 class="mt-3" style="text-align: center;">Contact Forum</h1>
    <p style="text-align: center;">Here you see all public messages</p>
    <hr>
    @if ($messages->first())
    <div class="py-5">
        <div class="container">
            <div class="row">
                @foreach ($messages as $message)
                    @if ($message->published == '1')
                        <a class="col-md-3" href="{{ url('contactmessage/'.$message->id) }}">
                            <div class="card">
                                <div class="card-body">
                                    <h2>{{ $message->subject }}</h2>
                                    <h5 style="margin: 10px 0px 10px 0px">{{ $message->message }}</h5>
                                    @if (empty($message->answer))
                                        <h6>*Not answered yet</h6> 
                                    @else
                                        <h6>Answer: {{ $message->answer }}</h6>
                                    @endif
                                    <small style="margin-top: 20px; float: left">{{ $message->userKey->name }}</small>
                                    <small style="margin-top: 20px; float: right">{{ \Carbon\Carbon::parse($message->updated_at)->diffForHumans() }}</small>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @else 
        <h2 class="text-center" style="margin: 30px">No public messages</h2>
    @endif
@endsection