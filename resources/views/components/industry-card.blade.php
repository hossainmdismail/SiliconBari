@props(['industry', 'isLeft' => false])

@php
    $keyApplications = collect($industry->key_applications ?? [])
        ->filter(fn($item): bool => filled($item['title'] ?? null))
        ->sortBy('sort_order')
        ->values();

    $expertiseItems = collect($industry->expertise ?? [])
        ->filter(fn($item): bool => filled($item['title'] ?? null))
        ->sortBy('sort_order')
        ->values();

    $imageWrapperClass = $isLeft ? 'industry-card-image-wrapper is-left' : 'industry-card-image-wrapper';
@endphp

<div class="industry-card">
    <div data-w-id="1246cf1e-75e3-c0f7-eacc-bcab6f5200eb" class="industry-inner-card">
        <div class="industry-card-content">
            <div class="industry-title-block">
                <h2 class="h2">{{ $industry->name }}</h2>
                @if ($industry->short_description)
                    <div class="text-regular">{{ $industry->short_description }}</div>
                @endif
            </div>

            @if ($keyApplications->isNotEmpty())
                <div class="industry-card-key-block">
                    <div class="industry-card-key-title-block">
                        <div class="h6 font-weight">Key Applications</div>
                    </div>
                    <div class="industry-card-key-lists">
                        @foreach ($keyApplications as $item)
                            <div class="industry-card-key-list">
                                <div class="industry-card-key-list-icon w-embed"><svg width="8" height="8"
                                        viewbox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="4" cy="4" r="4" fill="#00A1B0"></circle>
                                    </svg></div>
                                <div class="text-regular">{{ $item['title'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <div class="{{ $imageWrapperClass }}">
            <img src="{{ $industry->image_url }}" loading="lazy" alt="{{ $industry->name }}" class="service-card-image">
        </div>
    </div>

    @if ($expertiseItems->isNotEmpty())
        <div class="industry-card-key-block meta">
            <div class="h6 font-weight">Our Expertise in {{ $industry->name }}</div>
            <div class="industry-key-grid">
                @foreach ($expertiseItems as $item)
                    <div class="industry-card-key-list">
                        <div class="svg w-embed"><svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="4" fill="#00A1B0"></circle>
                                <circle cx="12" cy="12" r="12" fill="#00A1B0" fill-opacity="0.1"></circle>
                            </svg></div>
                        <div class="text-regular">{{ $item['title'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
