@props(['insight'])

<div class="insights-card">
    <div class="insights-card-image-block">
        <img src="{{ $insight->thumbnail_url ?: asset('images/SiliconBari-The-Future-of-RISC-V-in-Data-Centers.webp') }}"
            loading="lazy" alt="{{ $insight->title }}" class="insights-card-image">
    </div>
    <div class="insights-card-text-body">
        <p class="event-date">{{ optional($insight->created_at)->format('M d, Y') }}</p>
        <div class="insights-card-text-block">
            <p class="text-large">{{ $insight->title }}</p>
            <p class="text-regular">{{ $insight->short_description }}</p>
        </div>
        <a data-wf--link-button--variant="arow-large" href="{{ route('insights.show', $insight) }}"
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
                    xmlns="http://www.w3.org/2000/svg" width="20" height="9" viewbox="0 0 20 9" fill="none">
                    <path
                        d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                        stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg></div>
        </a>
    </div>
</div>
