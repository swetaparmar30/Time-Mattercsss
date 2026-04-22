@extends('frontend.layouts.index')
@section('content')

<section class="product-banner-section residential-banner-section common-prodoor-padding common-prodoor ">
<div class="container-fluid">
    <div class="row desktop-product-banner-sec align-items-center">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-side">
            <h4 class="mobile-heading">{{ isset($collection->title) ? $collection->title : '' }}</h4>
            <h2 class="mobile-heading">{{ isset($collection->sub_title) ? $collection->sub_title : '' }}</h2>
           
            <div id="ribbedCarousel" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($collectionImages as $index => $image)
                        <li data-bs-target="#ribbedCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @php $imageFound = false; @endphp
                    @foreach($collectionImages as $index => $img)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            @if(isset($img->image) && $img->image != null)
                            <img src="{{ asset('uploads/collection/' . $img->image) }}" class="img-fluid" loading="lazy" alt="" width="auto" height="auto">
                            @else
                            <img src="{{asset('front-assets/images/product-img.png')}}" class="img-fluid"  loading="lazy" alt="" width="auto" height="auto">
                            @endif
                            @php $imageFound = true; @endphp
                    </div>
                    @endforeach
                    @if(!$imageFound)
                        <div class="carousel-item active">
                             <img src="{{asset('front-assets/images/product-img.png')}}" class="img-fluid"  loading="lazy" alt="" width="auto" height="auto">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
            <h4>{{ isset($collection->title) ? $collection->title : '' }}</h4>
            <h2>{{ isset($collection->sub_title) ? $collection->sub_title : '' }}</h2>
            <p>{{ isset($collection->short_description) ? $collection->short_description : '' }}</p>
            <a class="blue-common-btn" href="{{ isset($collection->button_url) ? $collection->button_url : '' }}">{{ isset($collection->button_name) ? $collection->button_name : '' }}</a>
        </div>
    </div>
</div>
</section>

<!-- Door Selection -->
@if(count($doorSelection) > 0)
@include('frontend.product.door-selection')
@endif

<!-- Design Section -->
<section class="designs-and-build-section common-prodoor-padding common-prodoor designs-and-build-section-for-product-page">
   <div class="container-md">
      <div class="row align-items-center">
         <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-sm-12 col-xs-12 left-side">
            <h2>{{ isset($design->design_title) ? $design->design_title : '' }}</h2>
            @if(isset($design->design_sub_title) && $design->design_sub_title != null)
            {!! html_entity_decode($design->design_sub_title) !!}
            @endif
            <a class="blue-common-btn" href="{{ isset($design->design_button_url) ? $design->design_button_url : '' }}">{{ isset($design->design_button_name) ? $design->design_button_name : '' }}</a>
         </div>
         <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-7 col-sm-12 col-xs-12 right-side">
            @if(isset($design->design_img) && $design->design_img != null)
            @php
            $img = App\Models\MediaImage::select('name')->where('id', $design->design_img)->first();
            @endphp
            <img src="{{ asset('uploads/'.$img->name) }}" class="img-fluid" loading="lazy" width="1110" height="613" alt="{{ isset($design->design_title) ? $design->design_title : 'ProDoor' }}">
            @else
            <img src="{{asset('front-assets/images/designs-and-build-right.webp')}}" loading="lazy" class="img-fluid" alt="" width="1110"
               height="613">
            @endif
         </div>
      </div>
   </div>
</section>

@include('frontend.includes.location-sec')

@include('frontend.includes.form-sec')

@include('frontend.includes.client-logo-sec')

@endsection