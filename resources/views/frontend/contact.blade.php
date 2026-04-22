@extends('frontend.layouts.index')

@section('title') {{ isset($meta_title) ? $meta_title : '' }} @endsection
@section('description') {{ isset($meta_description) ? $meta_description : '' }} @endsection
@section('keywords') {{ isset($meta_keywords) ? $meta_keywords : '' }} @endsection

@section('content')





    <!-- <section class="contact-banner-sec inner-service-banner ">
                                                                        <img src="{{ asset('front-assets/src/images/contact-us-banner.webp') }}" alt="" class="img-fluid w-100  banner-img"
                                                                            width="1920" height="767">
                                                                        <div class="banner-content col-12">
                                                                            <div class="container-md">
                                                                                <div class="row">
                                                                                    <div class="banner-text">
                                                                                        <h1>Let’s Talk Vendor Management Solutions</h1>

                                                                                        <p> We’re here to help you simplify your staffing supplier relationships, reduce costs, and<br>
                                                                                            ensure compliance. Connect with our team today and discover how TimeMatters Inc. can
                                                                                            <br>bring
                                                                                            clarity and control to your vendor ecosystem.
                                                                                        </p>
                                                                                        <p>"Because your time is valuable — we’re here to listen, guide, and simplify vendor<br>
                                                                                            management
                                                                                            together."</p>



                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section> -->

    <section class="contact-banner-sec inner-service-banner ">
        @if (!empty($setting->banner_image))
            @php
                $bnr_img = App\Models\MediaImage::select('name', 'alt_text')
                    ->where('id', $setting->banner_image)
                    ->first();
            @endphp

            @if (!empty($bnr_img->name))
                <img src="{{ asset('uploads/' . $bnr_img->name) }}" alt="{{ $bnr_img->alt_text }}"
                    class="img-fluid w-100  banner-img 1" width="1920" height="767">
            @else
                <img src="{{ asset('front-assets/src/images/contact-us-banner.webp') }}" alt=""
                    class="img-fluid w-100  banner-img 2" width="1920" height="767">
            @endif
        @else
            <img src="{{ asset('front-assets/src/images/contact-us-banner.webp') }}" alt=""
                class="img-fluid w-100  banner-img 3" width="1920" height="767">
        @endif

        <div class="banner-content col-12">
            <div class="container-md">
                <div class="row">
                    <div class="banner-text">
                        @if (isset($setting->banner_title))
                            <h1 class="desktop-heading">{{ $setting->banner_title }}</h1>
                            <h1 class="mobile-heading">{{ $setting->banner_title }}</h1>
                        @endif
                        @if (isset($setting->banner_description))
                            {!! $setting->banner_description !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="contact-page-form-sec time-matter-common time-matter-common-padding">
                        <div class="container-md">
                            <div class="row">
                                <div class="col-xxl-4 col-xl-4 co-lg-5 col-md-12 col-sm-12 col-12 left-side">
                                    <div class="main-info-box">
                                        <h2>Ways to Connect</h2>

                                        <article>
                                            <div class="icon"><img src="{{ asset('front-assets/src/images/location-info-icon.webp') }}"
                                                    alt="" width="72" height="72" loading="lazy"></div>
                                            <div class="info">
                                                <p>Email Address</p>
                                                <p><a href="mailto:info@timemattersinc.com">info@timemattersinc.com</a></p>
                                            </div>
                                        </article>

                                        <article>
                                            <div class="icon"><img src="{{ asset('front-assets/src/images/call-info-icon.webp') }}" alt=""
                                                    width="72" height="72" loading="lazy"></div>
                                            <div class="info">
                                                <p>Phone Number</p>
                                                <p><a href="tel:14168633993">+1 416-863-3993</a></p>
                                            </div>
                                        </article>

                                        <article>
                                            <div class="icon"><img src="{{ asset('front-assets/src/images/mail-info-icon.webp') }}" alt=""
                                                    width="72" height="72" loading="lazy"></div>
                                            <div class="info">
                                                <p>Address</p>
                                                <p>TimeMatters Inc<br>
                                                    200 Consumers Rd<br>
                                                    North York, ON M2J 4R4<br>
                                                    Canada</p>
                                            </div>
                                        </article>

                                    </div>

                                </div>


                                <div class="col-xxl-8 col-xl-8 co-lg-7 col-md-12 col-sm-12 col-12 right-side">
                                    <div class="contact-page-form">
                                        <h2 class="mrbt-20">Reach Out Today</h2>
                                        <p>Have a question or want to schedule a consultation? Fill out the form below and a member of
                                            our
                                            team will respond promptly.</p>
                                        <form action="" id="contact-form">
                                            <div class="form-row">
                                                <input type="text" placeholder="Name*" required />
                                                <input type="text" placeholder="Company*" />
                                            </div>
                                            <div class="form-row">
                                                <input type="email" placeholder="Email*" required />
                                                <input type="tel" placeholder="Phone (optional)" />
                                            </div>
                                            <textarea name="message" id="message" placeholder="Message" rows="3"></textarea>
                                            <button type="submit">Send</button>
                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </section> -->


    <section class="contact-page-form-sec time-matter-common time-matter-common-padding">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-4 col-xl-4 co-lg-5 col-md-12 col-sm-12 col-12 left-side">
                    <div class="main-info-box">
                        <h2>Ways to Connect</h2>
                        @if (isset($setting->email))
                            <article>
                                <div class="icon"><img src="{{ asset('front-assets/src/images/location-info-icon.webp') }}"
                                        alt="" width="72" height="72" loading="lazy"></div>
                                <div class="info">
                                    <p>Email Address</p>
                                    <p><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></p>
                                </div>
                            </article>
                        @endif

                        @if (isset($setting->contact_no))
                            <article>
                                <div class="icon"><img src="{{ asset('front-assets/src/images/call-info-icon.webp') }}" alt=""
                                        width="72" height="72" loading="lazy"></div>
                                <div class="info">
                                    <p>Phone Number</p>
                                    @php
                                        $phone = preg_replace('/\D/', '', $setting->contact_no);

                                        // Add country code (1 for Canada/US)
                                        $tel = '1' . $phone;
                                    @endphp
                                    
                                    <p><a href="tel:{{ $tel }}">+1 {{ $setting->contact_no }}</a></p>
                                </div>
                            </article>
                        @endif


                        @if (isset($setting->location))
                            <article>
                                <div class="icon"><img src="{{ asset('front-assets/src/images/mail-info-icon.webp') }}" alt=""
                                        width="72" height="72" loading="lazy"></div>
                                <div class="info">
                                    <p>Address</p>
                                    <p>{!! $setting->location !!}</p>
                                </div>
                            </article>
                        @endif


                    </div>

                </div>


                <div class="col-xxl-8 col-xl-8 co-lg-7 col-md-12 col-sm-12 col-12 right-side">
                    <div class="contact-page-form">
                        <h2 class="mrbt-20">Reach Out Today</h2>
                        <p>Have a question or want to schedule a consultation? Fill out the form below and a member of our
                            team will respond promptly.</p>
                        @include('frontend.includes.contact-form')
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="why-reach-out-sec time-matter-common time-matter-common-padding">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-7 col-xl-7 col-lg-6 col-md-6 col-sm-12 col-12 left-side">
                    @if (isset($setting->reach_out_title))
                        <h2>{{ $setting->reach_out_title }}</h2>
                    @endif
                    @if (isset($setting->reach_out_description))
                        {!! $setting->reach_out_description !!}
                    @endif

                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12 right-side">

                    <div class="additional-info">
                        <h3>Additional Info</h3>
                        <article class="hours">
                            <div class="icon">
                                <img src="{{ asset('front-assets/src/images/office-hours-icon.webp') }}" alt="" width="78"
                                    height="78" class="img-fluid">
                            </div>
                            <div class="content">
                                <p>Office Hours:</p>
                                @if (isset($setting->office_hours))
                                    <p>{!! $setting->office_hours !!}</p>
                                @endif
                            </div>
                        </article>
                    </div>

                </div>

            </div>
        </div>
    </section>




    @include('frontend.includes.why-choose-us')

    @include('frontend.includes.testimonials')

    

@endsection
@section('script')

@endsection