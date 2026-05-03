@extends('layouts.app')

@section('seo_key', 'insights')
@section('title', 'Insights')
@section('description', 'Stay updated with the latest insights, technical articles, and thought leadership from the Silicon Bari team.')

@section('page_styles')
    <style>
        .insight-meta-row,
        .insight-empty-state {
            display: flex;
            gap: 12px;
        }

        .insight-meta-row {
            flex-wrap: wrap;
            align-items: center;
        }

        .insight-card-copy {
            display: flex;
            flex: 1;
            flex-direction: column;
            gap: 16px;
        }

        .insight-card-copy .text-regular {
            margin-bottom: 0;
        }

        .insight-empty-state,
        .insight-events-placeholder {
            min-height: 320px;
            border: 1px solid rgba(47, 94, 140, 0.12);
            border-radius: 24px;
            background: #f5f7fa;
            align-items: center;
            justify-content: center;
            padding: 40px 32px;
            text-align: center;
        }

        .insight-empty-state-copy {
            max-width: 520px;
            margin: 0 auto;
        }
    </style>
@endsection

@section('content')
    <section class="banner-section insights">
        <div class="container">
            <div class="technology-banner-title">
                <div data-w-id="b62f9eee-344d-9d27-264d-8977a88cab2a" class="section-title-block">
                    <h1 class="h1 text-color-white">Insights</h1>
                    <div class="text-regular text-white">Stay updated with the latest insights, technical articles, and
                        expert perspectives from our semiconductor engineering team.</div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-120-120">
        <div class="container">
            <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100" class="w-tabs">
                <div class="insights-tab-menu w-tab-menu">
                    <a data-w-tab="Tab 1" class="insights-tab-link w-inline-block w-tab-link w--current">
                        <div class="text-regular semi-bold">Blog</div>
                    </a>
                    <a data-w-tab="Tab 2" class="insights-tab-link w-inline-block w-tab-link">
                        <div class="text-regular semi-bold">Events</div>
                    </a>
                </div>

                <div class="w-tab-content">
                    <div data-w-tab="Tab 1" class="insights-tab-content w-tab-pane w--tab-active">
                        @if (($insights ?? collect())->isNotEmpty())
                            <div class="case-study-grid">
                                @foreach ($insights as $insight)
                                    <div class="case-studies-card">
                                        <div class="case-studies-card-image-block">
                                            <img src="{{ $insight->thumbnail_url ?: asset('images/SiliconBari-The-Future-of-RISC-V-in-Data-Centers.webp') }}"
                                                loading="lazy" alt="{{ $insight->title }}" class="case-studies-card-image">
                                        </div>
                                        <div class="case-studies-content">
                                            <div class="insight-meta-row">
                                                <div class="text-regular text-color-primary">
                                                    {{ optional($insight->created_at)->format('M d, Y') }}
                                                </div>
                                                @if ($insight->category)
                                                    <div class="text-regular">{{ $insight->category }}</div>
                                                @endif
                                            </div>
                                            <div class="insight-card-copy">
                                                <div class="case-studies-card-text-block padding-top-16">
                                                    <p class="text-large">{{ $insight->title }}</p>
                                                    <p class="text-regular">{{ $insight->short_description }}</p>
                                                </div>
                                                <a data-wf--link-button--variant="arow-large"
                                                    href="{{ route('insights.show', $insight) }}"
                                                    class="link-button w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 w-inline-block">
                                                    <div>Learn More</div>
                                                    <div class="svg w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 w-embed"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            viewbox="0 0 16 16" fill="none">
                                                            <path d="M3.3335 8H12.6668" stroke="#00A1B0" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M8 3.3335L12.6667 8.00016L8 12.6668" stroke="currentColor"
                                                                stroke-width="1.33333" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg></div>
                                                    <div
                                                        class="svg w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 arrow-large w-embed">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="9"
                                                            viewbox="0 0 20 9" fill="none">
                                                            <path
                                                                d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                                                stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="insight-empty-state">
                                <div class="insight-empty-state-copy">
                                    <h2 class="h3">No insights published yet.</h2>
                                    <p class="text-regular">Active blog posts add korlei ei page-e automatically show
                                        korbe.</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div data-w-tab="Tab 2" class="insights-tab-content w-tab-pane">
                        <div class="event-grid">
                            @forelse ($events ?? [] as $event)
                                <x-event-card :event="$event" />
                            @empty
                                <div class="insight-empty-state-copy">
                                    <h2 class="h3">No events scheduled yet.</h2>
                                    <p class="text-regular">Stay tuned for upcoming industry events and webinars.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-lead-section title="Ready to Transform Your Semiconductor Vision?"
        description="Let's discuss how our expertise can accelerate your next semiconductor project" {{-- book-link="#"
        schedule-link="#" --}} />
@endsection