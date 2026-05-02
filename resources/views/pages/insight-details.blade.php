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
    <x-lead-section
        title="Ready to Transform Your Semiconductor Vision?"
        description="Let's discuss how our expertise can accelerate your next semiconductor project"
        {{-- book-link="#"
        schedule-link="#" --}}
    />
@endsection
