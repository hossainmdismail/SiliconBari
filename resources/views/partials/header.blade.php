<header data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease"
    role="banner" class="navbar w-nav">
    <div class="navbar-wrapper">
        <a href="/" aria-current="page" class="navbar-brand w-nav-brand w--current">
            <img loading="eager" src="{{ $globalSettings?->logo_url ?: asset('images/Silicon-Bari-Nav-Logo.svg') }}"
                alt="{{ $globalSettings?->site_name ?: config('app.name') }}" class="navbar-logo">
        </a>
        <nav role="navigation" class="nav-menu-wrapper w-nav-menu">
            <ul role="list" class="nav-menu-list-wrapper w-list-unstyled">
                <li>
                    <a href="{{ route('about') }}" class="nav-link">About Us</a>
                </li>
                <li>
                    <div data-delay="0" data-hover="false" class="nav-dropdown w-dropdown">
                        <div class="nav-dropdown-toggle w-dropdown-toggle">
                            <div class="nav-dropdown-icon w-icon-dropdown-toggle"></div>
                            <div>Services</div>
                        </div>
                        <nav class="nav-dropdown-list shadow-three mobile-shadow-hide w-dropdown-list">
                            @foreach ($globalServices as $service)
                                <a href="{{ route('services.show', $service) }}"
                                    class="nav-dropdown-link w-dropdown-link">{{ $service->name }}</a>
                            @endforeach
                        </nav>
                    </div>
                </li>
                <li>
                    <a href="{{ route('technology') }}" class="nav-link">Technology</a>
                </li>
                <li>
                    <div data-delay="0" data-hover="false" class="nav-dropdown w-dropdown">
                        <div class="nav-dropdown-toggle w-dropdown-toggle">
                            <div class="nav-dropdown-icon w-icon-dropdown-toggle"></div>
                            <div>Pages</div>
                        </div>
                        <nav class="nav-dropdown-list shadow-three mobile-shadow-hide w-dropdown-list">
                            <a href="{{ route('services') }}" class="nav-dropdown-link w-dropdown-link">Services</a>
                            <a href="{{ route('technology') }}" class="nav-dropdown-link w-dropdown-link">Technology</a>
                            <a href="{{ route('industries') }}" class="nav-dropdown-link w-dropdown-link">Industry</a>
                            <a href="{{ route('casestudy') }}" class="nav-dropdown-link w-dropdown-link">Case
                                Studies</a>
                            <a href="{{ route('insights') }}"
                                class="nav-dropdown-link w-dropdown-link">Insights/Blog</a>
                            <a href="{{ route('insights') }}" class="nav-dropdown-link w-dropdown-link">Event</a>
                            <a href="{{ route('careers') }}" class="nav-dropdown-link w-dropdown-link">Career</a>
                            <a href="{{ route('contact') }}" class="nav-dropdown-link w-dropdown-link">Contact Us</a>
                        </nav>
                    </div>
                </li>
                <li>
                    <a href="{{ route('careers') }}" class="nav-link">Career</a>
                </li>
            </ul>
            <div class="header-button">
                <a schedule="True" data-wf--button--variant="base" href="{{ route('contact') }}"
                    class="button w-inline-block">
                    <div class="text-regular">Book Consultation</div>
                    <div class="button-icon-wrap">
                        <div class="button-icon w-embed"><svg width="20" height="9" viewbox="0 0 20 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                    stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg></div>
                    </div>
                </a>
            </div>
        </nav>
        <div class="menu-button w-nav-button">
            <div class="menu-button-icon w-embed"><svg viewbox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M5 8H13.75M5 12H19M10.25 16L19 16" stroke="#464455" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </g>
                </svg></div>
        </div>
    </div>
</header>