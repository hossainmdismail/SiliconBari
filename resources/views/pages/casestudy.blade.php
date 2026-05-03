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
                        <x-case-study-card-two :caseStudy="$caseStudy" />
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
