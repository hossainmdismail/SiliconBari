@extends('layouts.app')

@section('seo_key', 'casestudy')
@section('page_styles')
    <style>
        .case-study-empty-state {
            min-height: 320px;
            border: 1px solid rgba(47, 94, 140, 0.12);
            border-radius: 24px;
            background: #f5f7fa;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 32px;
            text-align: center;
        }

        .case-study-empty-state-copy {
            max-width: 520px;
            margin: 0 auto;
        }
    </style>
@endsection
@section('content')
    <section class="banner-section case-study">
        <div class="container">
            <div class="technology-banner-title">
                <div data-w-id="b62f9eee-344d-9d27-264d-8977a88cab2a" class="section-title-block">
                    <h1 class="h1 text-color-white">Case Studies</h1>
                    <div class="text-regular text-white">Explore how we&#x27;ve helped semiconductor companies accelerate
                        their development, reduce risk, and achieve silicon success across diverse applications.</div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-120-120">
        <div class="container">
            @if (($caseStudies ?? collect())->isNotEmpty())
                <div class="case-study-grid">
                    @foreach ($caseStudies as $caseStudy)
                        <div data-w-id="b46dd7ec-c96c-d543-1607-ce8cc89e41bd" class="case-studies-card">
                            <div class="case-studies-card-image-block">
                                <img
                                    src="{{ $caseStudy->thumbnail_url ?: asset('images/Automotive-ADAS-System-Development.webp') }}"
                                    loading="lazy"
                                    alt="{{ $caseStudy->title }}"
                                    class="case-studies-card-image"
                                >
                            </div>
                            <div class="case-studies-content">
                                <div class="text-regular text-color-primary">
                                    {{ optional($caseStudy->published_date)->format('M d, Y') ?: 'Coming Soon' }}
                                </div>
                                <div class="case-studies-card-text-block padding-top-16">
                                    <p class="text-large">{{ $caseStudy->title }}</p>
                                    <p class="text-regular">{{ $caseStudy->short_description }}</p>
                                </div>
                                <a data-wf--link-button--variant="arow-large"
                                    href="{{ route('casestudy.show', $caseStudy) }}"
                                    class="link-button w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 w-inline-block">
                                    <div>Learn More</div>
                                    <div class="svg w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 w-embed"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16"
                                            fill="none">
                                            <path d="M3.3335 8H12.6668" stroke="#00A1B0" stroke-width="1.33333"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M8 3.3335L12.6667 8.00016L8 12.6668" stroke="currentColor"
                                                stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg></div>
                                    <div class="svg w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 arrow-large w-embed"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="9" viewbox="0 0 20 9"
                                            fill="none">
                                            <path
                                                d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                                stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg></div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="case-study-empty-state">
                    <div class="case-study-empty-state-copy">
                        <h2 class="h3">No case studies published yet.</h2>
                        <p class="text-regular">Case Study add korlei ei page-e automatically show korbe.</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <x-lead-section
        title="Ready to Transform Your Semiconductor Vision?"
        description="Let's discuss how our expertise can accelerate your next semiconductor project"
        {{-- book-link="#"
        schedule-link="#" --}}
    />
@endsection
