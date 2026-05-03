@extends('layouts.app')

@section('seo_key', 'casestudy')
@section('content')
    <section class="banner-section case-study">
        <div class="container">
            <div class="technology-banner-title">
                <div data-w-id="b62f9eee-344d-9d27-264d-8977a88cab2a" class="section-title-block">
                    <h1 class="h1 text-color-white">{{ $caseStudy->title }}</h1>
                    <div class="case-study-header-meta">
                        @if ($caseStudy->published_date)
                            <div class="text-regular text-white">{{ $caseStudy->published_date->format('M d, Y') }}</div>
                        @endif
                        @if ($caseStudy->published_date && ($caseStudy->written_by || $caseStudy->industry))
                            <div class="casestudy-icon w-embed"><svg width="6" height="6" viewbox="0 0 6 6"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="3" cy="3" r="3" fill="#F5F7FA"></circle>
                                </svg></div>
                        @endif
                        @if ($caseStudy->written_by)
                            <div class="text-wrap">
                                <div class="text-regular text-white">By</div>
                                <div class="text-regular text-white">{{ $caseStudy->written_by }}</div>
                            </div>
                        @endif
                        @if ($caseStudy->written_by && $caseStudy->industry)
                            <div class="casestudy-icon w-embed"><svg width="6" height="6" viewbox="0 0 6 6"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="3" cy="3" r="3" fill="#F5F7FA"></circle>
                                </svg></div>
                        @endif
                        @if ($caseStudy->industry)
                            <div class="text-regular text-white">{{ $caseStudy->industry }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-80-80">
        <div class="container">
            <div class="case-study-wrapper">
                <div class="casestudy-main-wrap">
                    <div class="rich-text w-richtext">
                        {!! $caseStudy->text_body !!}
                    </div>
                    <div class="case-study-footer">
                        @if (collect($caseStudy->features ?? [])->isNotEmpty())
                            <div class="case-study-keys">
                                @foreach (collect($caseStudy->features)->sortBy('sort_order') as $feature)
                                    <div class="case-study-keys-card">
                                        <div class="case-study-keys-inner-card">
                                            <div class="svg w-embed"><svg width="20" height="20" viewbox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7 10.75L9.25 13L13 7.75M19 10C19 11.1819 18.7672 12.3522 18.3149 13.4442C17.8626 14.5361 17.1997 15.5282 16.364 16.364C15.5282 17.1997 14.5361 17.8626 13.4442 18.3149C12.3522 18.7672 11.1819 19 10 19C8.8181 19 7.64778 18.7672 6.55585 18.3149C5.46392 17.8626 4.47177 17.1997 3.63604 16.364C2.80031 15.5282 2.13738 14.5361 1.68508 13.4442C1.23279 12.3522 1 11.1819 1 10C1 7.61305 1.94821 5.32387 3.63604 3.63604C5.32387 1.94821 7.61305 1 10 1C12.3869 1 14.6761 1.94821 16.364 3.63604C18.0518 5.32387 19 7.61305 19 10Z"
                                                        stroke="#00A1B0" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg></div>
                                            <div class="case-study-keys-content">
                                                <div class="text-small">{{ $feature['name'] ?? '' }}</div>
                                                <div class="text-regular semi-bold">{{ $feature['value'] ?? '' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if ($caseStudy->technologies->isNotEmpty())
                            <div class="technology-used">
                                <div class="h6">Technologies Used</div>
                                <div class="technology-used-grid">
                                    @foreach ($caseStudy->technologies as $technology)
                                        <div class="stacks">{{ $technology->name }}</div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="case-study-meta-block">
                    <div class="text-large">Project Overview</div>
                    <div class="case-study-meta-inner-block">
                        @if ($caseStudy->industry)
                            <div class="case-study-meta">
                                <div class="text-small text-color-primary">Industry</div>
                                <div class="text-regular">{{ $caseStudy->industry }}</div>
                            </div>
                        @endif
                        @if ($caseStudy->category)
                            <div class="case-study-meta">
                                <div class="text-small text-color-primary">Category</div>
                                <div class="text-regular">{{ $caseStudy->category }}</div>
                            </div>
                        @endif
                        @if ($caseStudy->written_by)
                            <div class="case-study-meta">
                                <div class="text-small text-color-primary">Author</div>
                                <div class="text-regular">{{ $caseStudy->written_by }}</div>
                            </div>
                        @endif
                        @if ($caseStudy->published_date)
                            <div class="case-study-meta">
                                <div class="text-small text-color-primary">Published</div>
                                <div class="text-regular">{{ $caseStudy->published_date->format('M d, Y') }}</div>
                            </div>
                        @endif
                    </div>
                    <div class="case-study-cta">
                        <div class="text-large">Interested in similar results?</div>
                        <a schedule="True" data-wf--button--variant="base" href="{{ route('contact') }}" class="button w-inline-block">
                            <div class="text-regular">Contact Our Team</div>
                            <div class="button-icon-wrap">
                                <div class="button-icon w-embed"><svg width="20" height="9" viewbox="0 0 20 9"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                            stroke="white" stroke-width="1.2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-lead-section
        title="Ready to Transform Your Semiconductor Vision?"
        description="Let's discuss how our expertise can accelerate your next semiconductor project"
    />
@endsection
