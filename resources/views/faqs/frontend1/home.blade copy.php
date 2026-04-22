@extends('frontend.layouts.index')
@section('content')

<?php $setting = App\Models\Setting::first(); ?>

@if(isset($banner->checked) && $banner->checked == 1)

<section class="banner">
   
            <img src="{{ asset('front-assets/src/images/banner-image.webp')}}" class="banner-img" alt="" width="100%" height="auto">
                <div class="banner-content">
                    <div class="container-md">
                        <div class="row">
                            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 left-side">
                                <h4>Welcome to</h4>
                                <h1>S&K Door & Specialty <br>Co., Inc.</h1>

                                <p>Providing exceptional garage door installations, repair & service over 51 years.</p>

                            </div>

                            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 right-side">

                                <div class="inner-sec">
                                    <h2>Need a New Garage Door or Service?</h2>
                                    <form action="">
                                        <div class="form-group">
                                            <input type="text" class="contact_input" id="name" name="name" placeholder="Name*" required="">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="contact_input" id="email" name="email" placeholder="Email*" required="">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="contact_input" id="phone" name="phone" placeholder="Phone*" required="">
                                        </div>

                                        <div class="form-group">
                                            <textarea class="contact_input_textarea" name="message" placeholder="How can we help?"></textarea>
                                        </div>

                                        <div class="form-btn">
                                            <button>Get A Free Quote</button>
                                        </div>
                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

         </section>

@endif

@if(isset($system_setting->checked) && $system_setting->checked == 1)

@include('frontend.includes.systemsetting')

@endif

@include('frontend.includes.welcome-sec')

@if(isset($residential->checked) && $residential->checked == 1)
@if(count($Resicollections) > 0)
@include('frontend.includes.residential')
@endif
@endif

@if(isset($commercial->checked) && $commercial->checked == 1)
@if(count($Commcollections) > 0)
@include('frontend.includes.commercial')
@endif
@endif

@if(isset($gallery->checked) && $gallery->checked == 1)
@if(count($gallery_images) > 0)
@include('frontend.includes.gallery-sec')
@endif
@endif


@if(isset($design->checked) && $design->checked == 1)
@include('frontend.includes.designs-sec')
@endif

@if(isset($whypro->checked) && $whypro->checked == 1)
<section class="why-prodoor-section common-prodoor-padding common-prodoor ">
   <div class="container-md">
      <div class="row align-items-center">
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 left-side text-center">
            <h2>{{ isset($whypro->why_pro_title) ? $whypro->why_pro_title : '' }}</h2>
            <h4>{{ isset($whypro->why_pro_sub_title) ? $whypro->why_pro_sub_title : '' }}</h4>
            <div class="video-sec">
               @if(isset($whypro->video_img) && $whypro->video_img != null)
               @php
               $img = App\Models\MediaImage::select('name')->where('id', $whypro->video_img)->first();
               @endphp
               <img id="thumbnail" src="{{ asset('uploads/'.$img->name) }}" class="img-fluid" height="634" width="1290" alt="{{ isset($whypro->why_pro_sub_title) ? $whypro->why_pro_sub_title : 'ProDoor' }}">
               @else
               <img id="thumbnail" src="{{asset('front-assets/images/video-sec.webp')}}" alt="image" class="img-fluid main-img"
                  height="634" width="1290">
               @endif
               <div class="on-hover" id="thumbnail1">
                  <img src="{{asset('front-assets/images/play-icon.webp')}}" class="img-fluid" alt="">
               </div>
               <video id="myVideo" width="100%" height="100%" controls autoplay muted>
                  <source src="{{ asset('uploads/videos/' . (isset($whypro->video_name) ? $whypro->video_name : 'default_video.mp4')) }}" type="video/mp4">
               </video>
            </div>
         </div>
      </div>
   </div>
</section>
@endif

@if(isset($manufactur->checked) && $manufactur->checked == 1)
<section class="prodoor-warranty-section common-prodoor-padding common-prodoor ">
   <div class="container-md">
      <div class="row align-items-center">
         <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12 left-side">
            <h2>{{ isset($manufactur->manufactur_title) ? $manufactur->manufactur_title : '' }}</h2>
            <p>{{ isset($manufactur->manufactur__sub_title) ? $manufactur->manufactur__sub_title : '' }}
            </p>
         </div>
         <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 right-side">
            @if(isset($manufactur->manufactur_img) && $manufactur->manufactur_img != null)
            @php
            $img = App\Models\MediaImage::select('name')->where('id', $manufactur->manufactur_img)->first();
            @endphp
            <img src="{{ asset('uploads/'.$img->name) }}" class="img-fluid" width="370" height="370" alt="{{ isset($manufactur->manufactur__sub_title) ? $manufactur->manufactur__sub_title : 'ProDoor' }}">
            @else
            <img src="{{asset('front-assets/images/3-year-warranty.webp')}}" class="img-fluid" alt="" width="370" height="370">
            @endif
         </div>
      </div>
   </div>
</section>
@endif

@if(count($garage_doors) > 0)
@include('frontend.includes.partner-sec')
@endif

@if(isset($wholesale->checked) && $wholesale->checked == 1)
<section class="wholesale-section common-prodoor-padding common-prodoor">
   <div class="container-md">
      <div class="row align-items-center">
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 left-side">
            <!-- <h2>Are You Interested In Becoming<br> A Wholesale Distributor?</h2> -->
            <h2>{{ isset($wholesale->wholesale_title) ? $wholesale->wholesale_title : '' }}</h2>
            <article>
               <p>“{{ isset($wholesale->wholesale_desc) ? $wholesale->wholesale_desc : '' }}”
               </p>
            </article>
            @php
                $formatted_contact_no = isset($setting->contact_no) 
                    ? preg_replace('/[^0-9]/', '', $setting->contact_no) 
                    : '';
            @endphp
            <a href="tel:{{$formatted_contact_no}}" class="blue-common-btn">{{ isset($setting->contact_no) ? $setting->contact_no : '' }}</a>
         </div>
      </div>
   </div>
</section>
@endif

@if(count($locations) > 0)
@include('frontend.includes.location-sec')
@endif

@if(isset($form->checked) && $form->checked == 1)
@include('frontend.includes.form-sec')
@endif

@if($faqs && $faqs->checked == 1)
@include('frontend.includes.faq-sec')
@endif

@if(count($client_logo) > 0)
@include('frontend.includes.client-logo-sec')
@endif

@endsection