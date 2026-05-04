@props(['event'])

<a href="{{ route('events.register', $event) }}" style="text-decoration: none;" class="upcoming-events-text-box">
    <div class="upcoming-events-line"></div>
    <div class="upcoming-events-text-wrapper">
        <p class="event-date">{{ optional($event->event_date)->format('M d, Y') }}</p>
        <div class="upcoming-events-text-block">
            <p class="text-large neutral-color-01">{{ $event->title }}</p>
            <p class="text-regular neutral-color-01">{{ $event->location }}<br></p>
        </div>
    </div>
</a>