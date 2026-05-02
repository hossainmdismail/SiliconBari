@props([
    'brands' => collect(),
    'title' => 'TRUSTED BY 3,000+ INDUSTRIES',
])

@php
    $brandItems = collect($brands)
        ->filter(fn ($brand): bool => filled($brand->brand_image_url ?? null));
@endphp

@if ($brandItems->isNotEmpty())
    <section class="section-80-80 neutral-color">
        <div data-w-id="22183e64-2dd1-3e1a-2ab3-9013a5cfd04e" class="container">
            <div class="brand-ticker-title-wrap">
                <p class="brand-ticker-title">{{ $title }}</p>
            </div>
            <div class="brand-ticker-wrapper">
                <div class="brand-ticker-line">
                    @foreach (range(1, 3) as $tickerRow)
                        <div class="brand-ticker-brand">
                            @foreach ($brandItems as $brand)
                                <img
                                    loading="lazy"
                                    src="{{ $brand->brand_image_url }}"
                                    alt="Brand logo"
                                    class="brand-logo"
                                >
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
