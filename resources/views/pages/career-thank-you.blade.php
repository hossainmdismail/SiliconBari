@extends('layouts.app')

@section('seo_key', 'careers')
@section('title', 'Thank You - Career')
@section('description', 'Thank you for applying to Silicon Bari. Our team will review your application and get back to you soon.')

@section('content')
    <section class="section-80-80">
        <div class="container">
            <div class="contact-wrapper small">
                <div class="contact-form-wrapper">
                    <div class="contact-form">
                        <div class="contact-form-divider">
                            <div class="h3">Application Received</div>
                            <div class="text-regular">Thank you for your interest in joining our team! Your application has
                                been successfully submitted. Our recruitment team will review your profile and reach out to
                                you if your qualifications match our requirements.</div>
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