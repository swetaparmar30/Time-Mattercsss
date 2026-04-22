<section class="our-location-section common-prodoor-padding common-prodoor ">
   <div class="container-md">
      <div class="row desktop-loction-sec align-items-center">
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>{{ isset($location->location_title) ? $location->location_title : '' }}</h2>
            <ul class="nav nav-tabs">
               @foreach($locations as $key => $location)
                  @php
            $slug = Str::slug($location->country_full_name, '-');
        @endphp
               <li class="{{ $key == 0 ? 'active' : '' }}" data-bs-active="#{{ $slug }}">
                  <a data-bs-toggle="tab" href="#{{ $slug }}" class="{{ $key == 0 ? 'active' : '' }}">
                  {{ isset($location->country_name) ? $location->country_name : '' }}
                  </a> 
               </li>
               @endforeach
            </ul>
            <div class="tab-content">
               @foreach($locations as $key => $location)
                  @php
            $slug = Str::slug($location->country_full_name, '-');
        @endphp
               <div id="{{ $slug }}" class="tab-pane fade {{ $key == 0 ? 'in active show' : '' }}">
                  <div class="main-div row">
                     <div class="col-6 col-md-8">
                        <h3>{{ isset($location->title) ? $location->title : '' }}</h3>
                        <p>{{ isset($location->sub_title) ? $location->sub_title : '' }}</p>
                        <article>
                           <ul>
                              <li>
                                 @if(isset($location->address) && $location->address != null)
                                 @php 
                                  
                                     // Remove HTML tags
                                     $removeTag = strip_tags(html_entity_decode($location->address)); 
                         
                                 @endphp
                                 <a href="{{ isset($location->map) ? $location->map : '' }}" target="_blank">

                                        {!! html_entity_decode($location->address) !!}
                                  </a>
                                 @endif
                               
                              </li>

                                @php
                                     $formatted_contact_no = isset($location->phone) 
                                         ? preg_replace('/[^0-9]/', '', $location->phone) 
                                         : '';
                                  @endphp
                              <li><a href="tel:{{$formatted_contact_no}}">{{ isset($location->phone) ? $location->phone : '' }}</a></li>
                              <li>{{ isset($location->fax) ? $location->fax : '' }}</li>
                           </ul>
                           <a href="https://maps.app.goo.gl/7Gp3SfTTGnEoS1gi9" target="_blank" aria-label="Map Icon">
                           <img src="{{ asset('front-assets/images/location-map-icon.webp') }}" alt="" width="92" height="92" class="img-fluid">
                           </a>
                        </article>
                     </div>
                     @php
                     $img = App\Models\MediaImage::select('name')->where('id', $location->image)->first();
                     @endphp
                     <div class="main-img-section col-6 col-md-4">
                         @if(isset($img->name) && $img->name != null)
                         <img src="{{ asset('uploads/' . $img->name) }}" alt="" width="190" height="228" class="img-fluid">
                         @else
                         <img src="{{asset('front-assets/images/location-map-img.webp')}}" class="img-fluid" alt="" width="190" height="228">
                        @endif
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      <div class="row mobile-loction-sec">
         <h2>Our Locations</h2>
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="accordion" id="locationAccordion">
               @foreach($locations as $key => $location)
               @php
               $img = App\Models\MediaImage::select('name')->where('id', $location->image)->first();
               @endphp
               <div class="accordion-item">
                  <h3 class="accordion-header" id="heading{{ $key }}">
                     <button type="button" class="accordion-button {{ $key == 0 ? '' : 'collapsed' }}" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $key }}" aria-expanded="{{ $key == 0 ? 'true' : 'false' }}">
                     <span>{{ isset($location->country_name) ? $location->country_name : '' }}</span>
                     </button>
                  </h3>
                  <div id="collapse{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" 
                     data-bs-parent="#locationAccordion">
                     <div class="card-body">
                        <div class="main-div">
                           <div>
                            <h3>{{ isset($location->title) ? $location->title : '' }}</h3>
                             <p>{{ isset($location->sub_title) ? $location->sub_title : '' }}</p>
                              <article>
                                 <ul>
                                    @if(isset($location->address) && !empty($location->address))
                                       @php 
                                        
                                           // Remove HTML tags
                                           $removeTag = strip_tags(html_entity_decode($location->address)); 
                               
                                       @endphp
                                        <li>
                                          <a href="{{ isset($location->map) ? $location->map : '' }}">
                                              {{ strip_tags(html_entity_decode($location->address)) }}
                                          </a>
                                       </li>
                                    @endif
                                    <li><a href="tel:{{ $location->phone }}">{{ isset($location->phone) ? $location->phone : '' }}</a></li>
                                    <li>{{ isset($location->fax) ? $location->fax : '' }}</li>
                                 </ul>
                                 <a href="https://maps.app.goo.gl/7Gp3SfTTGnEoS1gi9" target="_blank" aria-label="Map Icon">
                                 <img src="{{ asset('front-assets/images/location-map-icon.webp') }}" alt="" width="92" height="92" class="img-fluid">
                                 </a>
                              </article>
                           </div>

                           <div class="main-img-section">
                              @if(isset($img->name) && $img->name != null)
                              <img src="{{ asset('uploads/' . $img->name) }}" alt="" width="190" height="228" class="img-fluid location-img">
                               @else
                               <img src="{{asset('front-assets/images/location-map-img.webp')}}" class="img-fluid" alt="" width="190" height="228">
                              @endif
                           </div>

                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</section>