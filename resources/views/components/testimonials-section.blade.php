@props([
    'testimonials' => collect(),
    'title' => 'Testimonials',
    'description' => 'What people think about our Services',
    'slider' => false,
])

@php
    $testimonialItems = collect($testimonials);
    $fallbackProfile = asset('images/siliconbari-client-image.png');
@endphp

@if ($testimonialItems->isNotEmpty())
    <section class="section-0-120">
        <div class="container">
            <div data-w-id="0af501ae-e91b-a098-555e-5460fd6b483c" class="section-heading-block">
                <h2 class="h2">{{ $title }}</h2>
                <p class="text-regular">{{ $description }}</p>
            </div>

            @if ($slider)
                <div class="testimonials-slider swiper" data-testimonials-slider>
                    <div class="swiper-wrapper">
                        @foreach ($testimonialItems as $testimonial)
                            <div class="swiper-slide">
                                <div data-w-id="369b3119-c136-2b79-eabf-4d78a0f3ecaa" class="testimonial-card">
                                    <div class="quotation-icon-block">
                                        <div class="quotation-icon"></div>
                                        <div class="quotation-icon"></div>
                                    </div>
                                    <p>{{ $testimonial->comments }}</p>
                                    <div class="testimonial-client-info">
                                        <img loading="lazy"
                                            src="{{ $testimonial->client_profile_url ?: $fallbackProfile }}"
                                            alt="{{ $testimonial->client_name }}" class="testimonial-client-image">
                                        <div class="testimonial-text-block">
                                            <div class="testimonial-client-name">{{ $testimonial->client_name }}</div>
                                            @if ($testimonial->client_designation)
                                                <div class="text-small">{{ $testimonial->client_designation }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="testimonial-card-wrapper">
                    @foreach ($testimonialItems as $testimonial)
                        <div data-w-id="369b3119-c136-2b79-eabf-4d78a0f3ecaa" class="testimonial-card">
                            <div class="quotation-icon-block">
                                <div class="quotation-icon"></div>
                                <div class="quotation-icon"></div>
                            </div>
                            <p>{{ $testimonial->comments }}</p>
                            <div class="testimonial-client-info">
                                <img loading="lazy"
                                    src="{{ $testimonial->client_profile_url ?: $fallbackProfile }}"
                                    alt="{{ $testimonial->client_name }}" class="testimonial-client-image">
                                <div class="testimonial-text-block">
                                    <div class="testimonial-client-name">{{ $testimonial->client_name }}</div>
                                    @if ($testimonial->client_designation)
                                        <div class="text-small">{{ $testimonial->client_designation }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endif
