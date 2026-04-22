@extends('frontend.layouts.index')
@section('robots') noindex @endsection
@section('content')
{{-- <section class="about-sec common-text common-padding">
<div class="container-md">
<h1>Thank You</h1>
</div>
</section> --}}

<section class="banner-sec thank-sec common-text sandk-common-padding sandk-common" >
                <!-- Your existing banner content goes here -->
                <div class="banner-content-text">
                    <div class="container-md">
                        <div class="row align-items-center">
                            <div class="col-xxl-12 col-xl-12 col-lg-10 col-md-12 col-sm-12 col-12 banner-left-sec justify-content-center align-items-center">
                                <h2>Thank You for Your Inquiry</h2>
                                <p></p>
                                <a href="{{route('home')}}" class="common-btn common-btn" id="common-btn">BACK TO HOME</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection