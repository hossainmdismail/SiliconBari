@props(['caseStudy'])

<div data-w-id="b46dd7ec-c96c-d543-1607-ce8cc89e41bd" class="case-studies-card">
    <div class="case-studies-card-image-block">
        <img src="{{ $caseStudy->thumbnail_url ?: asset('images/Automotive-ADAS-System-Development.webp') }}"
            loading="lazy" 
            alt="{{ $caseStudy->title }}" 
            class="case-studies-card-image">
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
            <div class="svg w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 w-embed">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16" fill="none">
                    <path d="M3.3335 8H12.6668" stroke="#00A1B0" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M8 3.3335L12.6667 8.00016L8 12.6668" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <div class="svg w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 arrow-large w-embed">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="9" viewbox="0 0 20 9" fill="none">
                    <path d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
        </a>
    </div>
</div>
