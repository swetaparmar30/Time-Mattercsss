<section class="prodoor-partner-section common-prodoor-padding common-prodoor">
   <div class="container-md">
      <div class="row desktop-partner-sec align-items-center">
         <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 left-side">
            <div class="left-side-tab-items" role="tablist">
               @foreach($garage_doors as $key => $garage_door)
               <a class="nav-link each-offer-item {{ $key == 0 ? 'active' : '' }}" 
                  id="partner-collection-tab-{{ $garage_door->id }}" 
                  data-bs-toggle="tab" 
                  data-bs-target="#partner-collection-{{ $garage_door->id }}" 
                  role="tab" 
                  aria-controls="partner-collection-{{ $garage_door->id }}" 
                  aria-selected="{{ $key == 0 ? 'true' : 'false' }}" 
                  href="">
                  <article>
                     @php
                     $img = App\Models\MediaImage::select('name')->where('id', $garage_door->image)->first();
                     @endphp
                     <div class="nk_click_fn pro-garage">
                        @if(isset($img->name) && $img->name != null)
                        <img decoding="async" style="cursor: pointer; width: 100%;" src="{{ asset('uploads/' . $img->name) }}" class="img-fluid normal-img">
                        @else
                         <img decoding="async" style="cursor: pointer; width: 100%;" src="{{asset('front-assets/images/partner-1.webp')}}" class="img-fluid normal-img">
                        @endif
                        <img src="{{asset('front-assets/images/play-icon.webp')}}" class="img-fluid pro-garage-image" alt="">
                     </div>
                     <div class="nk_hide">
                        <video id="myVideo" width="100%" height="100%" controls autoplay muted>
                           <source src="{{ asset('uploads/videos/' . (isset($garage_door->video) ? $garage_door->video : 'default_video.mp4')) }}" type="video/mp4">
                        </video>
                     </div>
                  </article>
               </a>
               @endforeach
            </div>
         </div>
         <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 right-side">
            <div id="partnerCarousel" class="carousel slide" data-bs-ride="carousel">
               <ol class="carousel-indicators">
                  @foreach($garage_doors as $key => $garage_door)
                  <li data-bs-target="#partnerCarousel" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                  @endforeach
               </ol>
               <div class="carousel-inner what-offer-image">
                  @foreach($garage_doors as $key => $garage_door)
                  <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" id="partner-collection-{{ $garage_door->id }}">
                     <h2>{{ isset($garage_door->title) ? $garage_door->title : '' }}</h2>

                     <p>{{ isset($garage_door->description) ? $garage_door->description : '' }}</p>
                     <article class="mobile-video">
                        @php
                        $img = App\Models\MediaImage::select('name')->where('id', $garage_door->image)->first();
                        @endphp
                        <div class="nk_click_fn pro-garage">
                           @if(isset($img->name) && $img->name != null)
                           <img decoding="async" id="thumbnail" style="cursor: pointer; width: 100%;" src="{{ asset('uploads/' . $img->name) }}" class="img-fluid normal-img">
                            @else
                            <img decoding="async" id="thumbnail" style="cursor: pointer; width: 100%;" src="{{asset('front-assets/images/partner-1.webp')}}" class="img-fluid normal-img">
                           @endif
                           <img src="{{asset('front-assets/images/play-icon.webp')}}" class="img-fluid pro-garage-image" alt="" style=" width: 16%;">
                        </div>
                        
                        <div class="nk_hide">
                        <video id="myVideo" width="100%" height="100%" controls autoplay muted>
                           <source src="{{ asset('uploads/videos/' . (isset($garage_door->video) ? $garage_door->video : 'default_video.mp4')) }}" type="video/mp4">
                        </video>
                      </div>
                     </article>
                     <article>
                        <h3>{{ isset($garage_door->partner_name) ? $garage_door->partner_name : '' }}</h3>
                        <p>{{ isset($garage_door->designation) ? $garage_door->designation : '' }}</p>
                     </article>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</section>