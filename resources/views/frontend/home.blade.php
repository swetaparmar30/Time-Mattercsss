@extends('frontend.layouts.index')

@section('title') {{ isset($meta_title) ? $meta_title : '' }} @endsection
@section('description') {{ isset($meta_description) ? $meta_description : '' }} @endsection
@section('keywords') {{ isset($meta_keywords) ? $meta_keywords : '' }} @endsection

@section('content')


    <section class="banner-sec cmn-banner-sec home-page-banner">
        <video class="w-100 banner-img" autoplay="" muted="" loop="" playsinline="" preload="metadata" width="auto"
            height="auto">
            <source src="{{ asset('front-assets/src/images/Timematters-banner-video.mp4') }}" type="video/mp4">Your
            browser does not support the video tag.
        </video>
        <div class="banner-content col-12">
            <div class="container-md">
                <div class="row">
                    <div class="banner-text">
                        <h1 class="desktop-heading">Because Your Time is Valuable</h1>
                        <h1 class="mobile-heading">Because Your Time is Valuable</h1>
                        <p>Independent and impartial Vendor Management Solutions for optimized<br> staffing supplier
                            programs.</p>
                        <a href="{{ route('contact') }}/" class="cmn-btn banner-btn white-arrow-btn">
                            <span class="text"> Connect with Us</span>
                            <span class="btn-circle">
                                <img decoding="async" src="{{ asset('front-assets/src/images/common-btn-white-arrow.webp ') }}">
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>




    @if(isset($system_setting->checked) && $system_setting->checked == 1)
        <section class="service-drop-down-sec time-matter-common time-matter-common-padding">
            <div class="container-md">
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-side">
                        @if(isset($system_setting->system_setting_title) && $system_setting->system_setting_title != '')
                            <h2>{{ $system_setting->system_setting_title }}</h2>
                        @endif
                    </div>
                   
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
                        <div class="accordion all-services-accordion service-drop-down-accordion" id="homeServiceAccordion">

                            {{-- 1 --}}
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="ServiceheadingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#ServicecollapseOne" aria-expanded="false"
                                        aria-controls="ServicecollapseOne">
                                        <span>{{ $system_setting->title1 ?? '' }}</span>
                                    </button>
                                </h3>
                                <div id="ServicecollapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="ServiceheadingOne" data-bs-parent="#homeServiceAccordion">
                                    <div class="accordion-body">
                                        <p>{{ $system_setting->note1 ?? '' }}</p>
                                        <a href="{{ $system_setting->btn_url1 ?? '#' }}"
                                            class="cmn-btn banner-btn white-arrow-btn">
                                            <span class="text">{{ $system_setting->btn_name1 ?? '' }}</span>
                                            <span class="btn-circle">
                                                <img decoding="async"
                                                    src="{{ asset('front-assets/src/images/common-btn-white-arrow.webp') }}">
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            {{-- 2 --}}
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="ServiceheadingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#ServicecollapseTwo" aria-expanded="false"
                                        aria-controls="ServicecollapseTwo">
                                        <span>{{ $system_setting->title2 ?? '' }}</span>
                                    </button>
                                </h3>
                                <div id="ServicecollapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="ServiceheadingTwo" data-bs-parent="#homeServiceAccordion">
                                    <div class="accordion-body">
                                        <p>{{ $system_setting->note2 ?? '' }}</p>
                                        <a href="{{ $system_setting->btn_url2 ?? '#' }}"
                                            class="cmn-btn banner-btn white-arrow-btn">
                                            <span class="text">{{ $system_setting->btn_name2 ?? '' }}</span>
                                            <span class="btn-circle">
                                                <img decoding="async"
                                                    src="{{ asset('front-assets/src/images/common-btn-white-arrow.webp') }}">
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            {{-- 3 --}}
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="ServiceheadingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#ServicecollapseThree" aria-expanded="false"
                                        aria-controls="ServicecollapseThree">
                                        <span>{{ $system_setting->title3 ?? '' }}</span>
                                    </button>
                                </h3>
                                <div id="ServicecollapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="ServiceheadingThree" data-bs-parent="#homeServiceAccordion">
                                    <div class="accordion-body">
                                        <p>{{ $system_setting->note3 ?? '' }}</p>
                                        <a href="{{ $system_setting->btn_url3 ?? '#' }}"
                                            class="cmn-btn banner-btn white-arrow-btn">
                                            <span class="text">{{ $system_setting->btn_name3 ?? '' }}</span>
                                            <span class="btn-circle">
                                                <img decoding="async"
                                                    src="{{ asset('front-assets/src/images/common-btn-white-arrow.webp') }}">
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            {{-- 4 --}}
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="Serviceheadingfour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#Servicecollapsefour" aria-expanded="false"
                                        aria-controls="Servicecollapsefour">
                                        <span>{{ $system_setting->title4 ?? '' }}</span>
                                    </button>
                                </h3>
                                <div id="Servicecollapsefour" class="accordion-collapse collapse"
                                    aria-labelledby="Serviceheadingfour" data-bs-parent="#homeServiceAccordion">
                                    <div class="accordion-body">
                                        <p>{{ $system_setting->note4 ?? '' }}</p>
                                        <a href="{{ $system_setting->btn_url4 ?? '#' }}"
                                            class="cmn-btn banner-btn white-arrow-btn">
                                            <span class="text">{{ $system_setting->btn_name4 ?? '' }}</span>
                                            <span class="btn-circle">
                                                <img decoding="async"
                                                    src="{{ asset('front-assets/src/images/common-btn-white-arrow.webp') }}">
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if(isset($value_highlight->checked) && $value_highlight->checked == 1)
        <div class="container-md border-seprater"></div>

        <section class="value-highlight-sec time-matter-common time-matter-common-padding">
            <div class="container-md">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 top-heading text-center">
                        <h2>{{ $value_highlight->section_title ?? '' }}</h2>
                    </div>
                </div>

                <div class="row second-row">
                    <div class="col-xxl-10 col-xl-10 col-lg-11 col-md-12 col-sm-12 col-12 two-side-line-sec left-side">
                        @if(!empty($value_highlight->items))
                            @foreach($value_highlight->items as $item)
                                <article>
                                    <h3>{{ $item->title ?? '' }}</h3>
                                    <p>{{ $item->content ?? '' }}</p>
                                </article>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if(isset($why_choose->checked) && $why_choose->checked == 1)
        @include('frontend.includes.why-choose-us')
    @endif


    @if(isset($testimonial->checked) && $testimonial->checked == 1)
        @include('frontend.includes.testimonials')
    @endif

    @if(isset($form->checked) && $form->checked == 1)
        @include('frontend.includes.cta-sec')
    @endif

@endsection
@section('script')


@endsection