@props(['career'])

<div class="career-card">
    <div class="career-card-wrapper">
        <div class="h6">{{ $career->title }}</div>
        <div class="career-card-text-block">
            <div class="career-card-meta">
                <div class="text-regular text-color-primary">{{ $career->work_location_type }}</div>
                <div class="text-regular text-color-primary">{{ $career->employment_type }}</div>
                <div class="text-wrap">
                    <div class="text-regular text-color-primary">Exp</div>
                    <div class="text-regular text-color-primary">{{ $career->experience_level }}</div>
                </div>
            </div>
            <div>{{ $career->short_description }}</div>
        </div>
    </div>
    <a href="{{ route('careers.show', $career->slug) }}" class="button w-inline-block">
        <div class="text-regular">Apply Now</div>
        <div class="button-icon-wrap">
            <div class="button-icon w-embed">
                <svg width="20" height="9" viewbox="0 0 20 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                        stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round">
                    </path>
                </svg>
            </div>
        </div>
    </a>
</div>
