@extends('frontend.layouts.index')

@section('content')
{{-- <section class="about-sec common-text common-padding">
<div class="container-md">
<h1>404 Page not Found</h1>
</div>
</section> --}}
<style>

</style>
<section class="banner-sec thank-sec common-text sandk-common-padding sandk-common error-page" style="background-image: url({{ asset('front-assets/src/images/residential-images/Residential-Garage-Doors-banner.webp') }});">
                <!-- Your existing banner content goes here -->
                <div class="banner-content-text">
                    <div class="container-md">
                        <div class="row align-items-center">
                            <div class="col-xxl-7 col-xl-7 col-lg-10 col-md-12 col-sm-12 col-12 banner-left-sec justify-content-center align-items-center">
                                <h2 class="desktop-heading">404 Page not found</h2>
                                <h2 class="mobile-heading">404 Page <br>not found</h2>
                                <p>The page you are looking for might have been removed had it’s name Changed or is temporarily unavailable.</p>
                                <a href="{{route('home')}}" class="common-btn common-btn" id="common-btn">BACK TO HOME</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection