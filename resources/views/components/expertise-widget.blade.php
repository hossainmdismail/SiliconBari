@props(['title', 'description'])

<div data-w-id="4ba82bee-3418-31da-b2f5-6523c9295b3b" class="expertise-widget">
    <div class="expertise-widget-meta-block">
        <img loading="lazy" src="{{ asset('images/siliconbari-svg-icon.svg') }}" alt="{{ $title }}" class="expertise-widget-icon">
        <p class="expertise-widget-title">{{ $title }}</p>
    </div>
    <div class="expertise-widget-text-block">
        <p class="text-small">{{ $description }}</p>
    </div>
</div>
