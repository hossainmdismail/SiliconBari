@props([
    'faqs' => collect(),
    'title' => 'Frequently Asked Questions',
    'description' => 'Find answers to common questions about our semiconductor engineering services',
])

@php
    $faqItems = collect($faqs);
@endphp

@if ($faqItems->isNotEmpty())
    <section class="section-0-120">
        <div class="container">
            <div class="section-title-block">
                <h2 class="h2">{{ $title }}</h2>
                <div>{{ $description }}</div>
            </div>
            <div class="faq-content-grid">
                @foreach ($faqItems as $faq)
                    <div data-delay="400" data-hover="false" data-w-id="f4ef17ee-256c-f9be-e6e0-97e224fbe50e"
                        class="faq-acccordion w-dropdown">
                        <div class="faq-accordion-head w-dropdown-toggle">
                            <div class="faq-title-wrap">
                                <h3 class="text-regular">{{ $faq->question }}</h3>
                            </div>
                            <div class="faq-icon w-embed"><svg width="20" height="20" viewbox="0 0 20 20"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.5 15L12.5 10L7.5 5" stroke="#99A1AF" stroke-width="1.66667"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg></div>
                        </div>
                        <div class="faq-text-wrap w-dropdown-list">
                            <div class="faq-text-wrapper">
                                <div class="space-20px"></div>
                                <div class="text-regular">{!! $faq->answer !!}</div>
                                <div class="space-20px"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
