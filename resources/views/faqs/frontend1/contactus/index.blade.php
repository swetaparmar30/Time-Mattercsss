    @extends('frontend.layouts.index')
    @if (isset($form->form_sub_title) && $form->form_sub_title != '' && $form->form_sub_title != null)
        @section('title')
            Contact Us
        @endsection
    @endif
    @section('content')

        <section class="contact-page-banner-section sandk-common">

            <div class="banner-content">
                <div class="container-md">
                    <div class="row align-items-center">
                        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-12 col-sm-12  left-side">
                            @if (isset($form->form_sub_title) && $form->form_sub_title != '')
                                <h2>{{ $form->form_sub_title }}</h2>
                            @endif
                            @if (isset($form->form_short_desc) && $form->form_short_desc != '')
                                {!! $form->form_short_desc !!}
                            @endif


                            <div class="contact-info-section desktop-contact-info-section ">

                                <div class="hours-section">
                                    <h2>Hours</h2>
                                    <div class="row">

                                        @if (isset($setting))
                                            @php

                                                $monday = json_decode($setting->monday);
                                                $tuesday = json_decode($setting->tuesday);
                                                $wedsday = json_decode($setting->wedsday);
                                                $thursday = json_decode($setting->thursday);
                                                $friday = json_decode($setting->friday);
                                                $saturday = json_decode($setting->saturday);
                                                $sunday = json_decode($setting->sunday);

                                            @endphp
                                            <div class="col-md-6 day-hours">
                                                <ul>
                                                    <li>
                                                        <span class="hours-day">MON:&nbsp;</span><span class="hours-time">
                                                            @if (isset($monday->status) && $monday->status != 0)
                                                                {{ date('g:i A', strtotime($monday->from)) }} –
                                                                {{ date('g:i A', strtotime($monday->to)) }}
                                                                <!-- &<br>  {{ date('g:i A', strtotime($monday->from2)) }} – {{ date('g:i A', strtotime($monday->to2)) }} -->
                                                            @else
                                                                CLOSED
                                                            @endif
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="hours-day">TUE:&nbsp;</span><span class="hours-time">
                                                            @if (isset($tuesday->status) && $tuesday->status != 0)
                                                                {{ date('g:i A', strtotime($tuesday->from)) }} -
                                                                {{ date('g:i A', strtotime($tuesday->to)) }}
                                                                <!-- &<br>{{ date('g:i A', strtotime($tuesday->from2)) }} - {{ date('g:i A', strtotime($tuesday->to2)) }} -->
                                                            @else
                                                                CLOSED
                                                            @endif
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="hours-day">WED:&nbsp;</span><span class="hours-time">
                                                            @if (isset($wedsday->status) && $wedsday->status != 0)
                                                                {{ date('g:i A', strtotime($wedsday->from)) }} -
                                                                {{ date('g:i A', strtotime($wedsday->to)) }}
                                                                <!-- &<br>  {{ date('g:i A', strtotime($wedsday->from2)) }} - {{ date('g:i A', strtotime($wedsday->to2)) }} -->
                                                            @else
                                                                CLOSED
                                                            @endif
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="hours-day">THU:&nbsp;</span><span class="hours-time">
                                                            @if (isset($thursday->status) && $thursday->status != 0)
                                                                {{ date('g:i A', strtotime($thursday->from)) }} -
                                                                {{ date('g:i A', strtotime($thursday->to)) }}
                                                                <!-- &<br> {{ date('g:i A', strtotime($thursday->from2)) }} - {{ date('g:i A', strtotime($thursday->to2)) }} -->
                                                            @else
                                                                CLOSED
                                                            @endif
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 day-hours">
                                                <ul>
                                                    <li>
                                                        <span class="hours-day">FRI:&nbsp;</span><span class="hours-time">
                                                            @if (isset($friday->status) && $friday->status != 0)
                                                                {{ date('g:i A', strtotime($friday->from)) }} -
                                                                {{ date('g:i A', strtotime($friday->to)) }}
                                                                <!-- &<br> {{ date('g:i A', strtotime($friday->from2)) }} - {{ date('g:i A', strtotime($friday->to2)) }} -->
                                                            @else
                                                                CLOSED
                                                            @endif
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="hours-day">SAT:&nbsp;</span><span class="hours-time">
                                                            @if (isset($saturday->status) && $saturday->status != 0)
                                                                {{ date('g:i A', strtotime($saturday->from)) }} -
                                                                {{ date('g:i A', strtotime($saturday->to)) }}
                                                                <!-- &<br>{{ date('g:i A', strtotime($saturday->from2)) }} - {{ date('g:i A', strtotime($saturday->to2)) }} -->
                                                            @else
                                                                CLOSED
                                                            @endif
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="hours-day">SUN:&nbsp;</span><span class="hours-time">
                                                            @if (isset($sunday->status) && $sunday->status != 0)
                                                                {{ date('g:i A', strtotime($sunday->from)) }} -
                                                                {{ date('g:i A', strtotime($sunday->to)) }}
                                                                <!-- &<br>{{ date('g:i A', strtotime($sunday->from2)) }} - {{ date('g:i A', strtotime($sunday->to2)) }} -->
                                                            @else
                                                                CLOSED
                                                            @endif
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12  right-side">

                            @include('frontend.includes.contactform')

                            <div class="contact-info-section mobile-contact-info-section">
                                <div class="hours-section">
                                    <h2>Hours</h2>
                                    <div class="row">

                                        @if (isset($setting))
                                            @php

                                                $monday = json_decode($setting->monday);
                                                $tuesday = json_decode($setting->tuesday);
                                                $wedsday = json_decode($setting->wedsday);
                                                $thursday = json_decode($setting->thursday);
                                                $friday = json_decode($setting->friday);
                                                $saturday = json_decode($setting->saturday);
                                                $sunday = json_decode($setting->sunday);

                                            @endphp
                                            <div class="col-md-6 day-hours">
                                                <ul>
                                                    <li>
                                                        <span class="hours-day">MON:&nbsp;</span><span class="hours-time">
                                                            @if (isset($monday->status) && $monday->status != 0)
                                                                {{ date('g:i A', strtotime($monday->from)) }} -
                                                                {{ date('g:i A', strtotime($monday->to)) }}
                                                                <!-- &<br>{{ date('g:i A', strtotime($monday->from2)) }} – {{ date('g:i A', strtotime($monday->to2)) }} -->
                                                            @else
                                                                CLOSED
                                                            @endif
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="hours-day">TUE:&nbsp;</span><span class="hours-time">
                                                            @if (isset($tuesday->status) && $tuesday->status != 0)
                                                                {{ date('g:i A', strtotime($tuesday->from)) }} -
                                                                {{ date('g:i A', strtotime($tuesday->to)) }}
                                                                <!-- &<br>{{ date('g:i A', strtotime($tuesday->from2)) }} - {{ date('g:i A', strtotime($tuesday->to2)) }} -->
                                                            @else
                                                                CLOSED
                                                            @endif
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="hours-day">WED:&nbsp;</span><span class="hours-time">
                                                            @if (isset($wedsday->status) && $wedsday->status != 0)
                                                                {{ date('g:i A', strtotime($wedsday->from)) }} -
                                                                {{ date('g:i A', strtotime($wedsday->to)) }}
                                                                <!-- &<br>{{ date('g:i A', strtotime($wedsday->from2)) }} - {{ date('g:i A', strtotime($wedsday->to2)) }} -->
                                                            @else
                                                                CLOSED
                                                            @endif
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="hours-day">THU:&nbsp;</span><span class="hours-time">
                                                            @if (isset($thursday->status) && $thursday->status != 0)
                                                                {{ date('g:i A', strtotime($thursday->from)) }} -
                                                                {{ date('g:i A', strtotime($thursday->to)) }}
                                                                <!-- &<br>{{ date('g:i A', strtotime($thursday->from2)) }} - {{ date('g:i A', strtotime($thursday->to2)) }} -->
                                                            @else
                                                                CLOSED
                                                            @endif
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 day-hours">
                                                <ul>
                                                    <li>
                                                        <span class="hours-day">FRI:&nbsp;</span><span class="hours-time">
                                                            @if (isset($friday->status) && $friday->status != 0)
                                                                {{ date('g:i A', strtotime($friday->from)) }} -
                                                                {{ date('g:i A', strtotime($friday->to)) }}
                                                                <!-- &<br>{{ date('g:i A', strtotime($friday->from2)) }} - {{ date('g:i A', strtotime($friday->to2)) }} -->
                                                            @else
                                                                CLOSED
                                                            @endif
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="hours-day">SAT:&nbsp;</span><span class="hours-time">
                                                            @if (isset($saturday->status) && $saturday->status != 0)
                                                                {{ date('g:i A', strtotime($saturday->from)) }} -
                                                                {{ date('g:i A', strtotime($saturday->to)) }}
                                                                <!-- &<br>{{ date('g:i A', strtotime($saturday->from2)) }} - {{ date('g:i A', strtotime($saturday->to2)) }} -->
                                                            @else
                                                                CLOSED
                                                            @endif
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="hours-day">SUN:&nbsp;</span><span class="hours-time">
                                                            @if (isset($sunday->status) && $sunday->status != 0)
                                                                {{ date('g:i A', strtotime($sunday->from)) }} -
                                                                {{ date('g:i A', strtotime($sunday->to)) }}
                                                                <!-- &<br>{{ date('g:i A', strtotime($sunday->from2)) }} - {{ date('g:i A', strtotime($sunday->to2)) }} -->
                                                            @else
                                                                CLOSED
                                                            @endif
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </section>
        @include('frontend.includes.all-locations')
        @if (count($client_logo) > 0)
            @include('frontend.includes.client-logo-sec')
        @endif

    @endsection
