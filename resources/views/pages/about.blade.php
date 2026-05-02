@extends('layouts.app')

@section('seo_key', 'about')

@section('page_styles')
    <style>
        .testimonials-slider {
            overflow: hidden;
        }

        .testimonials-slider .swiper-wrapper {
            display: flex;
        }

        .testimonials-slider .swiper-slide {
            flex-shrink: 0;
            height: auto;
        }

        .testimonials-slider .testimonial-card {
            height: 100%;
        }
    </style>
@endsection

@section('content')
    <section class="about-banner">
        <div class="container">
            <div class="about-banner-wrapper">
                <div class="about-banner-title-block">
                    <h1 class="h1 text-color-white">Engineering Precision Proven Silicon Expertise.</h1>
                    <div class="text-regular text-white">SiliconBari is a leading semiconductor services company dedicated to
                        accelerating chip development through expert design, verification, and physical implementation
                        services.</div>
                </div>
                <div class="about-banner-statics-block">
                    <div class="hero-stats-item">
                        <div class="hero-stats">
                            <div data-target="1" class="h1 text-color-white counter">0<br></div>
                            <div class="h1 text-color-white">+</div>
                        </div>
                        <div class="text-regular text-white">Years of Experience</div>
                    </div>
                    <div class="about-statics-divider"></div>
                    <div class="hero-stats-item">
                        <div class="hero-stats">
                            <div data-target="5" class="h1 text-color-white counter">0<br></div>
                            <div class="h1 text-color-white">+</div>
                        </div>
                        <div class="text-regular text-white">Projects Completed</div>
                    </div>
                    <div class="about-statics-divider"></div>
                    <div class="hero-stats-item">
                        <div class="hero-stats">
                            <div data-target="2" class="h1 text-color-white counter">0<br></div>
                            <div class="h1 text-color-white">+</div>
                        </div>
                        <div class="text-regular text-white">Expert Engineers</div>
                    </div>
                    <div class="about-statics-divider"></div>
                    <div class="hero-stats-item">
                        <div class="hero-stats">
                            <div data-target="75" class="h1 text-color-white counter">0<br></div>
                            <div class="h1 text-color-white">+</div>
                        </div>
                        <div class="text-regular text-white">Client Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-background-wrap">
            <div data-poster-url="videos/vecteezy_futuristic-microchip-design-with-glowing-circuits-and_51582933_poster.0000000.jpg"
                data-video-urls="videos/vecteezy_futuristic-microchip-design-with-glowing-circuits-and_51582933_mp4.mp4,videos/vecteezy_futuristic-microchip-design-with-glowing-circuits-and_51582933_webm.webm"
                data-autoplay="true" data-loop="true" data-wf-ignore="true"
                class="hero-background w-background-video w-background-video-atom"><video
                    id="86345ccf-064b-c157-a045-27388c2c2fac-video" autoplay="" loop=""
                    style="background-image:url(&quot;videos/vecteezy_futuristic-microchip-design-with-glowing-circuits-and_51582933_poster.0000000.jpg&quot;)"
                    muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
                    <source src="videos/vecteezy_futuristic-microchip-design-with-glowing-circuits-and_51582933_mp4.mp4"
                        data-wf-ignore="true">
                    <source src="videos/vecteezy_futuristic-microchip-design-with-glowing-circuits-and_51582933_webm.webm"
                        data-wf-ignore="true">
                </video>
                <div class="hero-background-shade"></div>
            </div>
        </div>
    </section>
    {{-- Brands --}}
    <x-brand-ticker :brands="$brands ?? collect()" />

    <section class="section-120-120 overflow-hidden">
        <div class="container">
            <div class="whoweare-wrapper">
                <div data-w-id="77c0d47e-6b1e-52b7-e51d-14ab5f1fe55f" class="whoweare-text-block">
                    <div class="h2">Who We Are</div>
                    <div class="text-regular">SiliconBari is a premier semiconductor engineering services company
                        specializing in RISC-V, FPGA, SoC, and ASIC development. Founded in 2015, we&#x27;ve grown to become
                        a trusted partner for Fortune 500 companies and innovative startups alike.<br><br>Today, we serve
                        clients across automotive, consumer electronics, data center, telecommunications, and IoT markets.
                        Our team of 50+ engineers combines deep technical knowledge with practical, hands-on experience to
                        deliver silicon-proven solutions.<br><br>With offices in SiliconBari and design centers across the
                        globe, we serve clients worldwide with the expertise and resources needed to tackle the most
                        challenging semiconductor projects.</div>
                </div>
                <div data-w-id="1263249a-e8bf-bb0a-d0cd-c22ead1ba29e" class="whoweare-image-wrapper"><img
                        src="images/image-33.avif" loading="lazy" sizes="(max-width: 1094px) 100vw, 1094px"
                        srcset="images/image-33-p-500.avif 500w, images/image-33.avif 1094w"
                        alt="Four young professionals smiling and collaborating around laptops in a modern office meeting room."
                        class="whoweare-image"></div>
            </div>
            <div class="mission-wrapper">
                <div class="misson-content left">
                    <div data-w-id="103caafa-a6cb-aec7-5129-d347f65b0104" class="mission-text-content is-right">
                        <h2 class="h2">Vision</h2>
                        <div class="text-regular">Our vision is to unlock the vast potential of skilled engineers in
                            emerging tech hubs worldwide by delivering top-tier semiconductor solutions. We aim to foster
                            innovation, create opportunities, and drive technological advancement through our services.
                        </div>
                    </div>
                </div>
                <div data-w-id="13a52049-21e9-3a89-74f5-c8bde71d2d12" class="misson-content-2"><img
                        src="images/image-33-1.avif" loading="lazy"
                        alt="Close-up view of a computer microchip mounted on a circuit board with surrounding electronic components."
                        class="mission-image"></div>
                <div class="misson-content right">
                    <div data-w-id="23ecf366-84fb-8422-84c5-8952d3298dac" class="mission-text-content">
                        <h2 class="h2">Mission</h2>
                        <div class="text-regular">SiliconBari provides exciting, game-changing semiconductor design
                            services to clients around the globe. We aspire to develop engineers who are seen as tech
                            industry thought leaders and who produce leading-edge technology.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-120-120 is-background">
        <div class="container">
            <div data-w-id="e904df58-a88f-09a2-ed48-b9dfb5cb945a" class="value-title-block">
                <h2 class="h2">Our Values</h2>
                <div class="text-regular">The principles that guide everything we do</div>
            </div>
            <div class="value-grid">
                <div servicecard="0" data-w-id="241e1c3c-a4be-e1e7-231b-c9bb63d3bf82" class="value-card">
                    <div class="service-card-icon-block"><img src="images/siliconbari-service-icon.svg" loading="eager"
                            alt="" class="service-card-icon"></div>
                    <div class="service-card-text-block">
                        <p class="text-large">Excellence Driven</p>
                        <p class="text-regular">We pursue the highest standards in semiconductor design and verification,
                            delivering silicon-proven solutions.</p>
                    </div>
                </div>
                <div servicecard="0" data-w-id="241e1c3c-a4be-e1e7-231b-c9bb63d3bf82" class="value-card">
                    <div class="service-card-icon-block"><img src="images/siliconbari-service-icon.svg" loading="eager"
                            alt="" class="service-card-icon"></div>
                    <div class="service-card-text-block">
                        <p class="text-large">Collaborative Partnership</p>
                        <p class="text-regular">We work as an extension of your team, ensuring seamless integration and
                            knowledge transfer.</p>
                    </div>
                </div>
                <div servicecard="0" data-w-id="241e1c3c-a4be-e1e7-231b-c9bb63d3bf82" class="value-card">
                    <div class="service-card-icon-block"><img src="images/siliconbari-service-icon.svg" loading="eager"
                            alt="" class="service-card-icon"></div>
                    <div class="service-card-text-block">
                        <p class="text-large">Innovation Focus</p>
                        <p class="text-regular">Leveraging cutting-edge technologies and methodologies to solve complex
                            design challenges.</p>
                    </div>
                </div>
                <div servicecard="0" data-w-id="241e1c3c-a4be-e1e7-231b-c9bb63d3bf82" class="value-card">
                    <div class="service-card-icon-block"><img src="images/siliconbari-service-icon.svg" loading="eager"
                            alt="" class="service-card-icon"></div>
                    <div class="service-card-text-block">
                        <p class="text-large">Agile Execution</p>
                        <p class="text-regular">Fast turnaround times without compromising quality, helping you meet
                            critical market windows.</p>
                    </div>
                </div>
                <div servicecard="0" data-w-id="241e1c3c-a4be-e1e7-231b-c9bb63d3bf82" class="value-card">
                    <div class="service-card-icon-block"><img src="images/siliconbari-service-icon.svg" loading="eager"
                            alt="" class="service-card-icon"></div>
                    <div class="service-card-text-block">
                        <p class="text-large">Global Expertise</p>
                        <p class="text-regular">Deep understanding of international standards and compliance requirements
                            across markets.</p>
                    </div>
                </div>
                <div servicecard="0" data-w-id="241e1c3c-a4be-e1e7-231b-c9bb63d3bf82" class="value-card">
                    <div class="service-card-icon-block"><img src="images/siliconbari-service-icon.svg" loading="eager"
                            alt="" class="service-card-icon"></div>
                    <div class="service-card-text-block">
                        <p class="text-large">Trusting Security</p>
                        <p class="text-regular">Rigorous IP protection and confidentiality measures to safeguard your
                            valuable designs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Team Section --}}
    <x-team-section :teams="$teams ?? collect()" />
    <x-testimonials-section :testimonials="$testimonials ?? collect()" :slider="true" />
    <section class="section-0-120">
        <div class="container">
            <div data-w-id="ace0fe6e-3458-84cc-0433-224b3889c464" class="section-heading-block">
                <h2 class="h2">Silicon-Proven Semiconductor Engineering Services</h2>
            </div>
            <div data-w-id="ace0fe6e-3458-84cc-0433-224b3889c467" class="silicon-proven-image-block"><img
                    src="images/Silicon-Proven-Image.webp" loading="lazy" sizes="(max-width: 1200px) 100vw, 1200px"
                    srcset="images/Frame-1618873586-p-500.webp 500w, images/Frame-1618873586-p-800.webp 800w, images/Frame-1618873586-p-1080.webp 1080w, images/Silicon-Proven-Image.webp 1200w"
                    alt="" class="silicon-proven-image">
                <div data-poster-url="videos/vecteezy_microchip-artificial-intelligence-network-ai-line-circuit_21922492_poster.0000000.jpg"
                    data-video-urls="videos/vecteezy_microchip-artificial-intelligence-network-ai-line-circuit_21922492_mp4.mp4,videos/vecteezy_microchip-artificial-intelligence-network-ai-line-circuit_21922492_webm.webm"
                    data-autoplay="true" data-loop="true" data-wf-ignore="true"
                    class="background-video w-background-video w-background-video-atom"><video
                        id="ace0fe6e-3458-84cc-0433-224b3889c469-video" autoplay="" loop=""
                        style="background-image:url(&quot;videos/vecteezy_microchip-artificial-intelligence-network-ai-line-circuit_21922492_poster.0000000.jpg&quot;)"
                        muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
                        <source
                            src="videos/vecteezy_microchip-artificial-intelligence-network-ai-line-circuit_21922492_mp4.mp4"
                            data-wf-ignore="true">
                        <source
                            src="videos/vecteezy_microchip-artificial-intelligence-network-ai-line-circuit_21922492_webm.webm"
                            data-wf-ignore="true">
                    </video></div>
            </div>
        </div>
    </section>
    <x-faq-section :faqs="$faqs ?? collect()" />

    <x-lead-section
        title="Ready to Transform Your Semiconductor Vision?"
        description="Let's discuss how our expertise can accelerate your next semiconductor project"
        {{-- book-link="#"
        schedule-link="#" --}}
    />
@endsection
@push('scripts')
    <script>
        window.addEventListener('load', () => {
            const slider = document.querySelector('[data-testimonials-slider]');

            if (!slider) {
                return;
            }

            const slideCount = slider.querySelectorAll('.swiper-slide').length;

            if (slideCount <= 1) {
                return;
            }

            const initSwiper = () => {
                if (!window.Swiper || slider.dataset.swiperReady === 'true') {
                    return;
                }

                slider.dataset.swiperReady = 'true';

                new window.Swiper(slider, {
                    loop: slideCount > 3,
                    grabCursor: true,
                    watchOverflow: true,
                    speed: 650,
                    slidesPerView: 1,
                    spaceBetween: 6,
                    slidesPerGroup: 1,
                    autoplay: window.matchMedia('(prefers-reduced-motion: reduce)').matches
                        ? false
                        : {
                              delay: 3200,
                              disableOnInteraction: false,
                              pauseOnMouseEnter: true,
                          },
                    breakpoints: {
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 6,
                        },
                    },
                });
            };

            const loadSwiperScript = () => {
                if (window.Swiper) {
                    initSwiper();
                    return;
                }

                const existingScript = document.querySelector('script[data-home-swiper]');

                if (existingScript) {
                    existingScript.addEventListener('load', initSwiper, { once: true });
                    return;
                }

                const script = document.createElement('script');
                script.src = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js';
                script.defer = true;
                script.dataset.homeSwiper = 'true';
                script.addEventListener('load', initSwiper, { once: true });
                document.body.appendChild(script);
            };

            if ('requestIdleCallback' in window) {
                window.requestIdleCallback(loadSwiperScript, { timeout: 2000 });
            } else {
                window.setTimeout(loadSwiperScript, 1);
            }
        });
    </script>
@endpush
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const counters = document.querySelectorAll('.counter');
            const startCounter = (counter) => {
                const target = +counter.getAttribute('data-target');
                const duration = 200;
                let count = 0;

                const update = () => {
                    const increment = target / duration;
                    count += increment;

                    if (count < target) {
                        counter.innerText = Math.ceil(count);
                        requestAnimationFrame(update);
                    } else {
                        counter.innerText = target;
                    }
                };

                update();
            };

            const observer = new IntersectionObserver(
                (entries, observerInstance) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            startCounter(entry.target);
                            observerInstance.unobserve(entry.target);
                        }
                    });
                },
                { threshold: 0.1 },
            );

            counters.forEach((counter) => observer.observe(counter));
        });
    </script>
@endpush
