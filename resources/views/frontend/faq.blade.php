@extends('layouts.frontend')

@section('title')
    FAQ - Luc Leys
@endsection

@section('content')
    <h1 class="mt-3" style="text-align: center;">Frequently Asked Questions</h1>
    <hr>
    @if ($faqcategories->first())
    <div class="container">
        <div id="accordion1">
            @foreach ($faqcategories as $faqcategory)
            <div class="card">

              <div class="card-header" id="{{ 'heading'.$faqcategory->name }}">
                <h3 class="mb-0" data-bs-toggle="collapse" data-bs-target="{{ '#collapse'.$faqcategory->name }}" aria-expanded="true" aria-controls="{{ 'collapse'.$faqcategory->name }}">
                    {{ $faqcategory->name }}
                </h3>
              </div>

              @foreach ($faqs as $faq)
                @if ($faq->faqcat_id == $faqcategory->id)
                    <div id="{{ 'collapse'.$faqcategory->name }}" class="collapse" aria-labelledby="{{ 'heading'.$faqcategory->name }}" data-bs-parent="#accordion1">
                        <div class="card-body">

                            <div id="accordion2">
                                  <div id="{{ 'heading'.$faq->id }}">
                                    <h5 class="mb-0" data-bs-toggle="collapse" data-bs-target="{{ '#collapse'.$faq->id }}" aria-expanded="true" aria-controls="{{ 'collapse'.$faq->id }}">
                                        {{ $faq->question }}
                                    </h5>
                                  </div>
                              
                                  <div id="{{ 'collapse'.$faq->id }}" class="collapse" aria-labelledby="{{ 'heading'.$faq->id }}" data-bs-parent="#accordion2">
                                    <div class="mt-2" style="color: grey">
                                        {{ $faq->answer }}
                                    </div>
                                  </div>
                            </div>

                        </div>
                    </div>
                @endif
              @endforeach

            </div>
            @endforeach
        </div>
    </div>
    @else 
        <h2 class="text-center" style="margin: 30px">No FAQs</h2>
    @endif
@endsection