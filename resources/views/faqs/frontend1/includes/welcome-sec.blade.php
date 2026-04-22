<section class="welcome-section common-prodoor-padding common-prodoor ">
   <div class="container-md">
      @if(isset($system_setting->checked) && $system_setting->checked == 1)
      <div class="row align-items-center">
         <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 text-center left-side">
            <article>
               @if(isset($system_setting->system_setting_title) && $system_setting->system_setting_title != null)
               {!! html_entity_decode($system_setting->system_setting_title) !!}
               @endif
               @if(isset($system_setting->system_img) && $system_setting->system_img != null)
               @php
               $img = App\Models\MediaImage::select('name')->where('id', $system_setting->system_img)->first();
               @endphp
               <img src="{{ asset('uploads/'.$img->name) }}" class="img-fluid" width="221" height="188" alt="{{ isset($system_setting->system_sub_title) ? $system_setting->system_sub_title : 'ProDoor' }}">
               @else
               <img src="{{ asset('front-assets/images/welcome-logo.webp') }}" class="img-fluid" width="221" height="188" alt="welcome Imgae">
               @endif
            </article>
         </div>
         <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 text-left right-side">
            <h4 class="system-h4">{{ isset($system_setting->system_sub_title) ? $system_setting->system_sub_title : '' }}</h4>
            <p class="system-p">{{ isset($system_setting->system_setting_description) ? $system_setting->system_setting_description : '' }}
            </p>
         </div>
      </div>
       @endif
       
       @if(isset($inquire->checked) && $inquire->checked == 1)
      <div class="row align-items-center justify-content-end next-row">
         <div class=" left-side">
            @if(isset($inquire->inquire_img) && $inquire->inquire_img != null)
            @php
            $img = App\Models\MediaImage::select('name')->where('id', $inquire->inquire_img)->first();
            @endphp
            <img src="{{ asset('uploads/'.$img->name) }}" class="img-fluid" width="1052" height="585" alt="{{ isset($inquire->inquire_title) ? $inquire->inquire_title : 'ProDoor' }}">
            @else
            <img src="{{ asset('front-assets/images/welcome-left-img.webp') }}" class="img-fluid" width="1052" height="585" alt="welcome Imgae">
            @endif
         </div>
         <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-6     col-sm-12 col-12 text-left right-side">
            <article>
               <ul>
                  <li><img src="{{asset('front-assets/images/Wide-Range.webp')}}" class="img-fluid" width="53" height="53"
                     alt="Icon"> Wide Range</li>
                  <li><img src="{{asset('front-assets/images/Large-Stock.webp')}}" class="img-fluid" width="53" height="53"
                     alt="Icon"> Large Stock</li>
                  <li><img src="{{asset('front-assets/images/Same-Day-Pickup.webp')}}" class="img-fluid" width="53" height="53"
                     alt="Icon"> Same-Day Pickup</li>
                  <li><img src="{{asset('front-assets/images/Competitive-Wholesale-Pricing.webp')}}" class="img-fluid" width="53"
                     height="53" alt="Icon"> Competitive Wholesale Pricing</li>
               </ul>
               <h6>{{ isset($inquire->inquire_title) ? $inquire->inquire_title : '' }}</h6>
               <p>{{ isset($inquire->inquire_sub_title) ? $inquire->inquire_sub_title : '' }}</p>
               <h3>{{ isset($inquire->inquire_button_name) ? $inquire->inquire_button_name : '' }}</h3>
                @php
                    $formatted_contact_no = isset($setting->contact_no) 
                       ? preg_replace('/[^0-9]/', '', $setting->contact_no) 
                       : '';
                @endphp
               <a href="tel:{{$formatted_contact_no}}" class="common-btn">{{ isset($setting->contact_no) ? $setting->contact_no : '' }}</a>
               <div class="corner-icon-section">
                  <img src="{{asset('front-assets/images/corner-icon.webp')}}" class="img-fluid" width="88" height="76"
                     alt="Icon">
               </div>
            </article>
         </div>
      </div>
      @endif
   </div>
</section>