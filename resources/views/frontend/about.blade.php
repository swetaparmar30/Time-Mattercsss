@extends('frontend.layouts.index')

@section('title') {{ isset($meta_title) ? $meta_title : '' }} @endsection
@section('description') {{ isset($meta_description) ? $meta_description : '' }} @endsection
@section('keywords') {{ isset($meta_keywords) ? $meta_keywords : '' }} @endsection

@section('content')






    <!-- Banner Section -->
    <section class="inner-service-banner cmn-banner-sec about-us-banner">
        <!-- <img src="{{ asset('front-assets/src/images/about-us-banner.webp') }}" alt="About Us Banner" class="img-fluid w-100 banner-img" width="1920" height="600"> -->
        @if (!empty($about->bannerimage))
            @php
                $bnr_img = App\Models\MediaImage::select('name', 'alt_text')
                    ->where('id', $about->bannerimage)
                    ->first();
            @endphp
            @if (!empty($bnr_img->name))
                <img src="{{ asset('uploads/' . $bnr_img->name) }}" alt="{{ $bnr_img->alt_text ?? 'About Us Banner' }}"
                    class="img-fluid w-100 banner-img" width="1920" height="600">
            @else
                <img src="{{ asset('front-assets/src/images/who-we-are-img.webp') }}" alt="About Us Banner"
                    class="img-fluid w-100 banner-img" width="1920" height="600">
            @endif
        @else
            <img src="{{ asset('front-assets/src/images/who-we-are-img.webp') }}" alt="About Us Banner"
                class="img-fluid w-100 banner-img" width="1920" height="600">
        @endif
        <div class="banner-content col-12">
            <div class="container-md">
                <div class="row">
                    <div class="banner-text">
                        @if(isset($about->title) && $about->title != '')
                            <h1 class="desktop-heading">{{ $about->title }}</h1>
                            <h1 class="mobile-heading">{{ $about->title }}</h1>
                        @else
                            <h1 class="desktop-heading">About Us</h1>
                            <h1 class="mobile-heading">About Us</h1>
                        @endif

                        @if(isset($about->description) && $about->description != '')
                            {!! $about->description !!}
                        @else
                            <p>We deliver impartial and objective solutions that empower our<br> clients to thrive.</p>
                        @endif


                        <a href="{{ $about->missionbuttonurl ? $about->missionbuttonurl : rtrim(route('contact'), '/') . '/' }}" class="cmn-btn banner-btn white-arrow-btn">

                            {{ $about->missionbutton ?? 'Connect with Us' }}
                            <span class="btn-circle">
                                <img decoding="async" src="{{ asset('front-assets/src/images/common-btn-white-arrow.webp') }}" alt="Arrow">
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Who We Are Section -->
    <section class="who-we-are-sec time-matter-common time-matter-common-padding">
        <div class="container-md">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 content-side left-side">
                    @if(isset($about->missiontitle) && $about->missiontitle != '')
                        <h2 class="mrbt-20">{{ $about->missiontitle }}</h2>
                    @else
                        <h2 class="mrbt-20">Who We Are</h2>
                    @endif

                    @if (!empty($about->teambackground))
                        @php
                            $who_img = App\Models\MediaImage::select('name', 'alt_text')
                                ->where('id', $about->teambackground)
                                ->first();
                        @endphp
                        @if (!empty($who_img->name))
                            <img src="{{ asset('uploads/' . $who_img->name) }}" alt="{{ $who_img->alt_text ?? 'Who We Are' }}"
                                class="img-fluid mobile-img">
                        @else
                            <img src="{{ asset('front-assets/src/images/who-we-are-img.webp') }}" alt="Who We Are"
                                class="img-fluid mobile-img">
                        @endif
                    @else
                        <img src="{{ asset('front-assets/src/images/who-we-are-img.webp') }}" alt="Who We Are"
                            class="img-fluid mobile-img">
                    @endif

                    
                    @if(isset($about->missiondescription) && $about->missiondescription != '')
                        {!! $about->missiondescription !!}
                    @endif
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 image-side right-side">
                    @if (!empty($about->teambackground))
                        @php
                            $who_img = App\Models\MediaImage::select('name', 'alt_text')
                                ->where('id', $about->teambackground)
                                ->first();
                        @endphp
                        @if (!empty($who_img->name))
                            <img src="{{ asset('uploads/' . $who_img->name) }}" alt="{{ $who_img->alt_text ?? 'Who We Are' }}"
                                class="img-fluid desktop-img" width="1920" height="767">
                        @else
                            <img src="{{ asset('front-assets/src/images/who-we-are-img.webp') }}" alt="Who We Are"
                                class="img-fluid desktop-img" width="1920" height="767">
                        @endif
                    @else
                        <img src="{{ asset('front-assets/src/images/who-we-are-img.webp') }}" alt="Who We Are"
                            class="img-fluid desktop-img" width="1920" height="767">
                    @endif
                   
                </div>
            </div>
        </div>
    </section>


    <!-- How We Deliver Section -->

    <section class="how-we-deliver-sec value-highlight-sec time-matter-common time-matter-common-padding">
        <div class="container-md">
            <div class="row first-row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 top-heading text-center">
                    @if(isset($about->how_we_deliver_title) && $about->how_we_deliver_title != '')
                        <h2 class="mrbt-20">{{ $about->how_we_deliver_title }}</h2>
                    @else
                        <h2 class="mrbt-20">How We Deliver</h2>
                    @endif
                    @if (isset($about->how_we_deliver_desc) && $about->how_we_deliver_desc != '')
                        {!! $about->how_we_deliver_desc !!}
                    @else
                        <P> We combine industry expertise, disciplined processes, and data-driven insights to deliver value to every client engagement.</P>
                    @endif
                </div>
            </div>

            <div class="row second-row">
                <div class="col-xxl-10 col-xl-10 col-lg-11 col-md-12 col-sm-12 col-12 two-side-line-sec left-side">
                    @if (isset($about->hwd_subtitle_1) && $about->hwd_subtitle_1 != NULL)
                        <article>
                            <h3>{{ $about->hwd_subtitle_1 }}</h3>
                            @if (isset($about->hwd_note_1) && $about->hwd_note_1 != null)
                                <P>{!! $about->hwd_note_1 !!}</P>
                            @endif
                        </article>
                    @endif

                    @if (isset($about->hwd_subtitle_2) && $about->hwd_subtitle_2 != NULL)
                        <article>
                            <h3>{{ $about->hwd_subtitle_2 }}</h3>
                            @if (isset($about->hwd_note_2) && $about->hwd_note_2 != null)
                                <P>{!! $about->hwd_note_2 !!}</P>
                            @endif
                        </article>
                    @endif

                    @if (isset($about->hwd_subtitle_3) && $about->hwd_subtitle_3 != NULL)
                        <article>
                            <h3>{{ $about->hwd_subtitle_3 }}</h3>
                            @if (isset($about->hwd_note_3) && $about->hwd_note_3 != null)
                                <P>{!! $about->hwd_note_3 !!}</P>
                            @endif
                        </article>
                    @endif

                    @if (isset($about->hwd_subtitle_4) && $about->hwd_subtitle_4 != NULL)
                        <article>
                            <h3>{{ $about->hwd_subtitle_4 }}</h3>
                            @if (isset($about->hwd_note_4) && $about->hwd_note_4 != null)
                                <P>{!! $about->hwd_note_4 !!}</P>
                            @endif
                        </article>
                    @endif

                </div>
            </div>
        </div>
    </section>


    <!-- Culture & Values Section -->
    <section class="culture-values-sec why-choose-sec time-matter-common time-matter-common-padding">
        <div class="container-md">
            <div class="row first-row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 top-heading text-center ">
                    @if(isset($about->historysubtitle) && $about->historysubtitle != '')
                        <h2 class="mrbt-20">{{ $about->historysubtitle }}</h2>
                    @else
                        <h2 class="mrbt-20">Culture & Values</h2>
                    @endif

                    @if (isset($about->historydescription) && $about->historydescription != null)
                        {!! $about->historydescription !!}
                    @else
                        <p class="section-subtext">At the heart of TimeMatters is a commitment to 
                            <b style="font-weight:500;color:#333">Integrity, Independence,and the Success of our clients.</b>
                        </p>
                    @endif
                </div>
            </div>
            <div class="row align-items-center second-row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 image-side">
                    @if (!empty($about->historyimage))
                        @php
                            $c_and_v_img = App\Models\MediaImage::select('name', 'alt_text')
                                ->where('id', $about->historyimage)
                                ->first();
                        @endphp
                        @if (!empty($c_and_v_img->name))
                            <img src="{{ asset('uploads/' . $c_and_v_img->name) }}"
                                alt="{{ $c_and_v_img->alt_text ?? 'Culture and Values' }}" class="img-fluid desktop-img">
                        @else
                            <img src="{{ asset('front-assets/src/images/culture-values-img.webp') }}" alt="Culture and Values"
                                class="img-fluid desktop-img">
                        @endif
                    @else
                        <img src="{{ asset('front-assets/src/images/culture-values-img.webp') }}" alt="Culture and Values"
                            class="img-fluid desktop-img">
                    @endif

                    @if(isset($about->cv_img_note) && $about->cv_img_note != null)
                        <div class="quote-box">
                            <p>{{ $about->cv_img_note }}</p>
                        </div>
                    @endif
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 right-side">
                    
                    @if (!empty($about->historyimage))
                        @php
                            $c_and_v_img = App\Models\MediaImage::select('name', 'alt_text')
                                ->where('id', $about->historyimage)
                                ->first();
                        @endphp
                        @if (!empty($c_and_v_img->name))
                            <img src="{{ asset('uploads/' . $c_and_v_img->name) }}"
                                alt="{{ $c_and_v_img->alt_text ?? 'Culture and Values' }}" class="img-fluid mobile-img">
                        @else
                            <img src="{{ asset('front-assets/src/images/culture-values-img.webp') }}" alt="Culture and Values" class="img-fluid mobile-img">
                        @endif
                    @else
                        <img src="{{ asset('front-assets/src/images/culture-values-img.webp') }}" alt="Culture and Values" class="img-fluid mobile-img">
                    @endif


                    @if (isset($about->cv_subtitle_1) && $about->cv_subtitle_1 != null)
                        <article>
                            <div class="content">
                                <h3>{{ $about->cv_subtitle_1 }}</h3>
                                @if (isset($about->cv_note_1) && $about->cv_note_1 != null)
                                    <p>{{ $about->cv_note_1 }}</p>
                                @endif
                            </div>
                        </article>
                    @endif

                    @if (isset($about->cv_subtitle_2) && $about->cv_subtitle_2 != null)
                        <article>
                            <div class="content">
                                <h3>{{ $about->cv_subtitle_2 }}</h3>
                                @if (isset($about->cv_note_2) && $about->cv_note_2 != null)
                                    <p>{{ $about->cv_note_2 }}</p>
                                @endif
                            </div>
                        </article>
                    @endif

                    @if (isset($about->cv_subtitle_3) && $about->cv_subtitle_3 != null)
                        <article>
                            <div class="content">
                                <h3>{{ $about->cv_subtitle_3 }}</h3>
                                @if (isset($about->cv_note_3) && $about->cv_note_3 != null)
                                    <p>{{ $about->cv_note_3 }}</p>
                                @endif
                            </div>
                        </article>
                    @endif

                    @if (isset($about->cv_subtitle_4) && $about->cv_subtitle_4 != null)
                        <article>
                            <div class="content">
                                <h3>{{ $about->cv_subtitle_4 }}</h3>
                                @if (isset($about->cv_note_4) && $about->cv_note_4 != null)
                                    <p>{{ $about->cv_note_4 }}</p>
                                @endif
                            </div>
                        </article>
                    @endif

                    @if (isset($about->cv_subtitle_5) && $about->cv_subtitle_5 != null)
                        <article>
                            <div class="content">
                                <h3>{{ $about->cv_subtitle_5 }}</h3>
                                @if (isset($about->cv_note_5) && $about->cv_note_5 != null)
                                    <p>{{ $about->cv_note_5 }}</p>
                                @endif
                            </div>
                        </article>
                    @endif

                    @if(isset($about->cv_img_note) && $about->cv_img_note != null)
                        <div class="quote-box">
                            <p>{{ $about->cv_img_note }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Executive Leadership Section -->
    <!-- <section class="leadership-sec time-matter-common time-matter-common-padding">
        <div class="container-md">
            <div class="row">
                <div class="col-12 text-center">
                    @if (isset($about->el_title) && $about->el_title != null)
                        <h2>{{ $about->el_title }}</h2>
                    @else
                        <h2>Executive Leadership</h2>
                    @endif
                </div>
            </div>
            <div class="row leadership-grid">

                <div class="leader-card">
                    <div class="leader-info">
                        @if (!empty($mission_values->mv_icon_1) && $mission_values->mv_icon_1 != null)
                            @php
                                $m1_img = App\Models\MediaImage::select('name', 'alt_text')
                                    ->where('id', $mission_values->mv_icon_1)
                                    ->first();
                            @endphp
                            @if (!empty($m1_img->name))
                                <img src="{{ asset('uploads/' . $m1_img->name) }}" alt="{{ $m1_img->alt_text ?? 'Profile Image' }}"
                                    class="leader-thumb">
                            @else
                                <img src="{{ asset('front-assets/src/images/profile-img.webp') }}" alt="Profile Image"
                                    class="leader-thumb">
                            @endif
                        @else
                            <img src="{{ asset('front-assets/src/images/profile-img.webp') }}" alt="Profile Image"
                                class="leader-thumb">
                        @endif


                        @if (isset($mission_values->mv_title_1) && $mission_values->mv_title_1 != null)
                            <div class="leader-meta">
                                <h3>{{ $mission_values->mv_title_1 }}</h3>
                                @if (isset($mission_values->mv_post_1) && $mission_values->mv_post_1 != null)
                                    <p>{{ $mission_values->mv_post_1 }}</p>
                                @endif
                            </div>
                        @else
                            <div class="leader-meta">
                                <h3>Brian Keyes</h3>
                                <p>Managing Partner & CEO</p>
                            </div>
                        @endif
                    </div>
                    @if (isset($mission_values->mv_description_1) && $mission_values->mv_description_1 != null)
                        {!! $mission_values->mv_description_1 !!}
                    @else
                        <p>Brian leads TimeMatters Inc. with a focus on impartiality, efficiency, and measurable results. With deep experience in vendor governance, he ensures that organizations gain control over their staffing supplier programs while reducing complexity and costs.</p>
                    @endif
                </div>
                <div class="leader-card">
                    <div class="leader-info">
                        @if (!empty($mission_values->mv_icon_2) && $mission_values->mv_icon_2 != null)
                            @php
                                $m2_img = App\Models\MediaImage::select('name', 'alt_text')
                                    ->where('id', $mission_values->mv_icon_2)
                                    ->first();
                            @endphp
                            @if (!empty($m2_img->name))
                                <img src="{{ asset('uploads/' . $m2_img->name) }}" alt="{{ $m2_img->alt_text ?? 'Profile Image' }}"
                                    class="leader-thumb">
                            @else
                                <img src="{{ asset('front-assets/src/images/profile-img.webp') }}" alt="Profile Image"
                                    class="leader-thumb">
                            @endif
                        @else
                            <img src="{{ asset('front-assets/src/images/profile-img.webp') }}" alt="Profile Image"
                                class="leader-thumb">
                        @endif

                        @if (isset($mission_values->mv_title_2) && $mission_values->mv_title_2 != null)
                            <div class="leader-meta">
                                <h3>{{ $mission_values->mv_title_2 }}</h3>
                                @if (isset($mission_values->mv_post_2) && $mission_values->mv_post_2 != null)
                                    <p>{{ $mission_values->mv_post_2 }}</p>
                                @endif
                            </div>
                        @else
                            <div class="leader-meta">
                                <h3>Joanne Irons</h3>
                                <p>Chief Financial Officer (CFO)</p>
                            </div>
                        @endif
                    </div>
                    @if (isset($mission_values->mv_description_2) && $mission_values->mv_description_2 != null)
                        {!! $mission_values->mv_description_2 !!}
                    @else
                        <p>Joanne brings financial rigor and strategic insight to TimeMatters Inc. She oversees compliance, cost optimization, and fiscal transparency, ensuring our clients achieve maximum return on investment from vendor partnerships.</p>
                    @endif
                </div>



            </div>
        </div>
    </section> -->

    <!-- Our Specialists Section -->
    <section class="our-specialists-sec time-matter-common time-matter-common-padding">
        <div class="container-md">
            <div class="row first-row">
                <div class="col-12 text-center">
                    @if (isset($about->our_history_title) && $about->our_history_title != null)
                        <h2 class="mrbt-20">{{ $about->our_history_title }}</h2>
                    @else
                        <h2 class="mrbt-20">Our Specialists</h2>
                    @endif
                    @if (isset($about->our_history_desc) && $about->our_history_desc != null)
                        {!! $about->our_history_desc!!}
                    @else
                        <p> Behind every client success is a dedicated team of professionals who ensure smooth delivery and support:</p>
                    @endif
                </div>
            </div>
            <div class="row specialists-grid text-center">
                @if (isset($about->os_subtitle_1) && $about->os_subtitle_1 != null)
                    <div class="specialist-item">
                        <h4>{{ $about->os_subtitle_1  }}</h4>
                        @if(isset($about->os_note_1) && $about->os_note_1 != null)
                            <p>{{ $about->os_note_1 }}</p>
                        @endif
                    </div>
                @endif
                @if (isset($about->os_subtitle_2) && $about->os_subtitle_2 != null)
                    <div class="specialist-item">
                        <h4>{{ $about->os_subtitle_2  }}</h4>
                        @if(isset($about->os_note_2) && $about->os_note_2 != null)
                            <p>{{ $about->os_note_2 }}</p>
                        @endif
                    </div>
                @endif

                @if (isset($about->os_subtitle_3) && $about->os_subtitle_3 != null)
                    <div class="specialist-item">
                        <h4>{{ $about->os_subtitle_3  }}</h4>
                        @if(isset($about->os_note_3) && $about->os_note_3 != null)
                            <p>{{ $about->os_note_3 }}</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>


    <section class="why-timematters-cta blue-oragnization-work-box  time-matter-common time-matter-common-padding ">
        <div class="container-md">
            <div class="row justify-content-center">
                <div class="col-xxl-10 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 blue-box text-center">
                    @if (isset($about->why_title) && $about->why_title != null)
                        <h2 class="mrbt-20">{{ $about->why_title }}</h2>
                    @else
                        <h2 class="mrbt-20">Why TimeMatters</h2>
                    @endif

                    @if (isset($about->why_desc) && $about->why_desc != null)
                        {!! $about->why_desc !!}
                    @else
                        <p> At TimeMatters Inc., we are more than consultants — we are your partner in vendor governance. Our impartial, independent approach ensures you gain clarity, control, and confidence over your staffing supplier programs.</p>
                        <p><b>Because your time is valuable - we’re here to listen, guide, and simplify vendor management together</b></p>
                    @endif


                    <a href="{{ $about->why_button_url ? $about->why_button_url : rtrim(route('contact'), '/') . '/' }}" 
                        class="cmn-btn light-wht-btn">
                        Connect with Us
                        <span class="btn-circle">
                            <img decoding="async" src="{{ asset('front-assets/src/images/common-btn-white-arrow.webp') }}">
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>















    @include('frontend.includes.why-choose-us')

    @include('frontend.includes.testimonials')
    @include('frontend.includes.cta-sec')



@endsection
@section('script')

@endsection