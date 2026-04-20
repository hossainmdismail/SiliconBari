@extends('layouts.app')

@section('title', $insight->meta_title ?: $insight->title)
@section('description', $insight->meta_description ?: $insight->short_description)

@section('content')
    <section class="banner-section case-study">
        <div class="container">
            <div class="technology-banner-title">
                <div data-w-id="b62f9eee-344d-9d27-264d-8977a88cab2a" class="section-title-block">
                    <h1 class="h1 text-color-white">{{ $insight->title }}</h1>
                    <div class="case-study-header-meta">
                        <div class="text-regular text-white">{{ optional($insight->created_at)->format('M d, Y') }}</div>
                        <div class="casestudy-icon w-embed"><svg width="6" height="6" viewbox="0 0 6 6"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="3" cy="3" r="3" fill="#F5F7FA"></circle>
                            </svg></div>
                        <div class="text-wrap">
                            <div class="text-regular text-white">By</div>
                            <div class="text-regular text-white">{{ $insight->author ?: 'Silicon Bari Team' }}</div>
                        </div>
                        <div class="casestudy-icon w-embed"><svg width="6" height="6" viewbox="0 0 6 6"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="3" cy="3" r="3" fill="#F5F7FA"></circle>
                            </svg></div>
                        <div class="text-regular text-white">{{ $insight->category ?: 'Insights' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-80-80">
        <div class="container">
            <div class="case-study-wrapper">
                <div class="rich-text w-richtext">
                    @if ($insight->body)
                        {!! $insight->body !!}
                    @else
                        <p>{{ $insight->short_description }}</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="section-60-60 bg-neutral">
        <div class="container">
            <div data-w-id="414ec1d4-bda9-0e0b-a606-43a3f0a3ce43" class="cta-content-wrapper">
                <div class="cta-text-block">
                    <h2 class="h2">Ready to Transform Your Semiconductor Vision?</h2>
                    <p class="text-regular">Let&#x27;s discuss how our expertise can accelerate your next semiconductor
                        project</p>
                </div>
                <div class="button-group">
                    <a schedule="True" data-wf--button--variant="base" href="#" class="button w-inline-block">
                        <div class="text-regular">Book Consultation</div>
                        <div class="button-icon-wrap">
                            <div class="button-icon w-embed"><svg width="20" height="9" viewbox="0 0 20 9"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                        stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg></div>
                        </div>
                    </a>
                    <a schedule="True" data-wf--button--variant="secondary" href="#"
                        class="button w-variant-1f7bab6e-c91f-cebe-0855-7d95a492a433 w-inline-block">
                        <div class="text-regular">Schedule a Meeting</div>
                        <div class="button-icon-wrap">
                            <div class="button-icon w-embed"><svg width="20" height="9" viewbox="0 0 20 9"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                        stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
