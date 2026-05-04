@extends('layouts.app')

@section('seo_key', 'privacy-policy')

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
    <section class="banner-section insights">
        <div class="container">
            <div class="technology-banner-title">
                <div data-w-id="b62f9eee-344d-9d27-264d-8977a88cab2a" class="section-title-block">
                    <h1 class="h1 text-color-white">Privacy Policy</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="section-80-80">
        <div class="container">
            <div class="rich-text-container">
                <div class="rich-text w-richtext">
                    <h5>1. Information We Collect</h5>
                    <h6>Personal Information</h6>
                    <p>When you fill out forms or contact us, we may collect:</p>
                    <ul role="list">
                        <li>Name</li>
                        <li>Email address</li>
                        <li>Phone number</li>
                        <li>Company name (if applicable)</li>
                    </ul>
                    <h6>Automatically Collected Data</h6>
                    <p>When you visit our website, we may collect:</p>
                    <ul role="list">
                        <li>IP address</li>
                        <li>Browser type</li>
                        <li>Device information</li>
                        <li>Pages visited and time spent</li>
                    </ul>
                    <p>This helps us improve user experience and website performance.</p>
                    <h5>2. How We Use Your Information</h5>
                    <p>We use the collected information to:</p>
                    <ul role="list">
                        <li>Respond to inquiries or messages</li>
                        <li>Provide our services</li>
                        <li>Improve website functionality</li>
                        <li>Send updates or promotional content (only if you opt-in)</li>
                    </ul>
                    <h5>3. Cookies and Tracking Technologies</h5>
                    <p>We may use cookies and similar tracking technologies to:</p>
                    <ul role="list">
                        <li>Analyze website traffic</li>
                        <li>Understand user behavior</li>
                        <li>Improve performance</li>
                    </ul>
                    <p>You can disable cookies through your browser settings.</p>
                    <h5>4. Third-Party Services</h5>
                    <p>We may use third-party tools such as:</p>
                    <ul role="list">
                        <li>Analytics tools (e.g., Google Analytics)</li>
                        <li>Hosting services (e.g., Webflow)</li>
                    </ul>
                    <p>These services may collect and process data according to their own privacy policies.</p>
                    <h5>5. Data Sharing</h5>
                    <p>We do <strong>not sell, trade, or rent</strong> your personal information.</p>
                    <p>We may share data only when:</p>
                    <ul role="list">
                        <li>Required by law</li>
                        <li>Necessary to provide services (trusted partners)</li>
                    </ul>
                    <h5>6. Data Security</h5>
                    <p>We take appropriate security measures to protect your information from unauthorized access, loss, or
                        misuse.</p>
                    <p>However, no method of transmission over the internet is 100% secure.</p>
                    <h5>7. Your Rights</h5>
                    <p>Depending on your location, you may have the right to:</p>
                    <ul role="list">
                        <li>Access your personal data</li>
                        <li>Request correction or deletion</li>
                        <li>Withdraw consent</li>
                    </ul>
                    <p>To exercise these rights, contact us at:<br><strong>[your email address]</strong></p>
                    <h5>8. Links to Other Websites</h5>
                    <p>Our website may contain links to external websites. We are not responsible for their privacy
                        practices.</p>
                    <h5>9. Children’s Privacy</h5>
                    <p>Our services are not intended for individuals under 13. We do not knowingly collect personal data
                        from children.</p>
                    <h5>10. Changes to This Policy</h5>
                    <p>We may update this Privacy Policy from time to time. Updates will be posted on this page with a
                        revised date.</p>
                    <h5>11. Contact Us</h5>
                    <p>If you have any questions about this Privacy Policy, you can contact us:</p>
                    <ul role="list">
                        <li>Email: [your email]</li>
                        <li>Website: [your website URL]</li>
                    </ul>
                    <p>‍</p>
                </div>
            </div>
        </div>
    </section>
    <x-lead-section title="Ready to Transform Your Semiconductor Vision?"
        description="Let's discuss how our expertise can accelerate your next semiconductor project" {{-- book-link="#"
        schedule-link="#" --}} />
@endsection