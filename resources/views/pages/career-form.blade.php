@extends('layouts.app')

@section('seo_key', 'careers')

@section('content')
    <section class="banner-section insights">
        <div class="container">
            <div class="technology-banner-title">
                <div data-w-id="b62f9eee-344d-9d27-264d-8977a88cab2a" class="section-title-block">
                    <h1 class="h1 text-color-white">Apply for This Position</h1>
                    <div class="text-regular text-white">Be part of a team that&#x27;s shaping the future of semiconductor
                        technology. We&#x27;re looking for talented engineers who are passionate about innovation and
                        excellence.</div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-80-80">
        <div class="container">
            <div class="contact-wrapper">
                <div class="contact-form-wrapper">
                    <div class="form-card career">
                        <div class="event-card-content-text-block">
                            <div class="h4">{{ $career->title }}</div>
                            <div class="event-card-content-text-wrap">
                                <div class="event-label-grid">
                                    <div class="event-location margin-16">
                                        <div class="text-regular text-color-primary">{{ $career->work_location_type }}</div>
                                    </div>
                                    <div class="event-location margin-16">
                                        <div class="text-regular text-color-primary">{{ $career->employment_type }}</div>
                                    </div>
                                    <div class="event-location margin-16">
                                        <div class="text-regular text-color-primary">Exp {{ $career->experience_level }}</div>
                                    </div>
                                </div>
                                <div class="text-regular">{{ $career->short_description }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-block w-form">
                        <form id="career-apply-form" name="career-apply-form" action="{{ route('careers.apply.submit', $career->slug) }}" method="POST"
                            class="contact-form" enctype="multipart/form-data">
                            @csrf
                            <div class="contact-form-divider">
                                <div class="h6">Personal Information</div>
                                <div class="contact-form-inner-divider">
                                    <div class="form-grid-2">
                                        <div class="auth-input-block">
                                            <label for="Name" class="text-regular">Full Name*</label>
                                            <input class="input w-input" maxlength="256" name="Name" value="{{ old('Name') }}"
                                                placeholder="Type your name" type="text" id="Name" required="">
                                            @error('Name') <div class="text-danger small">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="auth-input-block">
                                            <label for="Email" class="text-regular">Email*</label>
                                            <input class="input transparent w-input" maxlength="256" name="Email" value="{{ old('Email') }}"
                                                placeholder="Your.email@company.com" type="email" id="Email" required="">
                                            @error('Email') <div class="text-danger small">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-grid-2">
                                        <div class="auth-input-block">
                                            <label for="Number" class="text-regular">Phone Number*</label>
                                            <input class="input transparent w-input" maxlength="256" name="Number" value="{{ old('Number') }}"
                                                placeholder="e.g., +880 1711 000000" type="tel" id="Number" required="">
                                            @error('Number') <div class="text-danger small">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="auth-input-block">
                                            <label for="Location" class="text-regular">Current Location*</label>
                                            <input class="input transparent w-input" maxlength="256" name="Location" value="{{ old('Location') }}"
                                                placeholder="Your location" type="text" id="Location" required="">
                                            @error('Location') <div class="text-danger small">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-grid-2">
                                        <div class="auth-input-block">
                                            <label for="Linkedin" class="text-regular">Linkedin Profile URL</label>
                                            <input class="input transparent w-input" maxlength="256" name="Linkedin" value="{{ old('Linkedin') }}"
                                                placeholder="https://linkedin.com/in/..." type="url" id="Linkedin">
                                            @error('Linkedin') <div class="text-danger small">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="auth-input-block">
                                            <label for="Portfolio" class="text-regular">Portfolio</label>
                                            <input class="input transparent w-input" maxlength="256" name="Portfolio" value="{{ old('Portfolio') }}"
                                                placeholder="https://" type="url" id="Portfolio">
                                            @error('Portfolio') <div class="text-danger small">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-form-divider">
                                <div class="h6">Professional Experience</div>
                                <div class="contact-form-inner-divider">
                                    <div class="form-grid-2">
                                        <div class="auth-input-block">
                                            <label for="Education" class="text-regular">Highest Education*</label>
                                            <input class="input w-input" maxlength="256" name="Education" value="{{ old('Education') }}"
                                                placeholder="" type="text" id="Education" required="">
                                            @error('Education') <div class="text-danger small">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="auth-input-block">
                                            <label for="University" class="text-regular">University / Institution *</label>
                                            <input class="input transparent w-input" maxlength="256" name="University" value="{{ old('University') }}"
                                                placeholder="" type="text" id="University" required="">
                                            @error('University') <div class="text-danger small">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-grid-2">
                                        <div class="auth-input-block">
                                            <label for="Experience" class="text-regular">Years of Experience*</label>
                                            <input class="input transparent w-input" maxlength="256" name="Experience" value="{{ old('Experience') }}"
                                                placeholder="" type="text" id="Experience" required="">
                                            @error('Experience') <div class="text-danger small">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="auth-input-block">
                                            <label for="Current-Company" class="text-regular">Current Company</label>
                                            <input class="input transparent w-input" maxlength="256" name="Current-Company" value="{{ old('Current-Company') }}"
                                                placeholder="" type="text" id="Current-Company">
                                            @error('Current-Company') <div class="text-danger small">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-form-divider">
                                <div class="h6">Resume Upload</div>
                                <div class="contact-form-inner-divider">
                                    <div class="auth-input-block">
                                        <label for="Resume" class="text-regular">Upload Resume (PDF)*</label>
                                        <input type="file" name="Resume" id="Resume" class="input w-input" accept=".pdf" required style="padding: 10px;">
                                        @error('Resume') <div class="text-danger small">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="contact-form-divider">
                                <div class="h6">Cover Letter</div>
                                <div class="contact-form-inner-divider">
                                    <div class="auth-input-block">
                                        <label for="Coverletter" class="text-regular">Cover Letter</label>
                                        <textarea placeholder="Tell us why you're interested in this position and what makes you a great fit..."
                                            maxlength="5000" id="Coverletter" name="Coverletter"
                                            class="input textarea w-input">{{ old('Coverletter') }}</textarea>
                                        @error('Coverletter') <div class="text-danger small">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-button-group">
                                <input type="submit" data-wait="Please wait..." class="submit-button w-button" value="Submit Application">
                            </div>
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

    <x-lead-section title="Ready to Transform Your Semiconductor Vision?"
        description="Let's discuss how our expertise can accelerate your next semiconductor project" {{-- book-link="#"
        schedule-link="#" --}} />
@endsection