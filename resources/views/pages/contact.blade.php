@extends('layouts.app')
@section('seo_key', 'contact')
@section('content')
    <section class="banner-section insights">
        <div class="container">
            <div class="technology-banner-title">
                <div data-w-id="b62f9eee-344d-9d27-264d-8977a88cab2a" class="section-title-block">
                    <h1 class="h1 text-color-white">Contact Us</h1>
                    <div class="text-regular text-white">Get in touch with our team to discuss your semiconductor engineering
                        needs. We&#x27;re here to help bring your vision to reality.</div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-80-80">
        <div class="container">
            <div class="contact-page-wrapper">
                <div class="contact-wrapper small">
                    <div class="contact-form-wrapper">
                        <div class="contact-form w-form">
                            <form id="email-form-2" name="email-form-2" data-name="Email Form 2" method="post"
                                action="{{ route('contact.submit') }}"
                                class="contact-form" data-wf-page-id="69db66759dc3753db0b199b0"
                                data-wf-element-id="989ec03f-f9d6-bfb8-b5fc-5dd5546a0aa6">
                                @csrf
                                <div class="contact-form-divider">
                                    <div class="h3">Get In Touch</div>
                                    @if ($errors->any())
                                        <div class="text-regular" style="color: #b42318;">Please review the highlighted fields and try again.</div>
                                    @endif
                                    <div class="contact-form-inner-divider">
                                        <div class="auth-input-block"><label for="Name" class="text-regular">Your
                                                Name*</label><input class="input w-input" maxlength="256" name="Name"
                                                data-name="Name" placeholder="Type your name" type="text" id="Name"
                                                value="{{ old('Name') }}" required="">
                                            @error('Name')
                                                <div class="text-small" style="color: #b42318;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="auth-input-block"><label for="Email"
                                                class="text-regular">Email*</label><input class="input transparent w-input"
                                                maxlength="256" name="Email" data-name="Email"
                                                placeholder="Your.email@company.com" type="email" id="Email"
                                                value="{{ old('Email') }}" required="">
                                            @error('Email')
                                                <div class="text-small" style="color: #b42318;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="auth-input-block"><label for="Number"
                                                class="text-regular">Company*</label><input
                                                class="input transparent w-input" maxlength="256" name="Number"
                                                data-name="Number" placeholder="Your company name" type="text"
                                                id="Number" value="{{ old('Number') }}" required="">
                                            @error('Number')
                                                <div class="text-small" style="color: #b42318;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="auth-input-block"><label for="Interest" class="text-regular">Service
                                                Interest*</label><select id="Interest" name="Interest" data-name="Interest"
                                                required="" class="input-2 transparent w-select">
                                                <option value="">Select project type</option>
                                                @foreach ($services ?? [] as $service)
                                                    <option value="{{ $service->name }}"
                                                        @selected(old('Interest') === $service->name)>{{ $service->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('Interest')
                                                <div class="text-small" style="color: #b42318;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="auth-input-block"><label for="Message"
                                                class="text-regular">Message*</label>
                                            <textarea placeholder="Tell us about your project" maxlength="5000" id="Message" name="Message" data-name="Message"
                                                class="input textarea w-input" required>{{ old('Message') }}</textarea>
                                            @error('Message')
                                                <div class="text-small" style="color: #b42318;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-button-group"><input type="submit" data-wait="Please wait..."
                                        class="submit-button w-button" value="Send a message"></div>
                            </form>
                            <div class="w-form-done">
                                <div>Thank you! Your submission has been received!</div>
                            </div>
                            <div class="w-form-fail">
                                <div>Oops! Something went wrong while submitting the form.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-block">
                    <div class="schedule-card">
                        <div class="schedule-content">
                            <div class="text-large">Urgent Project?</div>
                            <div class="text-regular">
                                {{ $globalSettings?->company_short_description ?: 'We are available for immediate consultation on mission-critical verification projects' }}
                            </div>
                        </div>
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
                    <div class="content-inner-block">
                        <div class="content-inner-card">
                            <div class="svg w-embed"><svg width="24" height="24" viewbox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.25 6.75C2.25 15.034 8.966 21.75 17.25 21.75H19.5C20.0967 21.75 20.669 21.5129 21.091 21.091C21.5129 20.669 21.75 20.0967 21.75 19.5V18.128C21.75 17.612 21.399 17.162 20.898 17.037L16.475 15.931C16.035 15.821 15.573 15.986 15.302 16.348L14.332 17.641C14.05 18.017 13.563 18.183 13.122 18.021C11.4849 17.4191 9.99815 16.4686 8.76478 15.2352C7.53141 14.0018 6.58087 12.5151 5.979 10.878C5.817 10.437 5.983 9.95 6.359 9.668L7.652 8.698C8.015 8.427 8.179 7.964 8.069 7.525L6.963 3.102C6.90214 2.85869 6.76172 2.6427 6.56405 2.48834C6.36638 2.33397 6.1228 2.25008 5.872 2.25H4.5C3.90326 2.25 3.33097 2.48705 2.90901 2.90901C2.48705 3.33097 2.25 3.90326 2.25 4.5V6.75Z"
                                        stroke="black" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></div>
                            <div class="contact-inner-card-text">
                                <div>Phone Number</div>
                                <div>{{ $globalSettings?->contact_phone ?: 'Not provided yet' }}</div>
                            </div>
                        </div>
                        <div class="content-inner-card">
                            <div class="svg w-embed"><svg width="24" height="24" viewbox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.75 6.75V17.25C21.75 17.8467 21.5129 18.419 21.091 18.841C20.669 19.2629 20.0967 19.5 19.5 19.5H4.5C3.90326 19.5 3.33097 19.2629 2.90901 18.841C2.48705 18.419 2.25 17.8467 2.25 17.25V6.75M21.75 6.75C21.75 6.15326 21.5129 5.58097 21.091 5.15901C20.669 4.73705 20.0967 4.5 19.5 4.5H4.5C3.90326 4.5 3.33097 4.73705 2.90901 5.15901C2.48705 5.58097 2.25 6.15326 2.25 6.75M21.75 6.75V6.993C21.75 7.37715 21.6517 7.75491 21.4644 8.0903C21.2771 8.42569 21.0071 8.70754 20.68 8.909L13.18 13.524C12.8252 13.7425 12.4167 13.8582 12 13.8582C11.5833 13.8582 11.1748 13.7425 10.82 13.524L3.32 8.91C2.99292 8.70854 2.72287 8.42669 2.53557 8.0913C2.34827 7.75591 2.24996 7.37815 2.25 6.994V6.75"
                                        stroke="black" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></div>
                            <div class="contact-inner-card-text">
                                <div>Email Address</div>
                                <div>{{ $globalSettings?->contact_email ?: 'Not provided yet' }}</div>
                            </div>
                        </div>
                        <div class="content-inner-card">
                            <div class="svg w-embed"><svg width="24" height="24" viewbox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15 10.5C15 11.2956 14.6839 12.0587 14.1213 12.6213C13.5587 13.1839 12.7956 13.5 12 13.5C11.2044 13.5 10.4413 13.1839 9.87868 12.6213C9.31607 12.0587 9 11.2956 9 10.5C9 9.70435 9.31607 8.94129 9.87868 8.37868C10.4413 7.81607 11.2044 7.5 12 7.5C12.7956 7.5 13.5587 7.81607 14.1213 8.37868C14.6839 8.94129 15 9.70435 15 10.5Z"
                                        stroke="black" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M19.5 10.5C19.5 17.642 12 21.75 12 21.75C12 21.75 4.5 17.642 4.5 10.5C4.5 8.51088 5.29018 6.60322 6.6967 5.1967C8.10322 3.79018 10.0109 3 12 3C13.9891 3 15.8968 3.79018 17.3033 5.1967C18.7098 6.60322 19.5 8.51088 19.5 10.5Z"
                                        stroke="black" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></div>
                            <div class="contact-inner-card-text">
                                <div>Address</div>
                                <div>{{ $globalSettings?->address ?: 'Not provided yet' }}</div>
                            </div>
                        </div>
                        <div class="content-inner-card no-border">
                            <div>Office Hours</div>
                            <div class="contact-inner-card-text">
                                <div class="spacebetween">
                                    <div class="text-regular text-color-primary">Monday - Friday</div>
                                    <div>9:00 AM-6:00 PM</div>
                                </div>
                                <div class="spacebetween">
                                    <div class="text-regular text-color-primary">Saturday - Sunday</div>
                                    <div>Closed</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-faq-section :faqs="$faqs ?? collect()" />
@endsection
