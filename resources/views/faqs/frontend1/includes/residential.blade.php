<section class="residential-section common-prodoor-padding common-prodoor">
   <div class="container-fluid">
      <div class="row desktop-residential-sec align-items-center">
         <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-side">
            <h2>{{ isset($residential->resi_title) ? $residential->resi_title : '' }}</h2>
            <h4>{{ isset($residential->resi_sub_title) ? $residential->resi_sub_title : '' }}</h4>
            <p>{{ isset($residential->resi_description) ? $residential->resi_description : '' }}</p>
            <ul class="nav nav-tabs">
               @foreach($Resicollections as $key => $collection)
               
               <li data-bs-active="#residential-{{ Str::slug($collection->title, '-') }}">
            <a data-bs-toggle="tab" href="#residential-{{ Str::slug($collection->title, '-') }}" class="{{ $key === 0 ? 'active' : '' }}">
                  {{ isset($collection->title) ? $collection->title : '' }}
                  </a>
               </li>
              
               @endforeach
            </ul>
          <!--   <a class="blue-common-btn" href="{{ isset($residential->resi_button_url) ? $residential->resi_button_url : '' }}">
               {{ isset($residential->resi_button_name) ? $residential->resi_button_name : '' }}
            </a> -->
            <a class="blue-common-btn">
               {{ isset($residential->resi_button_name) ? $residential->resi_button_name : '' }}
            </a>
         </div>
         <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
            <div class="tab-content">
             @foreach($Resicollections as $key => $collection)
                
                    <div id="residential-{{ Str::slug($collection->title, '-') }}" class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}">
                <div id="carousel-{{ Str::slug($collection->title, '-') }}" class="carousel slide" data-bs-ride="carousel">
                             <ol class="carousel-indicators">
                                 @php $count = 0; @endphp
                                 @foreach($collectionImages as $image)
                                     @if($image->collection_id == $collection->id)
                                          <li data-bs-target="#carousel-{{ Str::slug($collection->title, '-') }}" data-bs-slide-to="{{ $count }}" class="{{ $count === 0 ? 'active' : '' }}"></li>
                                         @php $count++; @endphp
                                     @endif
                                 @endforeach
                             </ol>
                             <div class="carousel-inner">
                                 @php $count = 0; @endphp
                                 @php $imageFound = false; @endphp
                                 @foreach($collectionImages as $image)
                                     @if($image->collection_id == $collection->id)
                                         <div class="carousel-item {{ $count === 0 ? 'active' : '' }}">
                                             @if(isset($image->image) && $image->image != null)
                                              <img src="{{ asset('uploads/collection/' . $image->image) }}" class="img-fluid" alt="" width="1045" height="763">
                                              @else
                                              <img src="{{asset('front-assets/images/Residential.webp')}}" class="img-fluid" alt="" width="1045" height="763">
                                             @endif
                                             @php $count++; $imageFound = true; @endphp
                                         </div>
                                     @endif
                                 @endforeach
                                 @if(!$imageFound)
                                    <div class="carousel-item active">
                                        <img src="{{ asset('front-assets/images/Residential.webp') }}" class="img-fluid" alt="" width="1045" height="763">
                                    </div>
                                @endif
                             </div>
                         </div>
                     </div>
                
             @endforeach
         </div>
         </div>
      </div>
<div class="row mobile-residential-sec">
    <h2>{{ isset($residential->resi_title) ? $residential->resi_title : '' }}</h2>
    <h4>{{ isset($residential->resi_sub_title) ? $residential->resi_sub_title : '' }}</h4>
    <p>{{ isset($residential->resi_description) ? $residential->resi_description : '' }}</p>
    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="accordion" id="footerAccordion">
            @foreach($Resicollections as $key => $collection)
            
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="heading{{ $key + 1 }}">
                            <button type="button" class="accordion-button {{ $key === 0 ? '' : 'collapsed' }}" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#collapse{{ $key + 1 }}" 
                                aria-expanded="{{ $key === 0 ? 'true' : 'false' }}">
                                <span>{{ isset($collection->title) ? $collection->title : '' }}</span>
                            </button>
                        </h3>
                        <div id="collapse{{ $key + 1 }}" 
                            class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}" 
                            aria-labelledby="heading{{ $key + 1 }}" 
                            data-bs-parent="#footerAccordion">
                            <div class="card-body">
                                <div id="mobileCarousel{{ $key + 1 }}" class="carousel slide" data-bs-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @php $count = 0; @endphp
                                        @foreach($collectionImages as $image)
                                            @if($image->collection_id == $collection->id)
                                                <li data-bs-target="#mobileCarousel{{ $key + 1 }}" 
                                                    data-bs-slide-to="{{ $count }}" 
                                                    class="{{ $count === 0 ? 'active' : '' }}"></li>
                                                @php $count++; @endphp
                                            @endif
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner">
                                        @php $count = 0; @endphp
                                        @php $imageFound = false; @endphp
                                        @foreach($collectionImages as $image)
                                            @if($image->collection_id == $collection->id)
                                                <div class="carousel-item {{ $count === 0 ? 'active' : '' }}">
                                                    
                                                    @if(isset($image->image) && $image->image != null)
                                                    <img src="{{ asset('uploads/collection/' . $image->image) }}" 
                                                        class="img-fluid" alt="" width="auto" height="auto">
                                                    @else
                                                      <img src="{{asset('front-assets/images/Residential.webp')}}" class="img-fluid" alt="" width="auto" height="auto">
                                                    @endif

                                                    @php $count++; $imageFound = true; @endphp
                                                </div>
                                            @endif
                                        @endforeach
                                        
                                        @if(!$imageFound)
                                            <div class="carousel-item active">
                                                <img src="{{asset('front-assets/images/Residential.webp')}}" class="img-fluid" alt="" width="auto" height="auto">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             
            @endforeach
        </div>
    </div>
 <!--    <a class="blue-common-btn" href="{{ isset($residential->resi_button_url) ? $residential->resi_button_url : '' }}">
        {{ isset($residential->resi_button_name) ? $residential->resi_button_name : '' }}
    </a> -->
     <a class="blue-common-btn">
        {{ isset($residential->resi_button_name) ? $residential->resi_button_name : '' }}
    </a>
</div>

   </div>
</section>