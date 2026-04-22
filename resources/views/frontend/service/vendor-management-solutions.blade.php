@extends('frontend.layouts.index')

@section('title') {{ isset($meta_title) ? $meta_title : 'TimeMatters Inc.' }} @endsection
@section('description') {{ isset($meta_description) ? $meta_description : 'TimeMatters Inc.' }} @endsection
@section('keywords') {{ isset($meta_keywords) ? $meta_keywords : 'TimeMatters Inc.' }} @endsection

@section('content')

    <!-- <section class="vendor-banner-sec inner-service-banner">
                                                                    <img src="{{ asset('front-assets/src/images/vendor-management-banner-img.webp') }}" alt="" class="img-fluid w-100  banner-img" width="1920" height="767">
                                                                    <div class="banner-content col-12">
                                                                        <div class="container-md">
                                                                            <div class="row">
                                                                                <div class="banner-text">
                                                                                    <h1 class="desktop-heading">Vendor Management Solution Advisory</h1>
                                                                                    <h1 class="mobile-heading">Vendor Management Solution Advisory</h1>
                                                                                    <p> Independent guidance to help you build and manage the workforce programs,<br> processes, and technologies that support your vendor strategy and operational goals.</p>
                                                                                    <a href="" class="cmn-btn banner-btn light-wht-btn">
                                                                                        <spam class="text"> Connect with Us</spam>
                                                                                        <span class="btn-circle">
                                                                                            <img decoding="async" src="{{ asset('front-assets/src/images/common-btn-white-arrow.webp ') }}">
                                                                                        </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </section> -->
    <section class="vendor-banner-sec inner-service-banner">
        @if (!empty($service->section1_image))
            @php
                $img1 = App\Models\MediaImage::select('name', 'alt_text')
                    ->where('id', $service->section1_image)
                    ->first();
            @endphp

            @if (!empty($img1->name))
                <img src="{{ asset('uploads/' . $img1->name) }}" alt="{{ $img1->alt_text }}" class="img-fluid w-100  banner-img"
                    width="1920" height="767">
            @else
                <img src="{{ asset('front-assets/src/images/vendor-management-banner-img.webp') }}" alt=""
                    class="img-fluid w-100  banner-img" width="1920" height="767">
            @endif
        @else
            <<img src="{{ asset('front-assets/src/images/vendor-management-banner-img.webp') }}" alt=""
                class="img-fluid w-100  banner-img" width="1920" height="767">
        @endif

            <div class="banner-content col-12">
                <div class="container-md">
                    <div class="row">
                        <div class="banner-text">
                            @if (isset($service->section1_title))
                                <h1 class="desktop-heading">{{ $service->section1_title }}</h1>
                                <h1 class="mobile-heading">{{ $service->section1_title }}</h1>
                            @endif
                            @if (isset($service->section1_description))
                                {!! $service->section1_description !!}
                            @endif
                            <a href="{{ isset($service->section1_button_url) ? $service->section1_button_url : 'https://hamzahk15.sg-host.com/contact/' }}"
                                class="cmn-btn banner-btn light-wht-btn">
                                <spam class="text">
                                    {{isset($service->section1_button) ? $service->section1_button : 'Connect with Us'}}
                                </spam>
                                <span class="btn-circle">
                                    <img decoding="async"
                                        src="{{ asset('front-assets/src/images/common-btn-white-arrow.webp ') }}">
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- <section class="vendore-mange-info-sec time-matter-common time-matter-common-padding">
                                                                <div class="container-md">
                                                                    <div class="row">
                                                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12  left-side">
                                                                            <h2 class="desktop-heading mrbt-20">What Is Vendor <br>Management?</h2>
                                                                            <h2 class="mobile-heading mrbt-20">What Is Vendor Management?</h2>
                                                                            <p>Vendor management is the structured oversight of the staffing suppliers that support your contingent
                                                                                workforce. It includes setting program goals, defining performance expectations,
                                                                                ensuring compliance, and managing the processes and tools used to coordinate suppliers and
                                                                                contingent resources. Effective vendor management improves visibility, strengthens governance,
                                                                                and provides better control over supplier performance, cost, and delivery.</p>

                                                                        </div>
                                                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
                                                                            <h2 class="mrbt-20">What Is Vendor Management Solution Advisory?</h2>
                                                                            <p>Organizations often struggle with vendor programs that lack structure, visibility, and consistent
                                                                                supplier performance. Fragmented processes and unclear compliance expectations can create gaps
                                                                                that ultimately impact business outcomes. TimeMatters provides independent program-level
                                                                                advisory to help you build a cohesive vendor management framework—strengthening governance,
                                                                                supplier alignment, process efficiency, and supporting technology selection.</p>
                                                                            <p>TimeMatters provides independent advisory to help organizations design a cohesive vendor
                                                                                management framework—focusing on governance, supplier alignment, workflow optimization, and the
                                                                                technology required to support the program.</p>
                                                                            <p>As part of this service, we offer Vendor Management Software Advisory to ensure your platform
                                                                                selection and configuration match your operational requirements. We also support challenges with
                                                                                time-based Statement of Work (SOW) engagements, helping clarify scope, establish controls, and
                                                                                integrate SOW oversight into your broader vendor management strategy.</p>
                                                                            <p>Our advisory approach ensures your program is structured, scalable, and able to deliver
                                                                                measurable value.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section> -->
    <section class="vendore-mange-info-sec time-matter-common time-matter-common-padding service-{{ $service->id }}"
        id="service-{{ $service->id }}">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12  left-side">
                    @if (isset($service->section2_title))
                        <h2 class="desktop-heading mrbt-20">{!! $service->section2_title !!}</h2>
                        <h2 class="mobile-heading mrbt-20">{!! $service->section2_title !!}</h2>
                    @endif
                    @if (isset($service->section2_description))
                        {!! $service->section2_description !!}
                    @endif


                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
                    @if (isset($service->section2_title2))
                        <h2 class="mrbt-20">{!! $service->section2_title2 !!}</h2>
                    @endif
                    @if (isset($service->section2_description2))
                        {!! $service->section2_description2 !!}
                    @endif
                </div>
            </div>
        </div>
    </section>




    @if(in_array($service->id, [5, 6]))

        <section class="culture-values-sec why-choose-sec time-matter-common time-matter-common-padding extre-service-section service-{{ $service->id }}">
            <div class="container-md">
                <div class="row first-row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 top-heading text-center ">
                        @if(isset($service->historysubtitle) && $service->historysubtitle != null)
                            <h2 class="mrbt-20">{{ $service->historysubtitle }}</h2>
                        @endif
                        <!-- <p class="section-subtext">At the heart of TimeMatters is a commitment to <b style="font-weight:500;color:#333">Integrity, Independence,
                                                                                                                                        and the Success of our clients.</b></p> -->
                        @if (isset($service->historydescription) && $service->historydescription != null)
                            {!! $service->historydescription !!}
                        @endif
                    </div>
                </div>
                <div class="row align-items-center second-row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 image-side">

                        @if (!empty($service->historyimage))
                            @php
                                $h_img = App\Models\MediaImage::select('name', 'alt_text')
                                    ->where('id', $service->historyimage)
                                    ->first();
                            @endphp

                            @if (!empty($h_img->name))
                                <img src="{{ asset('uploads/' . $h_img->name) }}" alt="{{ $h_img->alt_text }}"
                                    class="img-fluid desktop-img">
                            @else
                                <img src="{{ asset('front-assets/src/images/culture-values-img.webp') }}" alt=""
                                    class="img-fluid desktop-img">
                            @endif
                        @else
                            <img src="{{ asset('front-assets/src/images/culture-values-img.webp') }}" alt=""
                                class="img-fluid desktop-img">
                        @endif


                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 right-side">
                        @if (!empty($service->historyimage))
                            @php
                                $h_img = App\Models\MediaImage::select('name', 'alt_text')
                                    ->where('id', $service->historyimage)
                                    ->first();
                            @endphp

                            @if (!empty($h_img->name))
                                <img src="{{ asset('uploads/' . $h_img->name) }}" alt="{{ $h_img->alt_text }}"
                                    class="img-fluid mobile-img">
                            @else
                                <img src="{{ asset('front-assets/src/images/culture-values-img.webp') }}" alt=""
                                    class="img-fluid mobile-img">
                            @endif
                        @else
                            <img src="{{ asset('front-assets/src/images/culture-values-img.webp') }}" alt=""
                                class="img-fluid mobile-img">
                        @endif

                        @if (isset($service->cv_subtitle_1) && $service->cv_subtitle_1 != null)
                            <article>
                                <div class="content">
                                    <h3>{{$service->cv_subtitle_1}}</h3>
                                    @if (isset($service->cv_note_1) && $service->cv_note_1 != null)
                                        <p>{{ $service->cv_note_1 }}</p>
                                    @endif
                                </div>
                            </article>
                        @endif
                        @if (isset($service->cv_subtitle_2) && $service->cv_subtitle_2 != null)
                            <article>
                                <div class="content">
                                    <h3>{{$service->cv_subtitle_2}}</h3>
                                    @if (isset($service->cv_note_2) && $service->cv_note_2 != null)
                                        <p>{{ $service->cv_note_2 }}</p>
                                    @endif
                                </div>
                            </article>
                        @endif
                        @if (isset($service->cv_subtitle_3) && $service->cv_subtitle_3 != null)
                            <article>
                                <div class="content">
                                    <h3>{{$service->cv_subtitle_3}}</h3>
                                    @if (isset($service->cv_note_3) && $service->cv_note_3 != null)
                                        <p>{{ $service->cv_note_3 }}</p>
                                    @endif
                                </div>
                            </article>
                        @endif
                        @if (isset($service->cv_subtitle_4) && $service->cv_subtitle_4 != null)
                            <article>
                                <div class="content">
                                    <h3>{{$service->cv_subtitle_4}}</h3>
                                    @if (isset($service->cv_note_4) && $service->cv_note_4 != null)
                                        <p>{{ $service->cv_note_4 }}</p>
                                    @endif
                                </div>
                            </article>
                        @endif
                        @if (isset($service->cv_subtitle_5) && $service->cv_subtitle_5 != null)
                            <article>
                                <div class="content">
                                    <h3>{{$service->cv_subtitle_5}}</h3>
                                    @if (isset($service->cv_note_5) && $service->cv_note_5 != null)
                                        <p>{{ $service->cv_note_5 }}</p>
                                    @endif
                                </div>
                            </article>
                        @endif

                    </div>
                </div>
            </div>
        </section>

    @else
        <!-- <section class="how-vendor-mage-sec time-matter-common ">
                <div class="container-md">
                    <div class="row">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 left-side">
                            <h2 class="mrbt-20">How Our Vendor Management <br>Solution Advisory Works</h2>
                            <img src="{{ asset('front-assets/src/images/how-vendor-mage-mg.webp ') }}" alt=""
                                class="mobile-img img-fluid" width="810" height="810" loading="lazy">
                            <p>TimeMatters begins by assessing your current vendor landscape, processes, and program structure.
                                We identify gaps, define requirements, and establish governance standards across roles,
                                workflows, compliance, and performance expectations.</p>
                            <p>If a Vendor Management Software is required, we guide you through platform selection,
                                configuration, integration, and supplier onboarding. For organizations using SOW arrangements,
                                we evaluate existing practices and help implement milestone tracking, approval workflows, and
                                deliverable validation.</p>
                            <p>Following implementation, we provide ongoing performance monitoring and program refinement to
                                keep your vendor ecosystem aligned and effective.</p>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
                            <img src="{{ asset('front-assets/src/images/how-vendor-mage-mg.webp ') }}" alt=""
                                class="desktop-img img-fluid" width="810" height="810" loading="lazy">

                        </div>

                    </div>
                </div>
            </section> -->
        <section class="how-vendor-mage-sec time-matter-common service-{{ $service->id }}">
            <div class="container-md">
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 left-side">
                        @if (isset($service->section3_title))
                            <h2 class="mrbt-20">{{ $service->section3_title }}</h2>
                        @endif

                        <img src="{{ asset('front-assets/src/images/how-vendor-mage-mg.webp ') }}" alt=""
                            class="mobile-img img-fluid" width="810" height="810" loading="lazy">
                        @if (isset($service->section3_description))
                            {!! $service->section3_description !!}
                        @endif
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
                        @if (!empty($service->section3_image))
                            @php
                                $img2 = App\Models\MediaImage::select('name', 'alt_text')
                                    ->where('id', $service->section3_image)
                                    ->first();
                            @endphp

                            @if (!empty($img2->name))
                                <img src="{{ asset('uploads/' . $img2->name) }}" alt="{{ $img2->alt_text }}" width="810" height="810"
                                    class="desktop-img img-fluid" loading="lazy">
                            @else
                                <img src="{{ asset('front-assets/src/images/how-vendor-mage-mg.webp ') }}" alt="" width="810"
                                    height="810" class="desktop-img img-fluid" loading="lazy">
                            @endif
                        @else
                            <img src="{{ asset('front-assets/src/images/why-choose-us-img.webp ') }}" alt="" width="810"
                                height="810" class="img-fluid desktop-img">
                        @endif
                        <!-- <img src="{{ asset('front-assets/src/images/how-vendor-mage-mg.webp ') }}" alt=""
                                                                                                                                                                                                                            class="desktop-img img-fluid" width="810" height="810" loading="lazy"> -->

                    </div>

                </div>
            </div>
        </section>
    @endif



    @if (isset($service->section4_title) && $service->section4_title != null)
    <section class="benefits-vendor-sec  time-matter-common time-matter-common-padding benefits-service-cmn-sec service-{{ $service->id }}">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 top-heading text-center">
                    @if (isset($service->section4_title))
                        <h2>{{ $service->section4_title }}</h2>
                    @endif

                </div>
            </div>

            <div class="row second-row">

                <div class="col-xxl-10 col-xl-10 col-lg-11 col-md-12 col-sm-12 col-12 two-side-line-sec">
                    @if (isset($service->section4_subtitle1) && !empty($service->section4_subtitle1))
                        <article>
                            <h3>{{ $service->section4_subtitle1 }}</h3>
                            @if (isset($service->section4_note1))
                                <p>{{ $service->section4_note1 }}</p>
                            @endif
                        </article>
                    @endif
                    @if (isset($service->section4_subtitle2) && !empty($service->section4_subtitle2))
                        <article>
                            <h3>{{ $service->section4_subtitle2 }}</h3>
                            @if (isset($service->section4_note2))
                                <p>{{ $service->section4_note2 }}</p>
                            @endif
                        </article>
                    @endif
                    @if (isset($service->section4_subtitle3) && !empty($service->section4_subtitle3))
                        <article>
                            <h3>{{ $service->section4_subtitle3 }}</h3>
                            @if (isset($service->section4_note3))
                                <p>{{ $service->section4_note3 }}</p>
                            @endif
                        </article>
                    @endif
                    @if (isset($service->section4_subtitle4) && !empty($service->section4_subtitle4))
                        <article>
                            <h3>{{ $service->section4_subtitle4 }}</h3>
                            @if (isset($service->section4_note4))
                                <p>{{ $service->section4_note4 }}</p>
                            @endif
                        </article>
                    @endif
                    @if (isset($service->section4_subtitle5) && !empty($service->section4_subtitle5))
                        <article>
                            <h3>{{ $service->section4_subtitle5 }}</h3>
                            @if (isset($service->section4_note5))
                                <p>{{ $service->section4_note5 }}</p>
                            @endif
                        </article>
                    @endif
                    @if (isset($service->section4_subtitle6) && !empty($service->section4_subtitle6))
                        <article>
                            <h3>{{ $service->section4_subtitle6 }}</h3>
                            @if (isset($service->section4_note6))
                                <p>{{ $service->section4_note6 }}</p>
                            @endif
                        </article>
                    @endif


                </div>



            </div>

        </div>
    </section>
    @endif

    <section class="blue-oragnization-work-box  time-matter-common time-matter-common-padding service-{{ $service->id }}">
        <div class="container-md">
            <div class="row justify-content-center">
                <div class="col-xxl-10 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 blue-box text-center">
                    @if (isset($service->section5_title))
                        <h2 class="mrbt-20">{{ $service->section5_title }}</h2>
                    @endif
                    @if (isset($service->section5_description))
                        {!! $service->section5_description !!}
                    @endif

                    <a href="{{ isset($service->section5_url) ? $service->section5_url : '#' }}"
                        class="cmn-btn banner-btn light-wht-btn">
                        <spam class="text">
                            {{isset($service->section5_button) ? $service->section5_button : 'Connect with Us'}}
                        </spam>
                        <span class="btn-circle">
                            <img decoding="async" src="{{ asset('front-assets/src/images/common-btn-white-arrow.webp ') }}">
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @if($service->slug != 'vendor-management-solution')
        <div class="container-md border-seprater"></div>
        <!-- <section class="after-bluebox-cta-sec  time-matter-common time-matter-common-padding ">
                                    <div class="container-md">
                                        <div class="row justify-content-center">
                                            <div class="col-xxl-10 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 blue-box text-center">
                                                <h2> Talk to an Expert</h2>
                                                <p> If your goals include better visibility, meaningful savings, stronger compliance, and more
                                                    control over your contingent workforce, TimeMatters is here to support you.</p>
                                                <p> Let’s discuss how we can strengthen your contingent workforce program.</p>
                                                <a href="" class="cmn-btn mx-auto">
                                                    Schedule a Consultation
                                                    <span class="btn-circle">
                                                        <img decoding="async" src="{{ asset('front-assets/src/images/common-btn-white-arrow.webp') }}">
                                                    </span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </section> -->

        <section class="after-bluebox-cta-sec  time-matter-common time-matter-common-padding ">
            <div class="container-md">
                <div class="row justify-content-center">
                    <div class="col-xxl-10 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 blue-box text-center">
                        @if (isset($service->expert_title) && $service->expert_title != null)
                            <h2 class="mrbt-20">{{ $service->expert_title }}</h2>
                        @endif
                        @if (isset($service->expert_description))
                            {!! $service->expert_description !!}
                        @endif
                        @if (isset($service->expert_button_name))
                            <a href="{{ !empty($service->expert_url) ? $service->expert_url : '#' }}" class="cmn-btn mx-auto">
                                {{ !empty($service->expert_button_name) ? $service->expert_button_name : 'Schedule a Consultation' }}
                                <span class="btn-circle">
                                    <img decoding="async" src="{{ asset('front-assets/src/images/common-btn-white-arrow.webp') }}">
                                </span>
                            </a>
                        @endif

                    </div>

                </div>
            </div>
        </section>
    @endif



    @include('frontend.includes.why-choose-us')

    @include('frontend.includes.testimonials')

    @include('frontend.includes.cta-sec')








@endsection
@section('script')


@endsection