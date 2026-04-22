<section class="photo-gallery-sec desktop sandk-common-padding sandk-common">
   <div class="container-md">
         <div class="row align-items-center">

            <h2>{{ isset($gallery->gallery_title) ? $gallery->gallery_title : '' }}</h2>
            @if(isset($gallery->gallery_sub_title))
               <h4>{{ isset($gallery->gallery_sub_title) ? $gallery->gallery_sub_title : '' }}</h4>
            @endif

            @if(isset($gallery_images) && count($gallery_images) > 0 && !empty($gallery_images))
               @php
                  $img_1 = '';
                  $img_2 = '';
                  $img_3 = '';
                  $img_4 = '';
               @endphp
               @foreach($gallery_images as $key => $image)
                  
                  @if(isset($image->featured_img) && $image->featured_img != '' && $image->featured_img != null)
                     @php
                           $img = App\Models\MediaImage::select('name')->where('id', $image->featured_img)->first();
                           if ($key == 0) {
                              $img_1 = $img_1_b = asset('uploads/'.$img->name);
                           } elseif ($key == 1) {
                              $img_2 = $img_2_b = asset('uploads/'.$img->name);
                           } elseif ($key == 2) {
                              $img_3 = $img_3_b = asset('uploads/'.$img->name);
                           } elseif ($key == 3) {
                              $img_4 = $img_4_b = asset('uploads/'.$img->name);
                           } 
                     @endphp
                  @endif
                  @if(isset($image->banner_image) && $image->banner_image != '' && $image->banner_image != null)
                     @php
                           $img = App\Models\MediaImage::select('name')->where('id', $image->banner_image)->first();
                           if ($key == 0) {
                              $img_1_b = asset('uploads/'.$img->name);
                           } elseif ($key == 1) {
                              $img_2_b = asset('uploads/'.$img->name);
                           } elseif ($key == 2) {
                              $img_3_b = asset('uploads/'.$img->name);
                           } elseif ($key == 3) {
                              $img_4_b = asset('uploads/'.$img->name);
                           } 
                     @endphp
                  @endif
               @endforeach
               <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-side-image desktop-gallery">
                  <figure>
                        @if(isset($img_4) && $img_4 != null)
                           <a data-effect="mfp-zoom-in" href="{{ $img_4_b ?? $img_4 }}" title="">
                              <img class="img-fluid normal-img" src="{{ $img_4 }}" width="786" height="393" loading="lazy" alt="S and K Gallery">
                        @else
                           <a data-effect="mfp-zoom-in" href="{{asset('front-assets/src/images/gallery_002.webp')}}" title="" loading="lazy">
                              <img class="img-fluid normal-img" src="{{asset('front-assets/src/images/gallery_002.webp')}}" width="auto" height="auto" loading="lazy" alt="S and K Gallery">
                     @endif
                              <img class="plus-img" src="{{asset('front-assets/src/images/maginifier-zoom.webp')}}" width="80" height="80" loading="lazy" alt="Gallery Zoom">
                           </a>
                  </figure>

                  <figure>
                        @if(isset($img_3) && $img_3 != null)
                           <a data-effect="mfp-zoom-in" href="{{ $img_3_b ?? $img_3 }}" title="">
                              <img class="img-fluid normal-img" src="{{ $img_3 }}" width="416" height="300" loading="lazy" alt="S and K Gallery"/>
                        @else
                           <a data-effect="mfp-zoom-in" href="{{asset('front-assets/src/images/gallery_001.webp')}}" title="">
                              <img class="img-fluid normal-img" src="{{asset('front-assets/src/images/gallery_001.webp')}}" width="auto" height="auto" loading="lazy" alt="S and K Gallery">
                        @endif
                              <img class="plus-img" src="{{asset('front-assets/src/images/maginifier-zoom.webp')}}" width="80" height="80" loading="lazy" alt="Gallery Zoom">
                           </a>
                  </figure>
                  
               </div>


               <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side-image desktop-gallery">
                  <figure>
                        @if(isset($img_2) && $img_2 != null)
                           <a data-effect="mfp-zoom-in" href="{{ $img_2_b ?? $img_2 }}" title="">
                              <img class="img-fluid normal-img" src="{{ $img_2 }}" width="auto" height="auto" loading="lazy" alt="S and K Gallery">
                        @else
                           <a data-effect="mfp-zoom-in" href="{{asset('front-assets/src/images/gallery_002.webp')}}" title="" >
                              <img class="img-fluid normal-img" src="{{asset('front-assets/src/images/gallery_002.webp')}}" width="auto" height="auto" loading="lazy" alt="S and K Gallery">
                        @endif
                              <img class="plus-img" src="{{asset('front-assets/src/images/maginifier-zoom.webp')}}" width="80" height="80" loading="lazy" alt="Gallery Zoom">
                           </a>
                  </figure>

                  <figure>
                        @if(isset($img_1) && $img_1 != null)
                           <a data-effect="mfp-zoom-in" href="{{ $img_1_b ?? $img_1 }}" title="">
                              <img class="img-fluid normal-img" src="{{ $img_1 }}" width="416" height="300" loading="lazy" alt="S and K Gallery"/>
                        @else
                           <a data-effect="mfp-zoom-in" href="{{asset('front-assets/src/images/gallery_001.webp')}}" title="">
                              <img class="img-fluid normal-img" src="{{asset('front-assets/src/images/gallery_001.webp')}}" width="auto" height="auto" loading="lazy" alt="S and K Gallery">
                        @endif
                              <img class="plus-img" src="{{asset('front-assets/src/images/maginifier-zoom.webp')}}" width="80" height="80" loading="lazy" alt="Gallery Zoom">
                           </a>
                  </figure>
               </div>

              @foreach($gallery_images->slice(4) as $key => $image)
                   @php
                       $img = App\Models\MediaImage::select('name')->where('id', $image->featured_img)->first();
                       $img_banner = App\Models\MediaImage::select('name')->where('id', $image->banner_image)->first();
                   @endphp
                    @if(isset($img->name) && $img->name != null) <!-- Check if the image exists -->
                       <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 desktop-gallery other-images">
                           <figure>
                                  <a data-effect="mfp-zoom-in" href="{{ isset($img_banner->name) ? asset('uploads/'.$img_banner->name) : (isset($img->name) ? asset('uploads/'.$img->name) : '#') }}" title="">
                                     <img class="img-fluid normal-img" src="{{ asset('uploads/'.$img->name) }}" width="auto" height="auto" loading="lazy" alt="S and K Gallery">
                                 </a>
                           </figure>
                       </div>
                   @endif
               @endforeach

               <div class="view-gallery-btn">
                  <a href="{{route('frontend.page.index',['gallery'])}}" class="common-btn">View Gallery</a>
               </div>
            @endif
         </div>
   </div>
</section>

<section class="photo-gallery-sec mobile sandk-common-padding sandk-common">
   <div class="container-md">
         <div class="row align-items-center">
            <h2>{{ isset($gallery->gallery_title) ? $gallery->gallery_title : '' }}</h2>
            @if(isset($gallery->gallery_sub_title))
               <h4>{{ isset($gallery->gallery_sub_title) ? $gallery->gallery_sub_title : '' }}</h4>
            @endif

            @if(isset($gallery_images) && count($gallery_images) > 0 && !empty($gallery_images))
               @php
                  $img_1 = '';
                  $img_2 = '';
                  $img_3 = '';
                  $img_4 = '';
               
               @endphp
               @foreach($gallery_images as $key => $image)
                  @if(isset($image->featured_img) && $image->featured_img != '' && $image->featured_img != null)
                     @php
                           $img = App\Models\MediaImage::select('name')->where('id', $image->featured_img)->first();
                           if ($key == 0) {
                              $img_1 = $img_1_b = asset('uploads/'.$img->name);
                           } elseif ($key == 1) {
                              $img_2 = $img_2_b = asset('uploads/'.$img->name);
                           } elseif ($key == 2) {
                              $img_3 = $img_3_b = asset('uploads/'.$img->name);
                           } elseif ($key == 3) {
                              $img_4 = $img_4_b = asset('uploads/'.$img->name);
                           } 
                     @endphp
                  @endif

                  @if(isset($image->banner_image) && $image->banner_image != '' && $image->banner_image != null)
                     @php
                           $img = App\Models\MediaImage::select('name')->where('id', $image->banner_image)->first();
                           if ($key == 0) {
                              $img_1_b = asset('uploads/'.$img->name);
                           } elseif ($key == 1) {
                              $img_2_b = asset('uploads/'.$img->name);
                           } elseif ($key == 2) {
                              $img_3_b = asset('uploads/'.$img->name);
                           } elseif ($key == 3) {
                              $img_4_b = asset('uploads/'.$img->name);
                           } 
                     @endphp
                  @endif

               @endforeach
               <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                  <div class="mobile-gallery-sec owl-loaded mobile-gallery-sec-main">

                     <figure>
                           @if(isset($img_4) && $img_4 != null)
                              <a data-effect="mfp-zoom-in" href="{{ $img_4_b }}" title="">
                                 <img class="img-fluid normal-img" src="{{ $img_4_b }}" width="auto" height="auto" loading="lazy" alt="S and K Gallery">
                           @else
                              <a data-effect="mfp-zoom-in" href="{{asset('front-assets/src/images/gallery_002.webp')}}" title="">
                                 <img class="img-fluid normal-img" src="{{asset('front-assets/src/images/gallery_002.webp')}}" width="auto" height="auto" loading="lazy" alt="S and K Gallery">
                           @endif
                                 <img class="plus-img" src="{{asset('front-assets/src/images/maginifier-zoom.webp')}}" width="80" height="80" loading="lazy" alt="Gallery Zoom" >
                              </a>
                     </figure>
                     
                     <figure>
                           @if(isset($img_3) && $img_3 != null)
                              <a data-effect="mfp-zoom-in" href="{{ $img_3_b }}" title="">
                                 <img class="img-fluid normal-img" src="{{ $img_3_b }}" width="416" height="300" loading="lazy" alt="S and K Gallery"/>
                           @else
                              <a data-effect="mfp-zoom-in" href="{{asset('front-assets/src/images/gallery_001.webp')}}" title="">
                                 <img class="img-fluid normal-img" src="{{asset('front-assets/src/images/gallery_001.webp')}}" width="auto" height="auto" loading="lazy" alt="S and K Gallery">
                           @endif
                                 <img class="plus-img" src="{{asset('front-assets/src/images/maginifier-zoom.webp')}}" width="80" height="80" loading="lazy" alt="Gallery Zoom">
                              </a>
                     </figure>
                     
                     <figure>
                           @if(isset($img_2) && $img_2 != null)
                              <a data-effect="mfp-zoom-in" href="{{ $img_2_b }}" title="">
                                 <img class="img-fluid normal-img" src="{{ $img_2_b }}" width="auto" height="auto" loading="lazy" alt="S and K Gallery">
                           @else
                              <a data-effect="mfp-zoom-in" href="{{asset('front-assets/src/images/gallery_002.webp')}}" title="">
                                 <img class="img-fluid normal-img" src="{{asset('front-assets/src/images/gallery_002.webp')}}" width="auto" height="auto" loading="lazy" alt="S and K Gallery">
                        @endif
                                 <img class="plus-img" src="{{asset('front-assets/src/images/maginifier-zoom.webp')}}" width="80" height="80" loading="lazy" alt="Gallery Zoom">
                              </a>
                     </figure>

                     <figure>
                           @if(isset($img_1) && $img_1 != null)
                              <a data-effect="mfp-zoom-in" href="{{ $img_1_b }}" title="">
                                 <img class="img-fluid normal-img" src="{{ $img_1_b }}" width="416" height="300" loading="lazy" alt="S and K Gallery"/>
                           @else
                              <a data-effect="mfp-zoom-in" href="{{asset('front-assets/src/images/gallery_001.webp')}}" title="">
                                 <img class="img-fluid normal-img" src="{{asset('front-assets/src/images/gallery_001.webp')}}" width="auto" height="auto" loading="lazy">
                           @endif
                                 <img class="plus-img" src="{{asset('front-assets/src/images/maginifier-zoom.webp')}}" width="80" height="80" loading="lazy" loading="lazy" alt="Gallery Zoom">
                              </a>
                     </figure>

                       @foreach($gallery_images->slice(4) as $key => $image)
                               @php
                                   $other_img = App\Models\MediaImage::select('name')->where('id', $image->featured_img)->first();
                                   $img_banner = App\Models\MediaImage::select('name')->where('id', $image->banner_image)->first();
                               @endphp
                                <figure>
                          @if(isset($other_img) && $other_img != null)
                         
                              <a data-effect="mfp-zoom-in" href="{{ isset($img_banner->name) ? asset('uploads/'.$img_banner->name) : (isset($other_img->name) ? asset('uploads/'.$other_img->name) : '#') }}" title="">
                                    <img class="img-fluid normal-img" src="{{ asset('uploads/'.$other_img->name) }}" width="416" height="300" loading="lazy" alt="S and K Gallery"/>
                              @else
                              <a data-effect="mfp-zoom-in" href="{{asset('front-assets/src/images/gallery_001.webp')}}" title="">
                                    <img class="img-fluid normal-img" src="{{asset('front-assets/src/images/gallery_001.webp')}}" width="auto" height="auto" loading="lazy">
                              @endif
                                    <img class="plus-img" src="{{asset('front-assets/src/images/maginifier-zoom.webp')}}" width="80" height="80" loading="lazy" loading="lazy" alt="Gallery Zoom">
                              </a>
                           </figure>
                     @endforeach

                  </div>

                  <div class="view-gallery-btn">
                        <a href="{{route('frontend.page.index',['gallery'])}}" class="common-btn">View Gallery</a>
                  </div>
                  
               </div>
            @endif
         </div>
   </div>
</section>