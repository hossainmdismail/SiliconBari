@props(['service', 'isReversed' => false])

@php
    $deliverables = collect($service->what_we_deliver ?? [])
        ->filter(fn ($item): bool => filled($item['title'] ?? null))
        ->sortBy('sort_order')
        ->values();

    $imageUrl = $service->thumbnail_url ?: $service->banner_url;
@endphp

<div data-w-id="{{ $isReversed ? '0d44f38f-a64c-8cfc-77e7-9e21f72b7690' : '1246cf1e-75e3-c0f7-eacc-bcab6f5200eb' }}"
    class="service-card-large">
    @if ($isReversed)
        <div class="service-card-image-wrap">
            <img src="{{ $imageUrl }}" loading="lazy" alt="{{ $service->name }}" class="service-card-image">
        </div>
    @endif

    <div class="service-card-text-content">
        <div class="service-card-title-block">
            @if ($service->category)
                <div class="badge">{{ $service->category }}</div>
            @endif

            <h2 class="h2">{{ $service->name }}</h2>

            @if ($service->short_description)
                <div class="text-regular">{{ $service->short_description }}</div>
            @endif
        </div>

        @if ($deliverables->isNotEmpty())
            <div class="service-card-check-list-block">
                <div class="h6 font-space">What We Deliver</div>
                <div class="service-card-check-list">
                    @foreach ($deliverables as $item)
                        <div class="service-card-check">
                            <div class="svg w-embed"><svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.75 10.625L8.75 15.625L16.25 4.375" stroke="#2F5E8C" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg></div>
                            <div class="text-regular">{{ $item['title'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <a data-wf--button--variant="base" href="{{ route('services.show', $service) }}" class="button w-inline-block">
            <div class="text-regular">Learn More</div>
            <div class="button-icon-wrap">
                <div class="button-icon w-embed"><svg width="20" height="9" viewbox="0 0 20 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                            stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg></div>
            </div>
        </a>
    </div>

    @unless ($isReversed)
        <div class="service-card-image-wrap">
            <img src="{{ $imageUrl }}" loading="lazy" alt="{{ $service->name }}" class="service-card-image">
        </div>
    @endunless
</div>
