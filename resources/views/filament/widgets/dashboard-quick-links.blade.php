<x-filament-widgets::widget class="fi-dashboard-quick-links">
    <div style="display: grid; gap: 1.5rem;">
        <x-filament::section
            heading="Quick Actions"
            description="Shortcuts that help clients understand where to manage each part of the website."
        >
            <div
                style="
                    display: grid;
                    gap: 1rem;
                    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                "
            >
                @foreach ($contentLinks as $link)
                    <div
                        style="
                            border: 1px solid rgba(148, 163, 184, 0.22);
                            border-radius: 1rem;
                            padding: 1.25rem;
                            background: rgba(255, 255, 255, 0.02);
                            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
                        "
                    >
                        <div style="display: flex; align-items: flex-start; gap: 0.875rem; margin-bottom: 0.875rem;">
                            <div
                                style="
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    width: 2.5rem;
                                    height: 2.5rem;
                                    border-radius: 0.75rem;
                                    background: rgba(0, 161, 176, 0.12);
                                    color: #00a1b0;
                                    flex-shrink: 0;
                                "
                            >
                                    <x-filament::icon :icon="$link['icon']" class="h-5 w-5" />
                            </div>

                            <div>
                                <h3 style="margin: 0; font-size: 1rem; font-weight: 700;">{{ $link['label'] }}</h3>
                            </div>
                        </div>

                        <p style="margin: 0 0 1rem; font-size: 0.95rem; line-height: 1.6; color: rgb(148 163 184);">
                            {{ $link['description'] }}
                        </p>

                        <div style="display: flex; flex-wrap: wrap; gap: 0.625rem;">
                            <x-filament::button :href="$link['manageUrl']" color="gray" size="sm" tag="a">
                                Manage
                            </x-filament::button>

                            <x-filament::button :href="$link['createUrl']" color="primary" size="sm" tag="a">
                                Add New
                            </x-filament::button>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-filament::section>

        <x-filament::section
            heading="Site Settings"
            description="Core settings that affect branding, scripts, and global frontend behavior."
        >
            <div
                style="
                    display: grid;
                    gap: 1rem;
                    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                "
            >
                @foreach ($settingsLinks as $link)
                    <a
                        href="{{ $link['url'] }}"
                        style="
                            display: block;
                            border: 1px solid rgba(148, 163, 184, 0.22);
                            border-radius: 1rem;
                            padding: 1.25rem;
                            background: rgba(255, 255, 255, 0.02);
                            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
                            text-decoration: none;
                            color: inherit;
                        "
                    >
                        <div style="display: flex; align-items: center; gap: 0.875rem; margin-bottom: 0.875rem;">
                            <div
                                style="
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    width: 2.5rem;
                                    height: 2.5rem;
                                    border-radius: 0.75rem;
                                    background: rgba(148, 163, 184, 0.12);
                                    color: rgb(226 232 240);
                                    flex-shrink: 0;
                                "
                            >
                                <x-filament::icon :icon="$link['icon']" class="h-5 w-5" />
                            </div>

                            <h3 style="margin: 0; font-size: 1rem; font-weight: 700;">{{ $link['label'] }}</h3>
                        </div>

                        <p style="margin: 0; font-size: 0.95rem; line-height: 1.6; color: rgb(148 163 184);">
                            {{ $link['description'] }}
                        </p>
                    </a>
                @endforeach
            </div>
        </x-filament::section>
    </div>
</x-filament-widgets::widget>
