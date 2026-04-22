@extends('frontend.layouts.index')
@if(isset($about->title) && $about->title != '' && $about->title != null)
@section('title') {{$about->title}} @endsection
@endif
@section('content')
<style type="text/css">
@media (max-width: 768px) {
    .about-page-banner-section.sandk-common {
        background-image: url('https://nateb19.sg-host.com/uploads/67483ea85bc48.webp') !important; /* Replace with the static background image for mobile */
        /*background-size: cover; */
        /*background-position: center; */
    }
}
@media (max-width: 575.98px) {
  .mission-and-values-section .inner-box-col article{margin-top: 35px;}
  .mission-and-values-section .inner-row .inner-box-col:first-child article{margin-top:0;}
  .mission-and-values-section .inner-box-col article .ambition-section {display: flex; flex-direction: row;}
  .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-icon{width: 20%;}
  .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-icon img{width: 60px;height: auto;}
  .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-content{padding-left: 15px;width: 80%;}
  .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-content h3{padding: 0; text-align: left;font-size: 22px;margin: 0px 0 10px;line-height: 22px;}
  .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-content p{padding: 0; text-align: left;}
}

@media (min-width: 576px) and (max-width: 767.98px) {
  .mission-and-values-section .inner-box-col article{margin-top: 35px;}
  .mission-and-values-section .inner-row .inner-box-col:first-child article{margin-top:0;}
  .mission-and-values-section .inner-box-col article .ambition-section {display: flex; flex-direction: row;}
  .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-icon{padding-left: 10px;width: 20%;}
  .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-icon img{width: 75px;height: auto;}
  .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-content{width: 80%;}
  .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-content h3{padding: 0; text-align: left;font-size: 22px;margin: 0px 0 10px;line-height: 22px;}
  .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-content p{padding: 0; text-align: left;}
}
</style>
  @if(isset($about->title) || isset($about->description) || $about->title != '' || $about->description != '')
    @php
        $bgurl = ''; // Initialize the variable
    @endphp
    @if(isset($about->bannerimage) && $about->bannerimage != null)
        @php
            $img = App\Models\MediaImage::select('name')->where('id', $about->bannerimage)->first();
            // Check if $img is not null before accessing name
            if($img && isset($img->name)) {
                $bgurl = asset('uploads/'.$img->name);
            }
        @endphp
    @endif
        <section class="about-page-banner-section sandk-common" @if(isset($bgurl) && $bgurl != '') style="background-image:url({{$bgurl}})" @endif>
            <div class="container-md">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center about-text-banner">
                        @if(isset($about->title) && $about->title != '')
                            <h2 class="about-title">{{$about->title}}</h2>
                        @endif
                        @if(isset($about->description) && $about->description != '')
                            {!! $about->description !!}
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(isset($about->historytitle) || isset($about->historydescription) || $about->historytitle != '' || $about->historydescription != '' || $about->historysubtitle != '' || $about->historysubdescription != '' )
    <section class="our-history-section sandk-common sandk-common-padding">
        <div class="container-md">
            <div class="row align-items-center">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 left-side">
                    @if(isset($about->historytitle) && $about->historytitle != '')
                        <h2 class="about-history-h2 main_about_title">{!!$about->historytitle !!}</h2>
                    @endif
                    @if(isset($about->historysubtitle) && $about->historysubtitle != '')
                        <h3>{!! $about->historysubtitle !!}</h3>
                    @endif

                    @if(isset($about->historyimage) && $about->historyimage != null)
                        @php
                        $img = App\Models\MediaImage::select('name')->where('id', $about->historyimage)->first();
                        @endphp
                        @if(isset($img->name) && $img->name != null)
                        <img src="{{ asset('uploads/'.$img->name) }}" alt="{{ isset($about->historytitle) ? $about->historytitle : '' }}" class="img-fluid mobile-img" width="auto" height="auto" alt="" loading="lazy">
                        @endif
                    @else
                    <img src="{{ asset('front-assets/src/images/residential-images/history-about.png') }}" class="img-fluid mobile-img" width="auto" height="auto" alt="" loading="lazy">
                    @endif

                    @if(isset($about->historydescription) && $about->historydescription != '')
                        {!! $about->historydescription !!}
                    @endif

                    @if(isset($about->historybuttonurl) && $about->historybuttonurl != '' && $about->historybuttonurl != '#')
                        <a href="#" class="common-btn" data-bs-target="#getafreequote" data-bs-toggle="modal">GET A FREE QUOTE</a>
                    @endif
                </div>

                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 right-side">
                    @if(isset($img))
                        <img src="{{ asset('uploads/'.$img->name) }}" alt="{{ isset($about->historytitle) ? $about->historytitle : '' }}" class="img-fluid desktop-image" width="auto" height="auto" alt="" loading="lazy">
                    @else
                        <img src="{{ asset('front-assets/src/images/residential-images/history-about.png') }}" class="img-fluid desktop-image" width="auto" height="auto" alt="" loading="lazy">
                    @endif
                </div>

            </div>
        </div>

    </section>
    @endif


    <!-- <section class="our-history-section-coontent sandk-common sandk-common-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <div class="ab container">
                    <h2 class="about-history-h2">Our History</h2>
                    <p>Incorporated in Quincy, Illinois, on Tuesday, October 17th, 1944, Raynor is the oldest door company in the industry. We take pride in our long history of quality products, continually building upon it to offer the exceptional line of residential Premium Garage Doors available today.</p>
                    </div>

                    <article class="desktop">
                        <div class="inner-history-section">
                            <div class="half-section">
                                <div class="history-1980 history-year">
                                    <ul>
                                        <li>Second-generation brothers, Mike and Andy Biddle now own and managed the business</li>
                                    </ul>
                                    <h6>1980</h6>
                                </div>
                                <div class="history-2013 history-year">
                                    <ul>
                                        <li>The strategic decision was made to conclude our residential installation division as future endeavors were gearing up</li>
                                    </ul>
                                    
                                    <h6>2013</h6>
                                </div>
                                <div class="history-2016 history-year">
                                    <ul>
                                        <li>The culmination of all our diligent efforts materialized with the establishment of ProDoor Manufacturing.</li>
                                    </ul>
                                    
                                    <h6>2016</h6>
                                </div>
                                <div class="history-2021 history-year">
                                    
                                    <h6>2021</h6>
                                </div>
                            </div>
                            <div class="half-section next-section">
                                <div class="history-2010 history-year">
                                    <h6>2010</h6>
                                    <ul>
                                        <li>Professional Garage Doors began serving as a Raynor professional dealer during the '80s and '90s</li>
                                        <li>Professional Garage Doors originated as a garage door installation company serving the greater Indianapolis area, all thanks to the vision and initiative of Bob Biddle and. Dave Taylor</li>
                                    </ul>
                                    
                                </div>                        
                                <div class="history-2014 history-year">
                                    <h6>2014</h6>
                                    <ul>
                                        <li>Responding to market demands, a wholesalel distribution center was established in Cincinnati, Ohio</li>
                                        <li>ProDoor recruited JD Stearns as Chief Operating Officer with the aim of venturing into steel door section manufacturing. JD Stearns' appointment marked a pivotal moment in the evolution of Professional Garage Doors. One of the first journeys he embarked on was rebranding ultimately transforming into its current identity, ProDoor Systems.</li>
                                    </ul>
                                </div>                                            
                                <div class="history-2017 history-year">
                                    <h6>2017</h6>
                                    <ul>
                                        <li>In the subsequent years, the company significantly expanded its business footprint, establishing wholesale distribution centers in Dallas, Little Rock, and Nashville.</li>
                                        <li>As PDM's success reverberated throughout the industry, our lean business model attracted the interest of Raynor, leading to their acquisition of our company.</li>
                                    </ul>
                                </div>
                            </div>
    
                            
    
                            
                        </div>
                    </article>

                    <div class="mobile container">
                        <div class="mobile-inner">
                            <h6>1980</h6>
                            <ul>
                                <li>Professional Garage Doors began serving as a Raynor professional dealer during the '80s and '90s</li>
                                <li>Professional Garage Doors originated as a garage door installation company serving the greater Indianapolis area, all thanks to the vision and initiative of Bob Biddle and. Dave Taylor</li>
                            </ul>
                        </div>
                        <div class="mobile-inner">
                            <h6>2010</h6>
                            <ul>
                                <li>Second-generation brothers, Mike and Andy Biddle now own and managed the business</li>
                            </ul>
                        </div>

                        <div class="mobile-inner">
                            <h6>2013</h6>
                            <ul>
                                <li>Responding to market demands, a wholesalel distribution center was established in Cincinnati, Ohio</li>
                                <li>ProDoor recruited JD Stearns as Chief Operating Officer with the aim of venturing into steel door section manufacturing. JD Stearns' appointment marked a pivotal moment in the evolution of Professional Garage Doors. One of the first journeys he embarked on was rebranding ultimately transforming into its current identity, ProDoor Systems.</li>
                            </ul>
                        </div>

                        <div class="mobile-inner">
                            <h6>2014</h6>
                            <ul>
                                <li>The strategic decision was made to conclude our residential installation division as future endeavors were gearing up</li>
                            </ul>
                        </div>

                        <div class="mobile-inner">
                            <h6>2016</h6>
                            <ul>
                                <li>In the subsequent years, the company significantly expanded its business footprint, establishing wholesale distribution centers in Dallas, Little Rock, and Nashville.</li>
                            </ul>
                        </div>

                        <div class="mobile-inner">
                            <h6>2017</h6>
                            <ul>
                                <li>The culmination of all our diligent efforts materialized with the establishment of ProDoor Manufacturing.</li>
                            </ul>
                        </div>

                        <div class="">
                            <h6>2021</h6>
                            <ul>
                                <li>As PDM's success reverberated throughout the industry, our lean business model attracted the interest of Raynor, leading to their acquisition of our company.</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> -->


    @if(isset($about->missiontitle) || isset($about->missiondescription) || $about->missiontitle != '' || $about->missiondescription != '' )
    <section class="mission-and-values-section sandk-common sandk-common-padding">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    @if(isset($about->missiontitle) && $about->missiontitle != '')
                        <h2 class="about-history-h2">{{$about->missiontitle}}</h2>
                    @endif
                    <!-- @if(isset($about->missiondescription) && $about->missiondescription != '')
                        {!! $about->missiondescription !!}
                    @endif -->

                    <!-- <a href="" class="common-btn">GET STARTED</a> -->
                </div>
                </div>

                <div class="row inner-row">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 inner-box-col">
                        <article>
                            <div class="ambition-section">
                                <div class="ambition-step-icon">

                                    @if(isset($mission_vlues->mv_icon_1) && $mission_vlues->mv_icon_1 != null)
                                        @php
                                        $img = App\Models\MediaImage::select('name')->where('id', $mission_vlues->mv_icon_1)->first();
                                        @endphp
                                        @if(isset($img->name) && $img->name != null)
                                        <img src="{{ asset('uploads/'.$img->name) }}" alt="mission" width="120" height="120">
                                        @endif
                                    @else
                                    <img src="/uploads/66a0af3a05c4f.webp" alt="mission" width="120" height="120">
                                    @endif
                                </div>
                            <div class="ambition-step-content">
                                <h3>{{ isset($mission_vlues->mv_title_1) ? $mission_vlues->mv_title_1 : ''}}</h3>
                                <p>{{ isset($mission_vlues->mv_description_1) ? $mission_vlues->mv_description_1 : ''}}</p>
                            </div>
                        </div>
                        </article>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 inner-box-col">
                        <article>
                            <div class="ambition-section">
                                <div class="ambition-step-icon">
                                    @if(isset($mission_vlues->mv_icon_2) && $mission_vlues->mv_icon_2 != null)
                                        @php
                                        $img = App\Models\MediaImage::select('name')->where('id', $mission_vlues->mv_icon_2)->first();
                                        @endphp
                                        @if(isset($img->name) && $img->name != null)
                                        <img src="{{ asset('uploads/'.$img->name) }}" alt="mission" width="120" height="120">
                                        @endif
                                    @else
                                    <img src="/uploads/66a0af3a05c4f.webp" alt="mission" width="120" height="120">
                                    @endif
                                </div>
                                <div class="ambition-step-content">
                                    <h3>{{ isset($mission_vlues->mv_title_2) ? $mission_vlues->mv_title_2 : ''}}</h3>
                                    <p>{{ isset($mission_vlues->mv_description_2) ? $mission_vlues->mv_description_2 : ''}}</p>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 inner-box-col">
                        <article>
                            <div class="ambition-section">
                                <div class="ambition-step-icon">
                                    @if(isset($mission_vlues->mv_icon_3) && $mission_vlues->mv_icon_3 != null)
                                        @php
                                        $img = App\Models\MediaImage::select('name')->where('id', $mission_vlues->mv_icon_3)->first();
                                        @endphp
                                        @if(isset($img->name) && $img->name != null)
                                        <img src="{{ asset('uploads/'.$img->name) }}" alt="mission" width="120" height="120">
                                        @endif
                                    @else
                                    <img src="/uploads/66a0af3a05c4f.webp" alt="mission" width="120" height="120">
                                    @endif
                                </div>
                            <div class="ambition-step-content">
                                <h3>{{ isset($mission_vlues->mv_title_3) ? $mission_vlues->mv_title_3 : ''}}</h3>
                                <p>{{ isset($mission_vlues->mv_description_3) ? $mission_vlues->mv_description_3 : ''}}</p>
                           </div>
                        </div>
                        </article>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 inner-box-col">
                        <article>
                            <div class="ambition-section">
                                <div class="ambition-step-icon">
                                @if(isset($mission_vlues->mv_icon_4) && $mission_vlues->mv_icon_4 != null)
                                        @php
                                        $img = App\Models\MediaImage::select('name')->where('id', $mission_vlues->mv_icon_4)->first();
                                        @endphp
                                        @if(isset($img->name) && $img->name != null)
                                        <img src="{{ asset('uploads/'.$img->name) }}" alt="mission" width="120" height="120">
                                        @endif
                                    @else
                                    <img src="/uploads/66a0af3a05c4f.webp" alt="mission" width="120" height="120">
                                    @endif
                            </div>
                            <div class="ambition-step-content">
                                <h3>{{ isset($mission_vlues->mv_title_4) ? $mission_vlues->mv_title_4 : ''}}</h3>
                                <p>{{ isset($mission_vlues->mv_description_4) ? $mission_vlues->mv_description_4 : ''}}</p>
                           </div>
                        </div>
                        </article>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 inner-box-col">
                        <article>
                            <div class="ambition-section">
                                <div class="ambition-step-icon">
                                       @if(isset($mission_vlues->mv_icon_5) && $mission_vlues->mv_icon_5 != null)
                                        @php
                                        $img = App\Models\MediaImage::select('name')->where('id', $mission_vlues->mv_icon_5)->first();
                                        @endphp
                                        @if(isset($img->name) && $img->name != null)
                                        <img src="{{ asset('uploads/'.$img->name) }}" alt="mission" width="120" height="120">
                                        @endif
                                    @else
                                    <img src="/uploads/66a0af3a05c4f.webp" alt="mission" width="120" height="120">
                                    @endif
                                 </div>
                            <div class="ambition-step-content">
                                <h3>{{ isset($mission_vlues->mv_title_5) ? $mission_vlues->mv_title_5 : ''}}</h3>
                                <p>{{ isset($mission_vlues->mv_description_5) ? $mission_vlues->mv_description_5 : ''}}</p>
                           </div>
                        </div>
                        </article>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 inner-box-col">
                        <article>
                            <div class="ambition-section">
                                <div class="ambition-step-icon">
                                @if(isset($mission_vlues->mv_icon_6) && $mission_vlues->mv_icon_6 != null)
                                        @php
                                        $img = App\Models\MediaImage::select('name')->where('id', $mission_vlues->mv_icon_6)->first();
                                        @endphp
                                        @if(isset($img->name) && $img->name != null)
                                        <img src="{{ asset('uploads/'.$img->name) }}" alt="mission" width="120" height="120">
                                        @endif
                                    @else
                                    <img src="/uploads/66a0af3a05c4f.webp" alt="mission" width="120" height="120">
                                    @endif
                            </div>
                            <div class="ambition-step-content">
                                <h3>{{ isset($mission_vlues->mv_title_6) ? $mission_vlues->mv_title_6 : ''}}</h3>
                                <p>{{ isset($mission_vlues->mv_description_6) ? $mission_vlues->mv_description_6 : ''}}</p>
                            </div>
                         </div>
                        </article>
                    </div>
                </div>
            
        </div>
    </section>
    @endif

    <!-- @if(isset($about->teamtitle) || isset($about->teamdescription) || $about->teamtitle != '' || $about->teamdescription != '' ) -->
    <!-- <section class="get-free-quote-sec sandk-common our-team-and-culture-section">
        @if(isset($about->teambackground) && $about->teambackground != null)
            @php
            $img = App\Models\MediaImage::select('name')->where('id', $about->teambackground)->first();
            @endphp
            <img src="{{ asset('uploads/'.$img->name) }}" class="img-fluid" alt="{{ isset($about->teamtitle) ? $about->teamtitle : '' }}">
        @else
            <img src="{{ asset('front-assets/src/images/residential-images/our-team-and-culture.png') }}" class="background-image" width="100%" height="auto" alt="" loading="lazy">
        @endif
        </div>
        
        <div class="our-team-and-culture-sec">
            <div class="container-md">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        @if(isset($about->teamtitle) && $about->teamtitle != '')
                            <h2>{{$about->teamtitle}}</h2>
                        @endif
                        @if(isset($about->teamdescription) && $about->teamdescription != '')
                            {!! $about->teamdescription !!}
                        @endif
                        <a class="common-btn first-btn"> GET a FREE QUOTE</a>
                        <a class="common-btn second-btn" href="tel:6623236381"><img src="{{ asset('front-assets/src/images/white-yellow-call-icon.webp') }}" class="hover-icon" alt=""><img src="{{ asset('front-assets/src/images/blue-white-call-icon.webp') }}" class="normal-icon" alt="">(662)323-6381</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- @endif -->

    

    @include('frontend.includes.areas-sec')
    @include('frontend.includes.testimonial')
    @include('frontend.includes.quote-sec')
    @if(count($client_logo) > 0)
        @include('frontend.includes.client-logo-sec')
    @endif
@endsection