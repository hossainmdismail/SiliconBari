@props([
    'title',
    'description',
    'bookLink' => route('contact'),
    'scheduleLink' => 'https://calendly.com/synexdigital/30min',
])

<section class="section-60-60 bg-neutral">
    <div class="container">
        <div data-w-id="414ec1d4-bda9-0e0b-a606-43a3f0a3ce43" class="cta-content-wrapper">
            <div class="cta-text-block">
                <h2 class="h2">{{ $title }}</h2>
                <p class="text-regular">{{ $description }}</p>
            </div>
            <div class="button-group">
                <a schedule="True" data-wf--button--variant="base" href="{{ $bookLink }}" class="button w-inline-block">
                    <div class="text-regular">Book Consultation</div>
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
                <a schedule="True" data-wf--button--variant="secondary" href="{{ $scheduleLink }}"
                    class="button w-variant-1f7bab6e-c91f-cebe-0855-7d95a492a433 w-inline-block">
                    <div class="text-regular">Schedule a Meeting</div>
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
</section>
