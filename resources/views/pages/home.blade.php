@extends('layouts.app')

@section('seo_key', 'home')

@section('content')
    <section class="hero-section">
        <div class="container">
            <div class="hero-content-block">
                <div class="hero-text-block">
                    <h1 data-w-id="4457ab02-68c5-80aa-7290-3dfc9216d310" class="h1 neutral-color-01">Advanced
                        Semiconductor Engineering Solutions</h1>
                    <div data-w-id="7d3de885-5b4d-492e-07f6-e48ffc38bafa" class="hero-description">
                        <p class="text-regular">Delivering cutting-edge RISC-V, FPGA, SoC, and ASIC development services
                            for enterprise-grade applications across multiple industries.</p>
                    </div>
                </div>
                <div data-w-id="dc74feff-8b25-7dea-7a9b-002dd027e896" class="button-group">
                    <a schedule="True" data-wf--button--variant="base" href="contact-us.html" class="button w-inline-block">
                        <div class="text-regular">Book Consultation</div>
                        <div class="button-icon-wrap">
                            <div class="button-icon w-embed"><svg width="20" height="9" viewbox="0 0 20 9"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                        stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg></div>
                        </div>
                    </a>
                    <a schedule="True" data-wf--button-shedule--variant="secondary"
                        data-w-id="b2bba35a-c10b-4947-b354-8bc49d1c6869" href="#"
                        class="button w-variant-b1a5775f-aa65-f55d-bcd3-880d6be44382 w-inline-block">
                        <div class="text-regular">Book Consultation</div>
                        <div class="button-icon-wrap">
                            <div class="button-icon w-embed"><svg width="20" height="9" viewbox="0 0 20 9"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                        stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="hero-background-wrap">
            <div data-poster-url="videos/vecteezy_futuristic-microchip-design-with-glowing-circuits-and_51582933_poster.0000000.jpg"
                data-video-urls="videos/vecteezy_futuristic-microchip-design-with-glowing-circuits-and_51582933_mp4.mp4,videos/vecteezy_futuristic-microchip-design-with-glowing-circuits-and_51582933_webm.webm"
                data-autoplay="true" data-loop="true" data-wf-ignore="true"
                class="hero-background w-background-video w-background-video-atom"><video
                    id="fa951b34-6fb6-0b66-8b36-212d94f7ff55-video" autoplay="" loop=""
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
    <section class="section-80-80 neutral-color">
        <div data-w-id="22183e64-2dd1-3e1a-2ab3-9013a5cfd04e" class="container">
            <div class="brand-ticker-title-wrap">
                <p class="brand-ticker-title">TRUSTED BY 3,000+ INDUSTRIES</p>
            </div>
            <div class="brand-ticker-wrapper">
                <div class="brand-ticker-line">
                    <div class="brand-ticker-brand">
                        @foreach ($brands ?? [] as $brand)
                            <img loading="lazy" src="{{ $brand->brand_image_url }}" alt="" class="brand-logo">
                        @endforeach
                    </div>
                    <div class="brand-ticker-brand">
                        @foreach ($brands ?? [] as $brand)
                            <img loading="lazy" src="{{ $brand->brand_image_url }}" alt="" class="brand-logo">
                        @endforeach
                    </div>
                    <div class="brand-ticker-brand">
                        @foreach ($brands ?? [] as $brand)
                            <img loading="lazy" src="{{ $brand->brand_image_url }}" alt="" class="brand-logo">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-40-40">
        <div class="container">
            <div data-w-id="4f50ecc7-1654-7e1a-048b-8369418896cd" class="section-heading-block">
                <h2 class="h2">Our Services</h2>
                <p class="text-regular">Comprehensive solutions to meet your unique challenges</p>
            </div>
            <div class="service-card-wrapper">
                @foreach ($services ?? [] as $service)
                    <div servicecard="1" data-wf--service-card--variant="base"
                        data-w-id="f8f8f7b0-6839-0dd1-8421-e853e0bf8bbd" class="service-card">
                        <div class="service-card-icon-block"><img loading="eager" src="images/siliconbari-service-icon.svg"
                                alt="" class="service-card-icon"></div>
                        <div class="service-card-text-block">
                            <p class="text-large">{{ $service->name }}</p>
                            <p class="text-regular">{{ $service->short_description }}</p>
                        </div>
                        <a href="{{ route('services.show', $service) }}" class="service-card-button w-inline-block">
                            <div>Learn More</div>
                            <div class="svg w-embed"><svg width="20" height="9" viewbox="0 0 20 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.8516 0.599976L18.6016 4.34998M18.6016 4.34998L14.8516 8.09998M18.6016 4.34998H0.601562"
                                        stroke="#2F5E8C" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg></div>
                        </a>
                    </div>
                @endforeach
                <div servicecard="0" class="service-card with-button">
                    <div class="service-card-icon-block with-button-2"><img src="images/siliconbari-service-icon.svg"
                            loading="eager" alt="" class="service-card-icon with-button-3"></div>
                    <div class="service-card-text-block with-button-4">
                        <p class="text-large with-button-5">Custom Solutions &amp; Consultation</p>
                        <p class="text-regular with-button-6">Need something unique? We provide tailored solutions for
                            your specific semiconductor design challenges.</p>
                    </div>
                    <div class="service-card-button open">
                        <a schedule="True" data-wf--button--variant="base" href="contact-us.html"
                            class="button w-inline-block">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-60-60">
        <div class="container">
            <div class="expertise-content-wrapper">
                <div class="expertise-content-block">
                    <div data-w-id="eb49b96f-a7d6-c063-d6d0-01020b28051e" class="content-heading-block">
                        <h2 class="h2">Technology Expertise</h2>
                        <p class="text-regular">We specialize in the latest semiconductor technologies and
                            methodologies to deliver exceptional results.</p>
                    </div>
                    <div class="expertise-widget-wrapper">
                        <div data-w-id="4ba82bee-3418-31da-b2f5-6523c9295b3b" class="expertise-widget">
                            <div class="expertise-widget-meta-block"><img loading="lazy"
                                    src="images/siliconbari-svg-icon.svg" alt="" class="expertise-widget-icon">
                                <p class="expertise-widget-title">RISC-V</p>
                            </div>
                            <div class="expertise-widget-text-block">
                                <p class="text-small">Open-source instruction set architecture</p>
                            </div>
                        </div>
                        <div data-w-id="4ba82bee-3418-31da-b2f5-6523c9295b3b" class="expertise-widget">
                            <div class="expertise-widget-meta-block"><img loading="lazy"
                                    src="images/siliconbari-svg-icon.svg" alt="" class="expertise-widget-icon">
                                <p class="expertise-widget-title">RISC-V</p>
                            </div>
                            <div class="expertise-widget-text-block">
                                <p class="text-small">Open-source instruction set architecture</p>
                            </div>
                        </div>
                        <div data-w-id="4ba82bee-3418-31da-b2f5-6523c9295b3b" class="expertise-widget">
                            <div class="expertise-widget-meta-block"><img loading="lazy"
                                    src="images/siliconbari-svg-icon.svg" alt="" class="expertise-widget-icon">
                                <p class="expertise-widget-title">RISC-V</p>
                            </div>
                            <div class="expertise-widget-text-block">
                                <p class="text-small">Open-source instruction set architecture</p>
                            </div>
                        </div>
                        <div data-w-id="4ba82bee-3418-31da-b2f5-6523c9295b3b" class="expertise-widget">
                            <div class="expertise-widget-meta-block"><img loading="lazy"
                                    src="images/siliconbari-svg-icon.svg" alt="" class="expertise-widget-icon">
                                <p class="expertise-widget-title">RISC-V</p>
                            </div>
                            <div class="expertise-widget-text-block">
                                <p class="text-small">Open-source instruction set architecture</p>
                            </div>
                        </div>
                        <div data-w-id="4ba82bee-3418-31da-b2f5-6523c9295b3b" class="expertise-widget">
                            <div class="expertise-widget-meta-block"><img loading="lazy"
                                    src="images/siliconbari-svg-icon.svg" alt="" class="expertise-widget-icon">
                                <p class="expertise-widget-title">RISC-V</p>
                            </div>
                            <div class="expertise-widget-text-block">
                                <p class="text-small">Open-source instruction set architecture</p>
                            </div>
                        </div>
                        <div data-w-id="4ba82bee-3418-31da-b2f5-6523c9295b3b" class="expertise-widget">
                            <div class="expertise-widget-meta-block"><img loading="lazy"
                                    src="images/siliconbari-svg-icon.svg" alt="" class="expertise-widget-icon">
                                <p class="expertise-widget-title">RISC-V</p>
                            </div>
                            <div class="expertise-widget-text-block">
                                <p class="text-small">Open-source instruction set architecture</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-w-id="dc9540d3-4cd5-b976-9e18-b566f8fa06b3" class="expertise-content-image-block"><img
                        src="images/silicon-bari-content-image.webp" loading="lazy" alt=""
                        class="expertise-content-image">
                    <div class="expertise-box"></div>
                    <div class="expertise-box right"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-120-0">
        <div class="container">
            <div data-w-id="e99d8898-606c-cc25-ffe3-9d027b33f915" class="section-heading-block">
                <h2 class="h2">Silicon-Proven Semiconductor Engineering Services</h2>
            </div>
            <div data-w-id="604d18ef-3aca-4f69-3331-cc542dd72160" class="silicon-proven-image-block"><img
                    src="images/Silicon-Proven-Image.webp" loading="lazy"
                    sizes="(max-width: 1200px) 100vw, 1200px, 100vw"
                    srcset="images/Frame-1618873586-p-500.webp 500w, images/Frame-1618873586-p-800.webp 800w, images/Frame-1618873586-p-1080.webp 1080w, images/Silicon-Proven-Image.webp 1200w"
                    alt="" class="silicon-proven-image">
                <div data-poster-url="videos/vecteezy_microchip-artificial-intelligence-network-ai-line-circuit_21922492_poster.0000000.jpg"
                    data-video-urls="videos/vecteezy_microchip-artificial-intelligence-network-ai-line-circuit_21922492_mp4.mp4,videos/vecteezy_microchip-artificial-intelligence-network-ai-line-circuit_21922492_webm.webm"
                    data-autoplay="true" data-loop="true" data-wf-ignore="true"
                    class="background-video w-background-video w-background-video-atom"><video
                        id="d1e7ea8a-71cc-3299-533d-0373543ab028-video" autoplay="" loop=""
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
    <section class="section-120-120">
        <div class="container">
            <div data-w-id="c747b432-be3a-f07b-afb7-7e4cf3d20d7b" class="section-heading-block">
                <h2 class="h2">Industries We Serve</h2>
                <p class="text-regular">Providing Specialized semiconductor solutions across diverse industries</p>
            </div>
            <div class="industries-we-serve-wrapper">
                @foreach ($industries ?? [] as $industry)
                    <div data-w-id="2210117a-e1d0-f343-8a1d-7eb3fabd973d" class="industries-card">
                        <img loading="lazy" src="{{ $industry->image_url }}" alt="{{ $industry->name }}"
                            class="industries-card-image">
                        <div class="industries-card-gradient">
                            <h6 class="industries-card-title">{{ $industry->name }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section-0-120">
        <div class="container">
            <div data-w-id="0af501ae-e91b-a098-555e-5460fd6b483c" class="section-heading-block">
                <h2 class="h2">Testimonials</h2>
                <p class="text-regular">What people think about our Services</p>
            </div>
            <div class="testimonial-card-wrapper">
                <div data-w-id="369b3119-c136-2b79-eabf-4d78a0f3ecaa" class="testimonial-card">
                    <div class="quotation-icon-block">
                        <div class="quotation-icon"></div>
                        <div class="quotation-icon"></div>
                    </div>
                    <p>SiliconBari is the top website for semiconductor professionals, according to the 2023 Industry
                        Insights Report.</p>
                    <div class="testimonial-client-info"><img loading="lazy" src="images/siliconbari-client-image_2.png"
                            alt="" class="testimonial-client-image">
                        <div class="testimonial-text-block">
                            <div class="testimonial-client-name">Chip Insights</div>
                            <div class="text-small">Senior Analyst</div>
                        </div>
                    </div>
                    <a data-wf--link-button--variant="base" href="#" class="link-button w-inline-block">
                        <div>View Success Stories</div>
                        <div class="svg w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewbox="0 0 16 16" fill="none">
                                <path d="M3.3335 8H12.6668" stroke="#00A1B0" stroke-width="1.33333"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M8 3.3335L12.6667 8.00016L8 12.6668" stroke="currentColor" stroke-width="1.33333"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></div>
                        <div class="svg arrow-large w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                height="9" viewbox="0 0 20 9" fill="none">
                                <path
                                    d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                    stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg></div>
                    </a>
                </div>
                <div data-w-id="369b3119-c136-2b79-eabf-4d78a0f3ecaa" class="testimonial-card">
                    <div class="quotation-icon-block">
                        <div class="quotation-icon"></div>
                        <div class="quotation-icon"></div>
                    </div>
                    <p>SiliconBari is the top website for semiconductor professionals, according to the 2023 Industry
                        Insights Report.</p>
                    <div class="testimonial-client-info"><img loading="lazy" src="images/siliconbari-client-image.png"
                            alt="" class="testimonial-client-image">
                        <div class="testimonial-text-block">
                            <div class="testimonial-client-name">Deepak Sharma</div>
                            <div class="text-small">Lead Engineer</div>
                        </div>
                    </div>
                    <a data-wf--link-button--variant="base" href="#" class="link-button w-inline-block">
                        <div>View Success Stories</div>
                        <div class="svg w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewbox="0 0 16 16" fill="none">
                                <path d="M3.3335 8H12.6668" stroke="#00A1B0" stroke-width="1.33333"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M8 3.3335L12.6667 8.00016L8 12.6668" stroke="currentColor" stroke-width="1.33333"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></div>
                        <div class="svg arrow-large w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                height="9" viewbox="0 0 20 9" fill="none">
                                <path
                                    d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                    stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg></div>
                    </a>
                </div>
                <div data-w-id="369b3119-c136-2b79-eabf-4d78a0f3ecaa" class="testimonial-card">
                    <div class="quotation-icon-block">
                        <div class="quotation-icon"></div>
                        <div class="quotation-icon"></div>
                    </div>
                    <p>SiliconBari is the top website for semiconductor professionals, according to the 2023 Industry
                        Insights Report.</p>
                    <div class="testimonial-client-info"><img loading="lazy" src="images/siliconbari-client-image_1.png"
                            alt="" class="testimonial-client-image">
                        <div class="testimonial-text-block">
                            <div class="testimonial-client-name">Aisha Khan</div>
                            <div class="text-small">Research Scientist</div>
                        </div>
                    </div>
                    <a data-wf--link-button--variant="base" href="#" class="link-button w-inline-block">
                        <div>View Success Stories</div>
                        <div class="svg w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewbox="0 0 16 16" fill="none">
                                <path d="M3.3335 8H12.6668" stroke="#00A1B0" stroke-width="1.33333"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M8 3.3335L12.6667 8.00016L8 12.6668" stroke="currentColor" stroke-width="1.33333"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></div>
                        <div class="svg arrow-large w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                height="9" viewbox="0 0 20 9" fill="none">
                                <path
                                    d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                    stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg></div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-0-0">
        <div class="container">
            <div class="case-studies-content-wrapper">
                <div data-w-id="cfb1043c-d41e-e1a8-a868-17e6f1a69931" class="section-heading-block">
                    <h2 class="h2">Featured Case Studies</h2>
                    <p class="text-regular">Our Case-studies</p>
                </div>
                <div data-w-id="58dccc1a-57d6-2c73-c5ae-0139ee268a9b" class="case-studies-card-wrapper">
                    <div class="case-studies-card">
                        <div class="case-studies-card-image-block"><img
                                src="images/Automotive-ADAS-System-Development.webp" loading="lazy"
                                alt="Robotic arms inspecting or processing semiconductor wafers with multiple microchips."
                                class="case-studies-card-image"></div>
                        <div class="case-studies-card-text-block">
                            <p class="text-large">Automotive ADAS System Development</p>
                            <p class="text-regular">Custom RISC-V based SoC with real-time processing. 40%
                                <br>performance improvement, ISO 26262 certified<br>
                            </p>
                        </div>
                        <a data-wf--link-button--variant="arow-large" href="#"
                            class="link-button w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 w-inline-block">
                            <div>View Success Stories</div>
                            <div class="svg w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 w-embed"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16"
                                    fill="none">
                                    <path d="M3.3335 8H12.6668" stroke="#00A1B0" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M8 3.3335L12.6667 8.00016L8 12.6668" stroke="currentColor"
                                        stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg></div>
                            <div class="svg w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 arrow-large w-embed"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="9" viewbox="0 0 20 9"
                                    fill="none">
                                    <path
                                        d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                        stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></div>
                        </a>
                    </div>
                    <div class="case-studies-card">
                        <div class="case-studies-card-image-block"><img
                                src="images/Siliconbari-AI-Accelerator-ASIC-Design.webp" loading="lazy" alt=""
                                class="case-studies-card-image"></div>
                        <div class="case-studies-card-text-block">
                            <p class="text-large">AI Accelerator ASIC Design</p>
                            <p class="text-regular">Custom RISC-V based SoC with real-time processing. 40%
                                <br>performance improvement, ISO 26262 certified
                            </p>
                        </div>
                        <a href="#" class="case-studies-button w-inline-block">
                            <div>View Success Stories</div>
                            <div class="svg w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="9" viewbox="0 0 20 9" fill="none">
                                    <path
                                        d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                        stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-120-120">
        <div class="container">
            <div data-w-id="ff447039-a36e-0604-258f-d9c82df5a438" class="section-heading-block">
                <h2 class="h2">Insights &amp; Events</h2>
                <p class="text-regular">Stay Updated with the latest in semiconductor technology and company news.</p>
            </div>
            <div data-w-id="59fe2b73-295d-aa1c-65d9-6241d6aafc81" class="insights-card-wrapper">
                <div class="insights-card">
                    <div class="insights-card-image-block"><img
                            src="images/SiliconBari-The-Future-of-RISC-V-in-Data-Centers.webp" loading="lazy"
                            alt="" class="insights-card-image"></div>
                    <div class="insights-card-text-body">
                        <p class="event-date">Dec 13, 2025</p>
                        <div class="insights-card-text-block">
                            <p class="text-large">The Future of RISC-V in Data Centers</p>
                            <p class="text-regular">How open architecture is challenging in high-performance computing.
                            </p>
                        </div>
                        <a data-wf--link-button--variant="arow-large" href="#"
                            class="link-button w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 w-inline-block">
                            <div>Learn More</div>
                            <div class="svg w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 w-embed"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16"
                                    fill="none">
                                    <path d="M3.3335 8H12.6668" stroke="#00A1B0" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M8 3.3335L12.6667 8.00016L8 12.6668" stroke="currentColor"
                                        stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg></div>
                            <div class="svg w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 arrow-large w-embed"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="9" viewbox="0 0 20 9"
                                    fill="none">
                                    <path
                                        d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                        stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></div>
                        </a>
                    </div>
                </div>
                <div class="insights-card">
                    <div class="insights-card-image-block"><img
                            src="images/Siliconbari-AI-Ethics-in-Autonomous-Systems.png" loading="lazy" alt=""
                            class="insights-card-image"></div>
                    <div class="insights-card-text-body">
                        <p class="event-date">Mar 15, 2026</p>
                        <div class="insights-card-text-block">
                            <p class="text-large">The Future of RISC-V in Data Centers</p>
                            <p class="text-regular">Navigating the moral dilemmas in machine learning and
                                decision-making.</p>
                        </div>
                        <a data-wf--link-button--variant="arow-large" href="#"
                            class="link-button w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 w-inline-block">
                            <div>Learn More</div>
                            <div class="svg w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 w-embed"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16"
                                    fill="none">
                                    <path d="M3.3335 8H12.6668" stroke="#00A1B0" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M8 3.3335L12.6667 8.00016L8 12.6668" stroke="currentColor"
                                        stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg></div>
                            <div class="svg w-variant-72187677-7c2d-ae5c-9014-8d5bd8c94d11 arrow-large w-embed"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="9" viewbox="0 0 20 9"
                                    fill="none">
                                    <path
                                        d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                        stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></div>
                        </a>
                    </div>
                </div>
                <div id="w-node-_9a760fa5-1d7c-47d1-0b28-4e9e8cf6c839-1c8bddfb" class="upcoming-events-card">
                    <p class="text-regular semi-bold neutral-color-01">Upcoming Events</p>
                    <div class="upcoming-events-text-box-wrap">
                        <div class="upcoming-events-text-box">
                            <div class="upcoming-events-line"></div>
                            <div class="upcoming-events-text-wrapper">
                                <p class="event-date">Dec 13, 2025</p>
                                <div class="upcoming-events-text-block">
                                    <p class="text-large neutral-color-01">RISC-V Summit 2026</p>
                                    <p class="text-regular neutral-color-01">Dhanmondi, Bangladesh<br></p>
                                </div>
                            </div>
                        </div>
                        <div class="upcoming-events-text-box">
                            <div class="upcoming-events-line"></div>
                            <div class="upcoming-events-text-wrapper">
                                <p class="event-date">Dec 13, 2025</p>
                                <div class="upcoming-events-text-block">
                                    <p class="text-large neutral-color-01">RISC-V Summit 2026</p>
                                    <p class="text-regular neutral-color-01">Dhanmondi, Bangladesh<br></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a data-wf--link-button--variant="arow-large-white" href="#"
                        class="link-button w-variant-d2a5642a-4ecd-52bb-dfd5-5fba7bb2dcc5 w-inline-block">
                        <div>Register for Events</div>
                        <div class="svg w-variant-d2a5642a-4ecd-52bb-dfd5-5fba7bb2dcc5 w-embed"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16"
                                fill="none">
                                <path d="M3.3335 8H12.6668" stroke="#00A1B0" stroke-width="1.33333"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M8 3.3335L12.6667 8.00016L8 12.6668" stroke="currentColor" stroke-width="1.33333"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></div>
                        <div class="svg w-variant-d2a5642a-4ecd-52bb-dfd5-5fba7bb2dcc5 arrow-large w-embed"><svg
                                xmlns="http://www.w3.org/2000/svg" width="20" height="9" viewbox="0 0 20 9"
                                fill="none">
                                <path
                                    d="M14.8501 0.599609L18.6001 4.34961M18.6001 4.34961L14.8501 8.09961M18.6001 4.34961H0.600098"
                                    stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg></div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-60-60 bg-neutral">
        <div class="container">
            <div data-w-id="414ec1d4-bda9-0e0b-a606-43a3f0a3ce43" class="cta-content-wrapper">
                <div class="cta-text-block">
                    <h2 class="h2">Ready to Transform Your Semiconductor Vision?</h2>
                    <p class="text-regular">Let&#x27;s discuss how our expertise can accelerate your next semiconductor
                        project</p>
                </div>
                <div class="button-group">
                    <a schedule="True" data-wf--button--variant="base" href="#" class="button w-inline-block">
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
                    <a schedule="True" data-wf--button--variant="secondary" href="#"
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
@endsection

@section('modals')
    <div class="schedule-modal">
        <div class="calendly-wrapper">
            <div class="w-embed w-iframe">
                <iframe src="https://calendly.com/synexdigital/30min?embed_domain=yourdomain.com&embed_type=Inline"
                    width="100%" height="700" frameborder="0"></iframe>
            </div>
        </div>
        <div data-w-id="fbd29d5d-7ec4-0428-8721-e8f2d112d657" class="close-icon w-embed">
            <svg viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z"
                        fill="#ffffff"></path>
                </g>
            </svg>
        </div>
    </div>
@endsection
