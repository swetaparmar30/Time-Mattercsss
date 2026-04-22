<section class="commercial-section common-prodoor-padding common-prodoor ">
   <div class="container-fluid">
   <div class="row desktop-commercial-sec align-items-center">
    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-side">
        <div class="tab-content">
            @php $firstCommercial = true; @endphp
            @foreach($Commcollections as $key => $collection)
              
                    <div id="commercial-{{ Str::slug($collection->title, '-') }}" class="tab-pane fade {{ $firstCommercial ? 'show active' : '' }}">
    <div id="carousel-commercial-{{ Str::slug($collection->title, '-') }}" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                @php $count = 0; @endphp
                                @foreach($collectionImages as $index => $image)
                                    @if($image->collection_id == $collection->id)
                                      <li data-bs-target="#carousel-commercial-{{ Str::slug($collection->title, '-') }}" data-bs-slide-to="{{ $count }}" class="{{ $count === 0 ? 'active' : '' }}"></li>
                                        @php $count++; @endphp
                                    @endif
                                @endforeach
                            </ol>
                            <div class="carousel-inner what-offer-image">
                                @php $count = 0; @endphp
                                @php $imageFound = false; @endphp
                                @foreach($collectionImages as $index => $image)
                                    @if($image->collection_id == $collection->id)
                                        <div class="carousel-item {{ $count === 0 ? 'active' : '' }}">

                                            @if(isset($image->image) && $image->image != null)
                                              <img src="{{ asset('uploads/collection/' . $image->image) }}" class="img-fluid" alt="Commercial Image {{ $count + 1 }}" width="auto" height="auto">
                                            @else
                                              <img src="{{asset('front-assets/images/commercial.webp')}}" class="img-fluid" alt="" width="auto" height="auto">
                                            @endif

                                            @php $count++; $imageFound = true; @endphp
                                        </div>
                                    @endif
                                @endforeach
                                @if(!$imageFound)
                                    <div class="carousel-item active">
                                       <img src="{{asset('front-assets/images/commercial.webp')}}" class="img-fluid" alt="" width="auto" height="auto">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @php $firstCommercial = false; @endphp
              
            @endforeach
        </div>
    </div>
    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
        <h2>{{ isset($commercial->comm_title) ? $commercial->comm_title : '' }}</h2>
        <h4>{{ isset($commercial->comm_sub_title) ? $commercial->comm_sub_title : '' }}</h4>
        <p>{{ isset($commercial->comm_description) ? $commercial->comm_description : '' }}</p>
        <ul class="nav nav-tabs">
            @php $firstTab = true; @endphp
            @foreach($Commcollections as $key => $collection)
                
                    <li data-bs-active="#commercial-{{ Str::slug($collection->title, '-') }}">
                <a data-bs-toggle="tab" href="#commercial-{{ Str::slug($collection->title, '-') }}" class="{{ $firstTab ? 'active' : '' }}">{{ isset($collection->title) ? $collection->title : '' }}</a>
            </li>
                    @php $firstTab = false; @endphp
           
            @endforeach
        </ul>
        <!-- <a class="blue-common-btn" href="{{ isset($commercial->comm_button_url) ? $commercial->comm_button_url : '' }}">{{ isset($commercial->comm_button_name) ? $commercial->comm_button_name : '' }}</a> -->
         <a class="blue-common-btn">{{ isset($commercial->comm_button_name) ? $commercial->comm_button_name : '' }}</a>
    </div>
</div>

<div class="row mobile-commercial-sec">
    <h2>{{ isset($commercial->comm_title) ? $commercial->comm_title : '' }}</h2>
    <h4>{{ isset($commercial->comm_sub_title) ? $commercial->comm_sub_title : '' }}</h4>
    <p>{{ isset($commercial->comm_description) ? $commercial->comm_description : '' }}</p>
    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="accordion" id="commercialAccordion">
            @php $firstMobileCommercial = true; @endphp
            @foreach($Commcollections as $key => $collection)
               
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="heading{{ $key }}">
                            <button type="button" class="accordion-button {{ $firstMobileCommercial ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="{{ $firstMobileCommercial ? 'true' : 'false' }}">
                                <span>{{ isset($collection->title) ? $collection->title : '' }}</span>
                            </button>
                        </h3>
                        <div id="collapse{{ $key }}" class="accordion-collapse collapse {{ $firstMobileCommercial ? 'show' : '' }}" aria-labelledby="heading{{ $key }}" data-bs-parent="#commercialAccordion">
                            <div class="card-body">
                                <div id="mobileCarousel{{ $key }}" class="carousel slide" data-bs-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @php $count = 0; @endphp
                                        @foreach($collectionImages as $index => $image)
                                            @if($image->collection_id == $collection->id)
                                                <li data-bs-target="#mobileCarousel{{ $key }}" data-bs-slide-to="{{ $count }}" class="{{ $count === 0 ? 'active' : '' }}"></li>
                                                @php $count++; @endphp
                                            @endif
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner what-offer-image">
                                        @php $count = 0; @endphp
                                        @php $imageFound = false; @endphp
                                        @foreach($collectionImages as $index => $image)
                                            @if($image->collection_id == $collection->id)
                                                <div class="carousel-item {{ $count === 0 ? 'active' : '' }}">
                                                    @if(isset($image->image) && $image->image != null)
                                                    <img src="{{ asset('uploads/collection/' . $image->image) }}" class="img-fluid" alt="Commercial Image {{ $count + 1 }}" width="auto" height="auto">
                                                    @else
                                                      <img src="{{asset('front-assets/images/commercial.webp')}}" class="img-fluid" alt="" width="auto" height="auto">
                                                    @endif
                                                </div>
                                                @php $count++; $imageFound = true; @endphp
                                            @endif
                                        @endforeach
                                        @if(!$imageFound)
                                            <div class="carousel-item active">
                                               <img src="{{asset('front-assets/images/commercial.webp')}}" class="img-fluid" alt="" width="auto" height="auto">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php $firstMobileCommercial = false; @endphp
              
            @endforeach
        </div>
        <!-- <a class="blue-common-btn" href="{{ isset($commercial->comm_button_url) ? $commercial->comm_button_url : '' }}">{{ isset($commercial->comm_button_name) ? $commercial->comm_button_name : '' }}</a> -->
         <a class="blue-common-btn" >{{ isset($commercial->comm_button_name) ? $commercial->comm_button_name : '' }}</a>
    </div>
</div>

   </div>
</section>