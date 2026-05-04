@extends('layouts.app')

@section('seo_key', 'careers')

@section('content')
    <section class="banner-section insights">
        <div class="container">
            <div class="technology-banner-title">
                <div data-w-id="b62f9eee-344d-9d27-264d-8977a88cab2a" class="section-title-block">
                    <h1 class="h1 text-color-white">{{ $career->title }}</h1>
                    <div class="text-regular text-white">{{ $career->short_description }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-120-120">
        <div class="container">
            <div class="career-wrapper">
                <div class="career-text-content">
                    <div class="h6">{{ $career->title }}</div>
                    <div class="career-content-wrapper">
                        <div class="description-content">
                            {!! $career->description !!}
                        </div>

                        @if ($career->key_qualifications)
                            <div class="career-lists-block">
                                <div class="text-regular text-color-primary">Key Qualifications:</div>
                                <div class="career-lists">
                                    @foreach ($career->key_qualifications as $item)
                                        <div class="career-list">
                                            <div class="career-list-icon w-embed"><svg width="8" height="8" viewbox="0 0 8 8"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4" cy="4" r="4" fill="#2F5E8C"></circle>
                                                </svg></div>
                                            <div>{{ $item['title'] }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($career->responsibilities)
                            <div class="career-lists-block">
                                <div class="text-regular text-color-primary">Your Responsibilities:</div>
                                <div class="career-lists">
                                    @foreach ($career->responsibilities as $item)
                                        <div class="career-list">
                                            <div class="career-list-icon w-embed"><svg width="8" height="8" viewbox="0 0 8 8"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4" cy="4" r="4" fill="#2F5E8C"></circle>
                                                </svg></div>
                                            <div>{{ $item['title'] }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($career->benefits)
                            <div class="career-lists-block">
                                <div class="text-regular text-color-primary">Benefits and Perks:</div>
                                <div class="career-lists">
                                    @foreach ($career->benefits as $item)
                                        <div class="career-list">
                                            <div class="career-list-icon w-embed"><svg width="8" height="8" viewbox="0 0 8 8"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4" cy="4" r="4" fill="#2F5E8C"></circle>
                                                </svg></div>
                                            <div>{{ $item['title'] }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="career-button">
                            <a schedule="True" data-wf--button--variant="small-button"
                                href="{{ route('careers.apply', $career->slug) }}"
                                class="button w-variant-13c055bd-9c9a-b790-2595-34b2f1f63fc6 w-inline-block">
                                <div class="text-regular">Apply Now</div>
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
                <div class="career-meta-block">
                    <div class="h6 text-primay">Job Summary:</div>
                    <div class="career-meta-inner-block">
                        <div class="career-meta-card">
                            <div class="career-meta-card-icon w-embed"><svg width="20" height="20" viewbox="0 0 20 20"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 8.75C12.5 9.41304 12.2366 10.0489 11.7678 10.5178C11.2989 10.9866 10.663 11.25 10 11.25C9.33696 11.25 8.70107 10.9866 8.23223 10.5178C7.76339 10.0489 7.5 9.41304 7.5 8.75C7.5 8.08696 7.76339 7.45107 8.23223 6.98223C8.70107 6.51339 9.33696 6.25 10 6.25C10.663 6.25 11.2989 6.51339 11.7678 6.98223C12.2366 7.45107 12.5 8.08696 12.5 8.75Z"
                                        stroke="#2F5E8C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                    <path
                                        d="M16.25 8.75C16.25 14.7017 10 18.125 10 18.125C10 18.125 3.75 14.7017 3.75 8.75C3.75 7.0924 4.40848 5.50268 5.58058 4.33058C6.75268 3.15848 8.3424 2.5 10 2.5C11.6576 2.5 13.2473 3.15848 14.4194 4.33058C15.5915 5.50268 16.25 7.0924 16.25 8.75Z"
                                        stroke="#2F5E8C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg></div>
                            <div class="career-meta-inner-card">
                                <div>Location</div>
                                <div>{{ $career->location }}</div>
                            </div>
                        </div>
                        <div class="career-meta-card">
                            <div class="career-meta-card-icon w-embed"><svg width="20" height="20" viewbox="0 0 20 20"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.875 11.7917V15.3333C16.875 16.245 16.2192 17.03 15.315 17.15C13.5759 17.3808 11.8017 17.5 10 17.5C8.19838 17.5 6.42421 17.3808 4.68505 17.15C3.78088 17.03 3.12505 16.245 3.12505 15.3333V11.7917M16.875 11.7917C17.0729 11.6197 17.2312 11.407 17.3391 11.168C17.447 10.9291 17.5019 10.6697 17.5 10.4075V7.255C17.5 6.35417 16.86 5.57583 15.9692 5.4425C15.0253 5.30118 14.0766 5.19361 13.125 5.12M16.875 11.7917C16.7134 11.9292 16.525 12.0375 16.3142 12.1083C14.2777 12.784 12.1457 13.1273 10 13.125C7.79338 13.125 5.67088 12.7675 3.68588 12.1083C3.48026 12.0399 3.28982 11.9324 3.12505 11.7917M3.12505 11.7917C2.92717 11.6197 2.76885 11.407 2.66096 11.168C2.55308 10.9291 2.49818 10.6697 2.50005 10.4075V7.255C2.50005 6.35417 3.14005 5.57583 4.03088 5.4425C4.97479 5.30118 5.92345 5.19361 6.87505 5.12M13.125 5.12V4.375C13.125 3.87772 12.9275 3.40081 12.5759 3.04917C12.2242 2.69754 11.7473 2.5 11.25 2.5H8.75005C8.25277 2.5 7.77585 2.69754 7.42422 3.04917C7.07259 3.40081 6.87505 3.87772 6.87505 4.375V5.12M13.125 5.12C11.0448 4.95923 8.95528 4.95923 6.87505 5.12M10 10.625H10.0067V10.6317H10V10.625Z"
                                        stroke="#2F5E8C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg></div>
                            <div class="career-meta-inner-card">
                                <div>Job Type</div>
                                <div>{{ $career->employment_type }} ({{ $career->work_location_type }})</div>
                            </div>
                        </div>
                        <div class="career-meta-card">
                            <div class="career-meta-card-icon w-embed"><svg width="20" height="20" viewbox="0 0 20 20"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.25 11.875V9.6875C16.25 8.94158 15.9537 8.22621 15.4262 7.69876C14.8988 7.17132 14.1834 6.875 13.4375 6.875H12.1875C11.9389 6.875 11.7004 6.77623 11.5246 6.60041C11.3488 6.4246 11.25 6.18614 11.25 5.9375V4.6875C11.25 3.94158 10.9537 3.22621 10.4262 2.69876C9.89879 2.17132 9.18342 1.875 8.4375 1.875H6.875M8.75 1.875H4.6875C4.17 1.875 3.75 2.295 3.75 2.8125V17.1875C3.75 17.705 4.17 18.125 4.6875 18.125H15.3125C15.83 18.125 16.25 17.705 16.25 17.1875V9.375C16.25 7.38588 15.4598 5.47822 14.0533 4.0717C12.6468 2.66518 10.7391 1.875 8.75 1.875Z"
                                        stroke="#2F5E8C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg></div>
                            <div class="career-meta-inner-card">
                                <div>Experience</div>
                                <div>{{ $career->experience_level }}</div>
                            </div>
                        </div>
                        <div class="career-meta-card">
                            <div class="career-meta-card-icon w-embed"><svg width="20" height="20" viewbox="0 0 20 20"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.625 2.5V4.375M14.375 2.5V4.375M2.5 15.625V6.25C2.5 5.75272 2.69754 5.27581 3.04917 4.92417C3.40081 4.57254 3.87772 4.375 4.375 4.375H15.625C16.1223 4.375 16.5992 4.57254 16.9508 4.92417C17.3025 5.27581 17.5 5.75272 17.5 6.25V15.625M2.5 15.625C2.5 16.1223 2.69754 16.5992 3.04917 16.9508C3.40081 17.3025 3.87772 17.5 4.375 17.5H15.625C16.1223 17.5 16.5992 17.3025 16.9508 16.9508C17.3025 16.5992 17.5 16.1223 17.5 15.625M2.5 15.625V9.375C2.5 8.87772 2.69754 8.40081 3.04917 8.04917C3.40081 7.69754 3.87772 7.5 4.375 7.5H15.625C16.1223 7.5 16.5992 7.69754 16.9508 8.04917C17.3025 8.40081 17.5 8.87772 17.5 9.375V15.625M10 10.625H10.0067V10.6317H10V10.625ZM10 12.5H10.0067V12.5067H10V12.5ZM10 14.375H10.0067V14.3817H10V14.375ZM8.125 12.5H8.13167V12.5067H8.125V12.5ZM8.125 14.375H8.13167V14.3817H8.125V14.375ZM6.25 12.5H6.25667V12.5067H6.25V12.5ZM6.25 14.375H6.25667V14.3817H6.25V14.375ZM11.875 10.625H11.8817V10.6317H11.875V10.625ZM11.875 12.5H11.8817V12.5067H11.875V12.5ZM11.875 14.375H11.8817V14.3817H11.875V14.375ZM13.75 10.625H13.7567V10.6317H13.75V10.625ZM13.75 12.5H13.7567V12.5067H13.75V12.5Z"
                                        stroke="#2F5E8C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg></div>
                            <div class="career-meta-inner-card">
                                <div>Date Posted</div>
                                <div>{{ $career->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        <div class="career-meta-card">
                            <div class="career-meta-card-icon w-embed"><svg width="20" height="20" viewbox="0 0 20 20"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 5V10H13.75M17.5 10C17.5 10.9849 17.306 11.9602 16.9291 12.8701C16.5522 13.7801 15.9997 14.6069 15.3033 15.3033C14.6069 15.9997 13.7801 16.5522 12.8701 16.9291C11.9602 17.306 10.9849 17.5 10 17.5C9.01509 17.5 8.03982 17.306 7.12987 16.9291C6.21993 16.5522 5.39314 15.9997 4.6967 15.3033C4.00026 14.6069 3.44781 13.7801 3.0709 12.8701C2.69399 11.9602 2.5 10.9849 2.5 10C2.5 8.01088 3.29018 6.10322 4.6967 4.6967C6.10322 3.29018 8.01088 2.5 10 2.5C11.9891 2.5 13.8968 3.29018 15.3033 4.6967C16.7098 6.10322 17.5 8.01088 17.5 10Z"
                                        stroke="#2F5E8C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg></div>
                            <div class="career-meta-inner-card">
                                <div>Working Hours</div>
                                <div>{{ $career->working_hour }}</div>
                            </div>
                        </div>
                        <div class="career-meta-card">
                            <div class="career-meta-card-icon w-embed"><svg width="20" height="20" viewbox="0 0 20 20"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.625 2.5V4.375M14.375 2.5V4.375M2.5 15.625V6.25C2.5 5.75272 2.69754 5.27581 3.04917 4.92417C3.40081 4.57254 3.87772 4.375 4.375 4.375H15.625C16.1223 4.375 16.5992 4.57254 16.9508 4.92417C17.3025 5.27581 17.5 5.75272 17.5 6.25V15.625M2.5 15.625C2.5 16.1223 2.69754 16.5992 3.04917 16.9508C3.40081 17.3025 3.87772 17.5 4.375 17.5H15.625C16.1223 17.5 16.5992 17.3025 16.9508 16.9508C17.3025 16.5992 17.5 16.1223 17.5 15.625M2.5 15.625V9.375C2.5 8.87772 2.69754 8.40081 3.04917 8.04917C3.40081 7.69754 3.87772 7.5 4.375 7.5H15.625C16.1223 7.5 16.5992 7.69754 16.9508 8.04917C17.3025 8.40081 17.5 8.87772 17.5 9.375V15.625M10 10.625H10.0067V10.6317H10V10.625ZM10 12.5H10.0067V12.5067H10V12.5ZM10 14.375H10.0067V14.3817H10V14.375ZM8.125 12.5H8.13167V12.5067H8.125V12.5ZM8.125 14.375H8.13167V14.3817H8.125V14.375ZM6.25 12.5H6.25667V12.5067H6.25V12.5ZM6.25 14.375H6.25667V14.3817H6.25V14.375ZM11.875 10.625H11.8817V10.6317H11.875V10.625ZM11.875 12.5H11.8817V12.5067H11.875V12.5ZM11.875 14.375H11.8817V14.3817H11.875V14.375ZM13.75 10.625H13.7567V10.6317H13.75V10.625ZM13.75 12.5H13.7567V12.5067H13.75V12.5Z"
                                        stroke="#2F5E8C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg></div>
                            <div class="career-meta-inner-card">
                                <div>Working Days</div>
                                <div>{{ $career->working_days }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>
    </section>
    <x-lead-section title="Don't See the Right Role?"
        description="We're always looking for exceptional talent. Send us your resume and we'll keep you in mind for future opportunities."
        {{-- book-link="#" schedule-link="#" --}} />
@endsection