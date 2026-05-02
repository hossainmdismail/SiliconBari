@extends('layouts.app')
@section('seo_key', 'industries')
@section('content')
    {{-- Banner --}}
    <section class="banner-section">
        <div class="container">
            <div class="technology-banner-title">
                <div data-w-id="b62f9eee-344d-9d27-264d-8977a88cab2a" class="section-title-block">
                    <h1 class="h1 text-color-white">Industries We Serve</h1>
                    <div class="text-regular text-white">Delivering specialized semiconductor engineering solutions across
                        diverse industries with unique technical requirements and challenges.</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Industry --}}
    <section class="section-120-120">
        <div class="container">
            <div class="industry-grid">
                @foreach ($industries ?? [] as $industry)
                    <x-industry-card :industry="$industry" :is-left="$loop->even" />
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
