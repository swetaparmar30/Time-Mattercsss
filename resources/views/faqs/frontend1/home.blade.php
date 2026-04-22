@extends('frontend.layouts.index')

@section('title')
Time Master Raynor Residential, Commercial Garage Doors
@endsection

@section('description')
Servicing all of Delmarva for over 60 years. 
@endsection

@section('content')

<?php $setting = App\Models\Setting::first(); ?>

@if(isset($banner->checked) && $banner->checked == 1)
    @include('frontend.includes.bannersection')
@endif

<div>
@if(isset($system_setting->checked) && $system_setting->checked == 1)
    @include('frontend.includes.systemsetting')
@endif

@if(isset($residential) && $residential->checked == 1)
    @include('frontend.includes.door-maintainance')
@endif
</div>

<div>
@if(isset($garage_door) && $garage_door->checked == 1)
    @include('frontend.includes.garagedoor')
@endif

@if(isset($calltoaction) && $calltoaction->checked == 1)
    @include('frontend.includes.calltoaction')
@endif
</div>

<div>
@if(isset($newgarage) && $newgarage->checked == 1)
    @include('frontend.includes.newgarage')
@endif

@if(isset($design) && $design->checked == 1)
    @include('frontend.includes.designs-sec')
@endif
</div>

<div>
@if(isset($quote) && $quote->checked == 1)
    @include('frontend.includes.quote-sec')
@endif

@if(isset($gallery) && $gallery->checked == 1)
    @include('frontend.includes.gallery-sec')
@endif
</div>

<div>
@if(isset($testimonial) && $gallery->checked == 1)
    @include('frontend.includes.testimonial')
@endif

@if(isset($areas) && $gallery->checked == 1)
    @include('frontend.includes.areas-sec')
@endif

@if($faqs && $faqs->checked == 1)
    @include('frontend.includes.faq-sec')
@endif

@if(count($client_logo) > 0)
    @include('frontend.includes.client-logo-sec')
@endif
</div>
@endsection