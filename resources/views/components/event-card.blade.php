@props(['event'])

<div class="event-card">
    <div class="event-card-label">
        <div class="svg w-embed">
            <svg width="32" height="32" viewbox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 4V7M23 4V7M4 25V10C4 9.20435 4.31607 8.44129 4.87868 7.87868C5.44129 7.31607 6.20435 7 7 7H25C25.7957 7 26.5587 7.31607 27.1213 7.87868C27.6839 8.44129 28 9.20435 28 10V25M4 25C4 25.7957 4.31607 26.5587 4.87868 27.1213C5.44129 27.6839 6.20435 28 7 28H25C25.7957 28 26.5587 27.6839 27.1213 27.1213C27.6839 26.5587 28 25.7957 28 25M4 25V15C4 14.2044 4.31607 13.4413 4.87868 12.8787C5.44129 12.3161 6.20435 12 7 12H25C25.7957 12 26.5587 12.3161 27.1213 12.8787C27.6839 13.4413 28 14.2044 28 15V25"
                    stroke="#F5F7FA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <div class="event-vertical-date">
            <div class="text-regular text-white">{{ optional($event->event_date)->format('M') }}</div>
            <div class="text-regular text-white">{{ optional($event->event_date)->format('d, Y') }}</div>
        </div>
    </div>
    <div class="event-card-content-block">
        <div class="event-card-content-text-block">
            <div class="h4">{{ $event->title }}</div>
            <div class="event-card-content-text-wrap">
                <div class="event-location">
                    <div class="svg w-embed">
                        <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.5 8.75C12.5 9.41304 12.2366 10.0489 11.7678 10.5178C11.2989 10.9866 10.663 11.25 10 11.25C9.33696 11.25 8.70107 10.9866 8.23223 10.5178C7.76339 10.0489 7.5 9.41304 7.5 8.75C7.5 8.08696 7.76339 7.45107 8.23223 6.98223C8.70107 6.51339 9.33696 6.25 10 6.25C10.663 6.25 11.2989 6.51339 11.7678 6.98223C12.2366 7.45107 12.5 8.08696 12.5 8.75Z"
                                stroke="#00A1B0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M16.25 8.75C16.25 14.7017 10 18.125 10 18.125C10 18.125 3.75 14.7017 3.75 8.75C3.75 7.0924 4.40848 5.50268 5.58058 4.33058C6.75268 3.15848 8.3424 2.5 10 2.5C11.6576 2.5 13.2473 3.15848 14.4194 4.33058C15.5915 5.50268 16.25 7.0924 16.25 8.75Z"
                                stroke="#00A1B0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <div class="text-regular text-color-primary">{{ $event->location }}</div>
                </div>
                <div class="text-regular">{!! Str::limit(strip_tags($event->description), 150) !!}</div>
            </div>
        </div>
        <a data-wf--button--variant="small-button" 
            href="{{ route('events.register', $event->id) }}"
            class="button w-variant-13c055bd-9c9a-b790-2595-34b2f1f63fc6 w-inline-block">
            <div class="text-regular">Register Now</div>
            <div class="button-icon-wrap">
                <div class="button-icon w-embed">
                    <svg width="20" height="9" viewbox="0 0 20 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                            stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
            </div>
        </a>
    </div>
</div>
