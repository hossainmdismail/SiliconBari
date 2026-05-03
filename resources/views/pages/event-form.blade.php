@extends('layouts.app')

@section('seo_key', 'about')

@section('content')
    <section class="banner-section insights">
        <div class="container">
            <div class="technology-banner-title">
                <div data-w-id="b62f9eee-344d-9d27-264d-8977a88cab2a" class="section-title-block">
                    <h1 class="h1 text-color-white">Register Event</h1>
                    <div class="text-regular text-white">Register for an upcoming event to learn more</div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-80-80">
        <div class="container">
            <div class="contact-wrapper">
                <div class="contact-form-wrapper">
                    <div class="form-card">
                        <div class="event-card-content-text-block">
                            <div class="h4">{{ $event->title }}</div>
                            <div class="event-card-content-text-wrap">
                                <div class="event-label-grid">
                                    <div class="event-location margin-16">
                                        <div class="svg w-embed"><svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.5 8.75C12.5 9.41304 12.2366 10.0489 11.7678 10.5178C11.2989 10.9866 10.663 11.25 10 11.25C9.33696 11.25 8.70107 10.9866 8.23223 10.5178C7.76339 10.0489 7.5 9.41304 7.5 8.75C7.5 8.08696 7.76339 7.45107 8.23223 6.98223C8.70107 6.51339 9.33696 6.25 10 6.25C10.663 6.25 11.2989 6.51339 11.7678 6.98223C12.2366 7.45107 12.5 8.08696 12.5 8.75Z"
                                                    stroke="#00A1B0" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M16.25 8.75C16.25 14.7017 10 18.125 10 18.125C10 18.125 3.75 14.7017 3.75 8.75C3.75 7.0924 4.40848 5.50268 5.58058 4.33058C6.75268 3.15848 8.3424 2.5 10 2.5C11.6576 2.5 13.2473 3.15848 14.4194 4.33058C15.5915 5.50268 16.25 7.0924 16.25 8.75Z"
                                                    stroke="#00A1B0" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg></div>
                                        <div class="text-regular text-color-primary">{{ $event->location }}</div>
                                    </div>
                                    <div class="event-location margin-16">
                                        <div class="svg w-embed"><svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.625 2.5V4.375M14.375 2.5V4.375M2.5 15.625V6.25C2.5 5.75272 2.69754 5.27581 3.04917 4.92417C3.40081 4.57254 3.87772 4.375 4.375 4.375H15.625C16.1223 4.375 16.5992 4.57254 16.9508 4.92417C17.3025 5.27581 17.5 5.75272 17.5 6.25V15.625M2.5 15.625C2.5 16.1223 2.69754 16.5992 3.04917 16.9508C3.40081 17.3025 3.87772 17.5 4.375 17.5H15.625C16.1223 17.5 16.5992 17.3025 16.9508 16.9508C17.3025 16.5992 17.5 16.1223 17.5 15.625M2.5 15.625V9.375C2.5 8.87772 2.69754 8.40081 3.04917 8.04917C3.40081 7.69754 3.87772 7.5 4.375 7.5H15.625C16.1223 7.5 16.5992 7.69754 16.9508 8.04917C17.3025 8.40081 17.5 8.87772 17.5 9.375V15.625M10 10.625H10.0067V10.6317H10V10.625ZM10 12.5H10.0067V12.5067H10V12.5ZM10 14.375H10.0067V14.3817H10V14.375ZM8.125 12.5H8.13167V12.5067H8.125V12.5ZM8.125 14.375H8.13167V14.3817H8.125V14.375ZM6.25 12.5H6.25667V12.5067H6.25V12.5ZM6.25 14.375H6.25667V14.3817H6.25V14.375ZM11.875 10.625H11.8817V10.6317H11.875V10.625ZM11.875 12.5H11.8817V12.5067H11.875V12.5ZM11.875 14.375H11.8817V14.3817H11.875V14.375ZM13.75 10.625H13.7567V10.6317H13.75V10.625ZM13.75 12.5H13.7567V12.5067H13.75V12.5Z"
                                                    stroke="#00A1B0" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg></div>
                                        <div class="text-regular text-color-primary">{{ optional($event->event_date)->format('F d, Y') }}</div>
                                    </div>
                                    <div class="event-location margin-16">
                                        <div class="svg w-embed"><svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10 5V10H13.75M17.5 10C17.5 10.9849 17.306 11.9602 16.9291 12.8701C16.5522 13.7801 15.9997 14.6069 15.3033 15.3033C14.6069 15.9997 13.7801 16.5522 12.8701 16.9291C11.9602 17.306 10.9849 17.5 10 17.5C9.01509 17.5 8.03982 17.306 7.12987 16.9291C6.21993 16.5522 5.39314 15.9997 4.6967 15.3033C4.00026 14.6069 3.44781 13.7801 3.0709 12.8701C2.69399 11.9602 2.5 10.9849 2.5 10C2.5 8.01088 3.29018 6.10322 4.6967 4.6967C6.10322 3.29018 8.01088 2.5 10 2.5C11.9891 2.5 13.8968 3.29018 15.3033 4.6967C16.7098 6.10322 17.5 8.01088 17.5 10Z"
                                                    stroke="#00A1B0" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg></div>
                                        <div class="text-regular text-color-primary">{{ $event->event_time }}</div>
                                    </div>
                                </div>
                                <div class="text-regular">{!! $event->description !!}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-block w-form">
                        @if(session('success'))
                            <div class="w-form-done" style="display: block;">
                                <div>{{ session('success') }}</div>
                            </div>
                        @endif

                        <form action="{{ route('events.register.submit', $event->id) }}" method="POST" class="contact-form">
                            @csrf
                            <div class="contact-form-divider">
                                <div class="h6">Personal Information</div>
                                <div class="contact-form-inner-divider">
                                    <div class="form-grid-2">
                                        <div class="auth-input-block">
                                            <label for="full_name" class="text-regular">Full Name*</label>
                                            <input class="input w-input" maxlength="256" name="full_name" placeholder="Type your name" type="text" id="full_name" required value="{{ old('full_name') }}">
                                            @error('full_name') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="auth-input-block">
                                            <label for="email" class="text-regular">Email*</label>
                                            <input class="input transparent w-input" maxlength="256" name="email" placeholder="Your.email@company.com" type="email" id="email" required value="{{ old('email') }}">
                                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-grid-2">
                                        <div class="auth-input-block">
                                            <label for="phone" class="text-regular">Phone Number*</label>
                                            <input class="input transparent w-input" maxlength="256" name="phone" placeholder="e.g., +880 1711 000000" type="text" id="phone" required value="{{ old('phone') }}">
                                            @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="auth-input-block">
                                            <label for="current_location" class="text-regular">Current Location*</label>
                                            <input class="input transparent w-input" maxlength="256" name="current_location" placeholder="Your location" type="text" id="current_location" required value="{{ old('current_location') }}">
                                            @error('current_location') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-form-divider">
                                <div class="h6">Professional Experience</div>
                                <div class="contact-form-inner-divider">
                                    <div class="form-grid-2">
                                        <div class="auth-input-block">
                                            <label for="job_title" class="text-regular">Job Title or Student</label>
                                            <input class="input w-input" maxlength="256" name="job_title" placeholder="" type="text" id="job_title" value="{{ old('job_title') }}">
                                            @error('job_title') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="auth-input-block">
                                            <label for="university_company" class="text-regular">University / Company *</label>
                                            <input class="input transparent w-input" maxlength="256" name="university_company" placeholder="" type="text" id="university_company" required value="{{ old('university_company') }}">
                                            @error('university_company') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-grid-2">
                                        <div class="auth-input-block">
                                            <label for="industry" class="text-regular">Industry*</label>
                                            <input class="input transparent w-input" maxlength="256" name="industry" placeholder="" type="text" id="industry" required value="{{ old('industry') }}">
                                            @error('industry') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-form-divider">
                                <div class="h6">Additional Information</div>
                                <div class="contact-form-inner-divider">
                                    <div class="auth-input-block">
                                        <label for="additional_info" class="text-regular">Why do you want to attend?*</label>
                                        <textarea required="" placeholder="Share your interest in this event..." maxlength="5000" id="additional_info" name="additional_info" class="input textarea w-input">{{ old('additional_info') }}</textarea>
                                        @error('additional_info') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-button-group"><input type="submit" data-wait="Please wait..."
                                    class="submit-button w-button" value="Submit"></div>
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
        </div>
    </section>
@endsection