<x-filament-widgets::widget class="fi-account-widget">
    <a
        href="{{ $websiteUrl }}"
        target="_blank"
        rel="noopener noreferrer"
        style="display: block; color: inherit; text-decoration: none;"
    >
        <x-filament::section>
            <div
                style="
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 3.5rem;
                    height: 3.5rem;
                    border-radius: 999px;
                    background: rgb(0 0 0);
                    color: rgb(255 255 255);
                    flex-shrink: 0;
                "
            >
                <x-filament::icon :icon="\Filament\Support\Icons\Heroicon::OutlinedGlobeAlt" class="h-7 w-7" />
            </div>

            <div class="fi-account-widget-main">
                <h2 class="fi-account-widget-heading">
                    Visit Website
                </h2>

                <p class="fi-account-widget-user-name">
                    Open the live public site in a new tab.
                </p>
            </div>
        </x-filament::section>
    </a>
</x-filament-widgets::widget>
