@extends('layouts.app')

@section('seo_key', 'services')
@section('title', 'Services')
@section('description', 'Stay updated with the latest insights, technical articles, and thought leadership from the
    Silicon Bari team.')

@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="service-banneer-title-block">
                <div data-w-id="b62f9eee-344d-9d27-264d-8977a88cab2a" class="section-title-block">
                    <h1 class="h1 text-color-white">Our Services</h1>
                    <div class="text-regular text-white">Comprehensive semiconductor engineering solutions delivered by
                        expert teams with decades of combined experience in RISC-V, FPGA, SoC, and verification services.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-80-80">
        <div class="container">
            <div class="services-grid">
                {{-- Services Card Large --}}
                @foreach ($services ?? [] as $service)
                    <x-service-card-large :service="$service" :is-reversed="$loop->even" />
                @endforeach
            </div>
        </div>
    </section>
    <x-lead-section
        title="Let’s Discuss Your Project"
        description="Contact our team to learn how we can help accelerate your semiconductor development"
        {{-- book-link="#"
        schedule-link="#" --}}
    />
@endsection
