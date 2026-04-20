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

        <x-filament::section
            heading="Active Sessions"
            description="Shows how many browsers are currently signed in with this same account."
        >
            @if (! $supportsDatabaseSessions)
                <p style="margin: 0; font-size: 0.95rem; line-height: 1.6; color: rgb(148 163 184);">
                    Active session tracking is only available when the app is using the database session driver.
                </p>
            @else
                <div style="display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 1rem; flex-wrap: wrap;">
                    <div>
                        <h3 style="margin: 0 0 0.25rem; font-size: 1rem; font-weight: 700;">
                            {{ count($activeSessions) }} active {{ \Illuminate\Support\Str::plural('session', count($activeSessions)) }}
                        </h3>
                        <p style="margin: 0; font-size: 0.9rem; line-height: 1.6; color: rgb(148 163 184);">
                            Current browser is marked, and you can log out any other device from here.
                        </p>
                    </div>

                    @if (count($activeSessions) > 1)
                        <x-filament::button color="danger" size="sm" wire:click="revokeOtherSessions">
                            Log Out Other Devices
                        </x-filament::button>
                    @endif
                </div>

                <div style="display: grid; gap: 0.875rem;">
                    @forelse ($activeSessions as $session)
                        <div
                            style="
                                display: flex;
                                align-items: flex-start;
                                justify-content: space-between;
                                gap: 1rem;
                                border: 1px solid rgba(148, 163, 184, 0.22);
                                border-radius: 1rem;
                                padding: 1rem 1.1rem;
                                background: rgba(255, 255, 255, 0.02);
                            "
                        >
                            <div style="min-width: 0;">
                                <div style="display: flex; align-items: center; gap: 0.625rem; margin-bottom: 0.4rem; flex-wrap: wrap;">
                                    <strong style="font-size: 0.98rem;">{{ $session['ip_address'] }}</strong>

                                    @if ($session['is_current'])
                                        <span
                                            style="
                                                display: inline-flex;
                                                align-items: center;
                                                border-radius: 999px;
                                                background: rgba(0, 161, 176, 0.12);
                                                color: #00a1b0;
                                                padding: 0.2rem 0.55rem;
                                                font-size: 0.78rem;
                                                font-weight: 700;
                                            "
                                        >
                                            Current Device
                                        </span>
                                    @endif
                                </div>

                                <p style="margin: 0 0 0.35rem; font-size: 0.92rem; line-height: 1.5; color: rgb(226 232 240); word-break: break-word;">
                                    {{ $session['user_agent'] }}
                                </p>

                                <p style="margin: 0; font-size: 0.84rem; line-height: 1.5; color: rgb(148 163 184);">
                                    Last active {{ $session['last_active'] }}
                                </p>
                            </div>

                            @if (! $session['is_current'])
                                <x-filament::button color="gray" size="sm" wire:click="revokeSession('{{ $session['id'] }}')">
                                    Log Out
                                </x-filament::button>
                            @endif
                        </div>
                    @empty
                        <p style="margin: 0; font-size: 0.95rem; line-height: 1.6; color: rgb(148 163 184);">
                            No active sessions were found for this account right now.
                        </p>
                    @endforelse
                </div>
            @endif
        </x-filament::section>
    </div>
</x-filament-widgets::widget>
