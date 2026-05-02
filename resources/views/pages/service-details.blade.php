@extends('layouts.app')

@section('title', $service->name)
@section('description', $service->short_description)

@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="service-banneer-title-block">
                <div data-w-id="b62f9eee-344d-9d27-264d-8977a88cab2a" class="section-title-block">
                    <div class="badge">{{ $service->category }}</div>
                    <h1 class="h1 text-color-white">{{ $service->name }}</h1>
                    <div class="text-regular text-white">{{ $service->short_description }}</div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-120-120">
        <div class="container">
            <div class="services-grid">
                <div data-w-id="1246cf1e-75e3-c0f7-eacc-bcab6f5200eb" class="service-card-large">
                    <div class="service-card-text-content">
                        <div class="service-card-title-block">
                            <h2 class="h2">Overview</h2>
                            <div class="text-regular">{{ $service->overview }}</div>
                        </div>
                        @if ($whatWeDeliver->isNotEmpty())
                            <div class="service-card-check-list-block padding-bottom-less">
                                <div class="h2">What We Deliver</div>
                                <div class="service-card-check-list">
                                    @foreach ($whatWeDeliver as $item)
                                        <div class="service-card-check">
                                            <div class="svg w-embed"><svg width="20" height="20" viewbox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.75 10.625L8.75 15.625L16.25 4.375" stroke="#2F5E8C"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg></div>
                                            <div class="text-regular">{{ $item['title'] }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="service-card-check-list-block padding-bottom-less">
                            <div class="h2">Our Process</div>
                            <div class="service-card-check-list">
                                @foreach ($ourProcess as $item)
                                    <div class="service-card-check">
                                        <div class="svg w-embed"><svg width="20" height="20" viewbox="0 0 20 20"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.75 10.625L8.75 15.625L16.25 4.375" stroke="#2F5E8C"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></div>
                                        <div class="text-regular">{{ $item['title'] }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="service-card-image-wrap"><img src="{{ $service->banner_url ?: $service->thumbnail_url }}"
                            loading="lazy" alt="{{ $service->name }}" class="service-card-image"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-120-120 responsive">
        <div class="container">
            <div class="services-grid">
                <div data-w-id="ad7eeb7e-7b50-9436-cf88-8c6d6b8c26a4" class="service-card-large releaze">
                    <div class="service-card-text-content small">
                        <div class="service-card-title-block">
                            <h2 class="h2">Key Features</h2>
                            <div class="text-regular">{{ $service->key_features_description }}</div>
                        </div>
                    </div>
                    <div class="service-key-features">
                        @foreach ($keyFeatures as $item)
                            <div class="service-key">
                                <div class="svg service w-embed"><svg width="22" height="22" viewbox="0 0 22 22"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.66667 11.8333L10.1667 14.3333L14.3333 8.5M21 11C21 12.3132 20.7413 13.6136 20.2388 14.8268C19.7363 16.0401 18.9997 17.1425 18.0711 18.0711C17.1425 18.9997 16.0401 19.7363 14.8268 20.2388C13.6136 20.7413 12.3132 21 11 21C9.68678 21 8.38642 20.7413 7.17317 20.2388C5.95991 19.7363 4.85752 18.9997 3.92893 18.0711C3.00035 17.1425 2.26375 16.0401 1.7612 14.8268C1.25866 13.6136 1 12.3132 1 11C1 8.34784 2.05357 5.8043 3.92893 3.92893C5.8043 2.05357 8.34784 1 11 1C13.6522 1 16.1957 2.05357 18.0711 3.92893C19.9464 5.8043 21 8.34784 21 11Z"
                                            stroke="#F5F7FA" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg></div>
                                <div class="h6 text-white">{{ $item['title'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-lead-section
        title="Let’s Discuss Your Project"
        description="Contact our team to learn how we can help accelerate your semiconductor development"
        {{-- book-link="#"
        schedule-link="#" --}}
    />
@endsection
