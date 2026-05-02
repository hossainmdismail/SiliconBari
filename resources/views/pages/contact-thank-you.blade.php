@extends('layouts.app')

@section('seo_key', 'contact')
@section('title', 'Thank You')
@section('description', 'Thank you for reaching out to Silicon Bari. Our team will review your message and get back to you soon.')

@section('content')
    <section class="section-80-80">
        <div class="container">
            <div class="contact-wrapper small">
                <div class="contact-form-wrapper">
                    <div class="contact-form">
                        <div class="contact-form-divider">
                            <div class="h3">Thank You</div>
                            <div class="text-regular">Your message has been received. Our team will review your project details and get back to you soon.</div>
                        </div>
                        <div class="form-button-group">
                            <a href="{{ route('home') }}" class="submit-button w-button">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
