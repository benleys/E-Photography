@extends('layouts.frontend')

@section('title')
    FAQ - Luc Leys
@endsection

@section('content')
    <h1 class="mt-3" style="text-align: center;">Frequently Asked Questions</h1>
    <hr>

    <div class="container">
        <div id="accordion">
            @foreach ($faqcategories as $faqcategory)
            <div class="card">

              <div class="card-header" id="{{ 'heading'.$faqcategory->name }}">
                <h4 class="mb-0" data-bs-toggle="collapse" data-bs-target="{{ '#collapse'.$faqcategory->name }}" aria-expanded="true" aria-controls="{{ 'collapse'.$faqcategory->name }}">
                    {{ $faqcategory->name }}
                </h4>
              </div>

              @foreach ($faqs as $faq)
                @if ($faq->faqcat_id == $faqcategory->id)
                    <div id="{{ 'collapse'.$faqcategory->name }}" class="collapse" aria-labelledby="{{ 'heading'.$faqcategory->name }}" data-bs-parent="#accordion">
                        <div class="card-body">
                            <a href="#">{{ $faq->question }}</a>
                        </div>
                    </div>
                @endif
              @endforeach

            </div>
            @endforeach
        </div>
    </div>
@endsection