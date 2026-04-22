<?php
 $setting = App\Models\Setting::first();

 $menus_company = App\Models\Menu::where('footre_quick_links',1)->get();
 if (isset($menus_company) && $menus_company != ""&& count($menus_company)) {
    $menu_lists_services = [];
    foreach($menus_company as $menus_company_item){
        $menu_lists_services[] = App\Models\Menu_list::with('children')->whereNull('parent_id')->where('menus_id', $menus_company_item->id)->get();
    }
 }
 ?>

<div class="modal select-door-popup" id="selectdoor" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
    
        <!-- Modal Header -->
        <div class="container">
        <div class="modal-header">
            <h2 class="modal-title">Select Your Door</h2>
            <button type="button" class="btn-close geta-door-close" data-bs-dismiss="modal">
                <img src="{{asset('front-assets/src/images/mobile-close-brown-icon.webp')}}" alt="">
            </button>
        </div>
    
        <!-- Modal body -->
        <div class="modal-body">

            <div class="row">
            @php
                $garage_doors_footer = \App\Models\GarageDoor::select('*')->where('deleted_at', null)->get();
            @endphp
            @if($garage_doors_footer->count() > 0)
                <div class="row justify-content-center desktop-garage-door-sec">
                    @foreach($garage_doors_footer as $gky=>$gvl)
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 left-side each-product">
                            <div class="inner-content">
                                <div class="heading-sec">
                                    @if(isset($gvl->title) && $gvl->title != '')<h3><a href="@if(isset($gvl->button_url) && $gvl->button_url !='') {{$gvl->button_url}} @endif ">{{$gvl->title}}</a></h3>@endif
                          
                                    @if(isset($gvl->subtitle) && $gvl->subtitle != '')<h4><a href="@if(isset($gvl->button_url) && $gvl->button_url !='') {{$gvl->button_url}} @endif ">{{$gvl->subtitle}}</a></h4>@endif
                                </div>
                                @if(isset($gvl->image) && $gvl->image != null)
                                    @php
                                    $img = App\Models\MediaImage::select('name')->where('id', $gvl->image)->first();
                                    @endphp
                                    @if($img && isset($img->name) && $img->name != null)
                                    <a @if(isset($gvl->button_url) && $gvl->button_url !='') href="{{$gvl->button_url}}" @endif aria-label="{{$gvl->title}}"><img src="{{ asset('uploads/'.$img->name) }}" class="img-fluid" width="486" height="205" alt="" loading="lazy"></a>
                                    @endif
                                @else
                                <figure>
                                    <a @if(isset($gvl->button_url) && $gvl->button_url !='') href="{{$gvl->button_url}}" @endif aria-label="{{$gvl->title}}"><img src="{{ asset('front-assets/src/images/new-residential-garage-doors.webp')}}" class="img-fluid" width="486" height="205" alt="" loading="lazy"></a>
                                </figure>
                                @endif
                                <br>
                                @if(isset($gvl->bullets) && $gvl->bullets != '')
                                    {!! $gvl->bullets !!}
                                @endif
                        
                                @if(isset($gvl->button) && $gvl->button !='')
                                    @if(isset($gvl->button_url) && $gvl->button_url !='')
                                        <a class="common-btn first-btn" href="{{$gvl->button_url}}" title="{{$gvl->title}}" aria-label="{{$gvl->title}}"> 
                                    @else
                                    <a class="common-btn first-btn" title="{{$gvl->title}}"  aria-label="{{$gvl->title}}"> 
                                    @endif
                                        {{$gvl->button}}
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            </div>
        </div>
    </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal get-a-free-quote-popup" id="getafreequote" tabindex="-1" role="dialog" aria-labelledby="getafreequoteTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered desktop-popup" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle">Get a Free Quote</h2>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style=" background: transparent; ">
        <img src="{{asset('front-assets/src/images/mobile-close-brown-icon.webp')}}" alt="" style=" width: 22px; ">
        </button>
      </div>
      <div class="modal-body">
        <div class="row inner-row">
            <div class=" col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 left-side">
                <h3>Time Master Garage Doors & Specialty Co., Inc.  </h3>
                <h4>Need Assistance?</h4>
                <p>If you would like to speak with us live, our caring client <br> coordinators answer our phone lines from:</p>
                <div class="popup-left-box">
                    <div>
                        <p>Working Hours</p>
                        <ul>
                            <li><div>Monday - Friday</div><span>7:30 AM – 4:30 PM </span></li>
                            <!-- <li>Tuesday - Friday<span>5:00 PM - 5:00 PM</span></li> -->
                            <li><div>Saturday & Sunday</div><span>CLOSED</span></li>
                        </ul>
                    </div>
                    <!-- <div class="admin-hours-icon">
                        <img src="/uploads/66a4d7a322fff.svg" alt="" width="70" height="70" class="img-fluid">
                    </div> -->
                </div>

                <div class="popup-left-box">
                    <div>
                        <p>Phone</p>
                        <ul>
                            @if(isset($setting->contact_no) && $setting->contact_no != '')
                            <li><a href="tel:+1 {{ isset($setting->contact_no) ? $setting->contact_no : '' }}">{{ isset($setting->contact_no) ? $setting->contact_no : '' }}</a></li>
                        @endif
                        </ul>
                    </div>
                    <!-- <div class="phone-icon">
                        <img src="/uploads/66a4d7a323861.svg" alt="" width="70" height="70" class="img-fluid">
                    </div> -->
                </div>

            </div>
            <div class=" col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 right-side">
            <h3>Need a New Garage Door or Service?</h3>
                <!-- <form action="{{route('get-in-touch.store')}}" method="POST" id="ContactForm" data-parsley-validate="" novalidate="">
				@csrf
                    <div class="row">
                        <!-- H o n e y p o t -->
                        <label class="ohnohoney" for="hname"></label>
                        <input class="ohnohoney" autocomplete="newnm" type="text" id="hname" name="hname" placeholder="NAmes">
                        <label class="ohnohoney" for="hemail"></label>
                        <input class="ohnohoney" autocomplete="newnm" type="email" id="hemail" name="hemail" placeholder="Emails">
                        <!-- /H o n e y p o t -->
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" required="" data-parsley-required-message="Please Enter Name" class="contact_input" id="name" name="name" placeholder="Name*" data-parsley-errors-container="#errorName" data-parsley-pattern="/^([a-zA-Z]+\s)*[a-zA-Z]+$/" data-parsley-pattern-message="Please Enter Valid Name">
                                <small id="errorName"></small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="email" class="contact_input" id="email" name="email" placeholder="Email*" required="" data-parsley-required-message="Please Enter Email" data-parsley-type-message="Please Enter Valid Email" data-parsley-errors-container="#errorEmail">
                                <small id="errorEmail"></small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="contact_input" id="phone" name="phone" placeholder="Phone*" required="" data-parsley-required-message="Please Enter Phone" data-parsley-errors-container="#errorPhone">
                                <small id="errorPhone"></small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="zipcode" id="" name="zipcode" placeholder="Zipcode*" required="" data-parsley-required-message="Please Enter Zipcode" data-parsley-errors-container="#errorZipcode" >
                                <small id="errorZipcode"></small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="contact_input_textarea" name="message" placeholder="How can we help?" id="message"></textarea>
                            </div>
                        </div>
						<input type="hidden" name="url" value="{{url()->current()}}">
                        <div class="col-12">
                            <div class="form-btn">
                            <button class="blue-common-btn g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" data-callback='onSubmit' data-action='submit' style="display: none;">Send Message</button>
                                <button type="submit">Get a Free Quote</button>
                            </div>
                        </div>
                    </div>
                    
                </form> -->
            </div>
        </div>
       
      </div>
    </div>
    </div>
    <div class="modal-dialog modal-dialog-centered mobile-popup" role="document">
    <div class="modal-content">
      <div class="">
        <div class="header-logo-and-close">

            @if(isset($setting->site_logo) && $setting->site_logo != "" && $setting->site_logo != null)
                @php
                   $header_image_name = App\Models\MediaImage::where('id' ,$setting->site_logo)->first();
                   if(isset($header_image_name) && $header_image_name != null)
                   {
                       $h_path = asset('uploads/' . $header_image_name->name);
                   }else{
                       $h_path = asset('front-assets/images/header-logo.webp');
                   }
                @endphp
                <a href="{{route('home')}}" aria-label="Header Logo">
                   <img src="{{$h_path}}" class="img-fluid" alt="Header Logo Imgae" width="93" height="93"></a>
             @else
                <a href="{{route('home')}}" aria-label="Header Logo">
                   <img src="{{asset('front-assets/images/header-logo.webp')}}" class="img-fluid" alt="Header Logo Imgae" width="93" height="93">
                </a>
             @endif

            <!-- <a href="{{route('home')}}" class="header-logo">
                <img src="{{$h_path}}" alt="" class="img-fluid">
            </a> -->

            <div class="nav-right-sec">
                    <a href="{{ isset($setting->contact_no) ? 'tel:+'.$setting->contact_no : '' }}" class="tel mobile-tel1"><img
                            src="{{asset('front-assets/src/images/mobile-call-header-new.webp')}}" class="img-fluid" style="margin-right: 16px;"></a>
                        <img data-bs-dismiss="modal" src="{{asset('front-assets/src/images/mobile-close-brown-icon.webp')}}" alt="" class="" style="width: 30px;">
            </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="row inner-row">
            <div class=" col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 right-side">
            <h3>Get a Free Quote</h3>
                <form action="{{route('get-in-touch.store')}}" method="POST" id="ContactForm" data-parsley-validate="" novalidate="">
                @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" required="" data-parsley-required-message="Please Enter Name" class="contact_input" id="name" name="name" placeholder="Name*" data-parsley-errors-container="#errorName" data-parsley-pattern="/^([a-zA-Z]+\s)*[a-zA-Z]+$/" data-parsley-pattern-message="Please Enter Valid Name">
                                <small id="errorName"></small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="email" class="contact_input" id="email" name="email" placeholder="Email*" required="" data-parsley-required-message="Please Enter Email" data-parsley-type-message="Please Enter Valid Email" data-parsley-errors-container="#errorEmail">
                                <small id="errorEmail"></small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="contact_input" id="phone" name="phone" placeholder="Phone*" required="" data-parsley-required-message="Please Enter Phone" data-parsley-errors-container="#errorPhone">
                                <small id="errorPhone"></small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="zipcode" id="" name="zipcode" placeholder="Zipcode*" required="" data-parsley-required-message="Please Enter Zipcode" data-parsley-errors-container="#errorZipcode" >
                                <small id="errorZipcode"></small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="contact_input_textarea" name="message" placeholder="How can we help?" id="message"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="url" value="{{url()->current()}}">
                        <div class="col-12">
                            <div class="form-btn">
                            <button class="blue-common-btn g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" data-callback='onSubmit' data-action='submit' style="display: none;">Send Message</button>
                                <button type="submit">Get a Free Quote</button>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
       
      </div>
    </div>
</div>
  </div>
</div>
<div class="arrow" style="opacity: 0;"><i class="fa-angle-icon" aria-hidden="true"></i></div>
 <footer>
    <div class="footer-sec">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-3 col-sm-12 col-12 footer-content footer-first-sec">
                    <figure>
                        @if(isset($setting->footer_logo) && $setting->footer_logo != "" && $setting->footer_logo != null)
                        @php
                        $image_name = App\Models\MediaImage::where('id' ,$setting->footer_logo)->first();
                        if(isset($image_name) && $image_name != null)
                        {
                            $f_path = asset('uploads/' . $image_name->name);
                        }else{
                            $f_path = asset('front-assets/src/images/footer-logo.webp');
                        }
                        @endphp
                        <a href="{{route('home')}}" aria-label="Footer Logo">
                            <img src="{{$f_path}}" alt="Footer Logo" width="210" height="56" loading="lazy" class="img-fluid footer-logo-img">
                        </a>
                        @else
                        <a href="{{route('home')}}" aria-label="Footer Logo">
                            <img src="{{asset('front-assets/src/images/footer-logo.webp')}}" alt="Footer Logo" width="210" height="56" loading="lazy" class="img-fluid footer-logo-img">
                        </a>
                        @endif
                        
                    </figure>
                    @if(isset($setting->content) && $setting->content != '')
                        {!! html_entity_decode($setting->content) !!}
                    @endif

                    @if(
                        isset($setting->google_url) && $setting->google_url != null ||
                        isset($setting->facebook_url) && $setting->facebook_url != null ||
                        isset($setting->insta_url) && $setting->insta_url != null ||
                        isset($setting->linked_url) && $setting->linked_url != null ||
                        isset($setting->twitter_url) && $setting->twitter_url != null ||
                        isset($setting->pinterest_url) && $setting->pinterest_url != null
                    )
                    <div class="social">
                        <h3>Connect With Us</h3>
                        <ul>
                            @if(isset($setting->google_url) && $setting->google_url != null)<li><a href="{{ $setting->google_url }}" target="blank" title="Google"><img src="{{asset('front-assets/src/images/google-black.webp')}}" alt="Google" class="img-fluid" width="22" height="22"></a></li> @endif
                            @if(isset($setting->facebook_url) && $setting->facebook_url != null)<li><a href="{{ $setting->facebook_url }}" target="blank" title="Facebook"><img src="{{asset('front-assets/src/images/fb.webp')}}" alt="Facebook" class="img-fluid" width="22" height="22"></a></li> @endif
                            @if(isset($setting->insta_url) && $setting->insta_url != null)<li><a href="{{ $setting->insta_url }}" target="blank" title="Instagram"><img src="{{asset('front-assets/src/images/ig.webp')}}" alt="Instagram" class="img-fluid" width="22" height="22"></a></li> @endif
                            @if(isset($setting->linked_url) && $setting->linked_url != null)<li><a href="{{ $setting->linked_url }}" target="blank" title="Linkedin"><img src="{{asset('front-assets/src/images/linkedin.webp')}}" alt="Linkedin" class="img-fluid" width="22" height="22"></a></li> @endif
                            @if(isset($setting->twitter_url) && $setting->twitter_url != null)<li><a href="{{ $setting->twitter_url }}" target="blank" title="Twitter"><img src="{{asset('front-assets/src/images/twitter.webp')}}" alt="Twitter" class="img-fluid" width="22" height="22"></a></li> @endif
                            @if(isset($setting->pinterest_url) && $setting->pinterest_url != null)<li><a href="{{ $setting->pinterest_url }}" target="blank" title="Pintrest"><img src="{{asset('front-assets/src/images/pintrest.webp')}}" alt="Pintrest" class="img-fluid" width="22" height="22"></a></li> @endif
                            
                        </ul>
                    </div>
                    <div class="mobile-social-sec social">
                            <h3>Connect With Us</h3>
                            <ul>
                                @if(isset($setting->google_url) && $setting->google_url != null)<li><a href="{{ $setting->google_url }}" target="blank" title="Google"><img src="{{asset('front-assets/src/images/google-black.webp')}}" alt="" class="img-fluid" width="22" height="22"></a></li> @endif
                                @if(isset($setting->facebook_url) && $setting->facebook_url != null)<li><a href="{{ $setting->facebook_url }}" target="blank" title="Facebook"><img src="{{asset('front-assets/src/images/fb.webp')}}" alt="" class="img-fluid" width="22" height="22"></a></li> @endif
                                @if(isset($setting->insta_url) && $setting->insta_url != null)<li><a href="{{ $setting->insta_url }}" target="blank" title="Instagram"><img src="{{asset('front-assets/src/images/ig.webp')}}" alt="" class="img-fluid" width="22" height="22"></a></li> @endif
                                @if(isset($setting->linked_url) && $setting->linked_url != null)<li><a href="{{ $setting->linked_url }}" target="blank" title="Linkedin"><img src="{{asset('front-assets/src/images/linkedin.webp')}}" alt="" class="img-fluid" width="22" height="22"></a></li> @endif
                                @if(isset($setting->twitter_url) && $setting->twitter_url != null)<li><a href="{{ $setting->twitter_url }}" target="blank" title="Twitter"><img src="{{asset('front-assets/src/images/twitter.webp')}}" alt="" class="img-fluid" width="22" height="22"></a></li> @endif
                                @if(isset($setting->pinterest_url) && $setting->pinterest_url != null)<li><a href="{{ $setting->pinterest_url }}" target="blank" title="Pintrest"><img src="{{asset('front-assets/src/images/pintrest.webp')}}" alt="" class="img-fluid" width="22" height="22"></a></li> @endif
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-3 col-sm-12 col-12 footer-content footer-second-sec">
                    <h3>Quick Links</h3>
                    @if(isset($menu_lists_services) && count($menu_lists_services))
                        <ul>
                            @foreach($menu_lists_services as $servicesLinks)
                                @foreach($servicesLinks as $key => $menu_links_services)
                                    <li><a href="{{ $menu_links_services->slug }}">{{$menu_links_services->name}}</a></li>
                                @endforeach
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 footer-content footer-third-sec">
                    <h2>Location</h2>
                    <div class="row">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 locatin-col">
                        <h4>NEWPORT, DELAWARE</h4>
                        <ul>
                            @if(isset($setting->location) && $setting->location != '')
                                <li>{!! html_entity_decode($setting->location) !!}</li>
                            @endif
                            @if(isset($setting->contact_no) && $setting->contact_no != '')
                                <li><a href="tel:+1 {{ isset($setting->contact_no) ? $setting->contact_no : '' }}" class="custom_fonts_amiko">{{ isset($setting->contact_no) ? $setting->contact_no : '' }}</a></li>
                            @endif
                            @if(isset($setting->email) && $setting->email != '')
                                <li><a href="mailto:{!! strip_tags(html_entity_decode($setting->email)) !!}">{!! html_entity_decode($setting->email) !!}</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <h4>SALISBURY, MARYLAND </h4>
                        <ul>
                            @if(isset($setting->location2) && $setting->location2 != '')
                                <li>{!! html_entity_decode($setting->location2) !!}</li>
                            @endif
                            @if(isset($setting->contact_no2) && $setting->contact_no2 != '')
                                <li><a href="tel:+1 {{ isset($setting->contact_no2) ? $setting->contact_no2 : '' }}" class="custom_fonts_amiko">{{ isset($setting->contact_no2) ? $setting->contact_no2 : '' }}</a></li>
                            @endif
                            @if(isset($setting->email2) && $setting->email2 != '')
                                <li><a href="mailto:{!! strip_tags(html_entity_decode($setting->email2)) !!}">{!! html_entity_decode($setting->email2) !!}</a></li>
                            @endif
                        </ul>
                    </div>
                    </div>
                    <div class="row location-bottom-row">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 locatin-col">
                            <h4>DOVER, DELAWARE </h4>
                            <ul>
                                @if(isset($setting->location3) && $setting->location3 != '')
                                    <li>{!! html_entity_decode($setting->location3) !!}</li>
                                @endif
                                @if(isset($setting->contact_no3) && $setting->contact_no3 != '')
                                    <li><a href="tel:+1 {{ isset($setting->contact_no3) ? $setting->contact_no3 : '' }}" class="custom_fonts_amiko">{{ isset($setting->contact_no3) ? $setting->contact_no3 : '' }}</a></li>
                                @endif
                                @if(isset($setting->email3) && $setting->email3 != '')
                                    <li><a href="mailto:{!! strip_tags(html_entity_decode($setting->email3)) !!}">{!! html_entity_decode($setting->email3) !!}</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <h4>GEORGETOWN, DELAWARE </h4>
                            <ul>
                                @if(isset($setting->location4) && $setting->location4 != '')
                                    <li>{!! html_entity_decode($setting->location4) !!}</li>
                                @endif
                                @if(isset($setting->contact_no4) && $setting->contact_no4 != '')
                                    <li><a href="tel:+1 {{ isset($setting->contact_no4) ? $setting->contact_no4 : '' }}" class="custom_fonts_amiko">{{ isset($setting->contact_no4) ? $setting->contact_no4 : '' }}</a></li>
                                @endif
                                @if(isset($setting->email4) && $setting->email4 != '')
                                    <li><a href="mailto:{!! strip_tags(html_entity_decode($setting->email4)) !!}">{!! html_entity_decode($setting->email4) !!}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </div>

    <div class="copyright-sec">
        <div class="container-md">
            <div class="row align-items-center">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    @if(isset($setting->copyright) && $setting->copyright != '')
                        {!! html_entity_decode($setting->copyright) !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
	

</footer>