@props([
    'teams' => collect(),
    'title' => 'Leadership Team',
    'description' => 'Meet the experts driving innovation at SiliconBari',
])

@php
    $teamItems = collect($teams);
    $fallbackProfile = asset('images/image-28-4.avif');
@endphp

@if ($teamItems->isNotEmpty())
    <section class="section-120-120">
        <div class="container">
            <div data-w-id="7c1d2842-4c95-3926-bd5c-e34037b07df6" class="team-title-block">
                <h2 class="h2">{{ $title }}</h2>
                <div class="text-regular">{{ $description }}</div>
            </div>
            <div class="team-grid">
                @foreach ($teamItems as $team)
                    <div data-w-id="d2eec07a-c8ae-57e2-8af8-152c88312642" class="team-card">
                        <div class="team-image-wrap">
                            <img
                                loading="lazy"
                                src="{{ $team->profile_url ?: $fallbackProfile }}"
                                alt="{{ $team->name }}"
                                class="team-image"
                            >
                        </div>
                        <div class="team-content-block">
                            <div class="h6">{{ $team->name }}</div>
                            <div class="team-content-bottom">
                                @if ($team->objective)
                                    <div class="text-regular text-color-primary">{{ $team->objective }}</div>
                                @endif
                                @if ($team->details)
                                    <div class="text-regular">
                                        {{ \Illuminate\Support\Str::limit(trim(strip_tags($team->details)), 120) }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
