@extends('frontend.layouts.index')
@section('content')
 <section class="photo-gallery-banner-sec common-text common-padding">
            <div class="container-md">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 photo-gallery-content">
                        <h4 class="petit-text">Captured Moments</h4>
                        <h1>Photo Gallery</h1>
                    </div>
                </div>
            </div>
        </section>
        <!--------------------- Photo Gallery Banner Section ----------------------->
        <section class="photo-gallery common-padding common-text text-center">
            <div class="container-md">
                <div class="row popup-gallery-tab">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 tab-sec">
                        <ul id="details-tab-item" class="details-tab-items">
                            <li><a href="#all">All</a></li>
                            <li><a href="#wedding_ceremonies">Wedding ceremonies</a></li>
                            <li><a href="#happy_snaps">Happy snaps</a></li>
                            <li><a href="#venues">venues</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row popup-gallery details-tab-details" id="all">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-1.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-1.webp')}}" /> 
                                </a>
                            </div>                
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center">
                        <figure>     
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-2.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-2.webp')}}" /> 
                                </a>
                            </div>
                        </figure>                         
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-3.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-3.webp')}}" /> 
                                </a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-4.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-4.webp')}}" /> 
                                </a>
                            </div>                
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>     
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-5.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-5.webp')}}" /> 
                                </a>
                            </div>
                        </figure>                         
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-6.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-6.webp')}}" /> 
                                </a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-7.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-7.webp')}}" /> 
                                </a>
                            </div>                
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>     
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-8.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-8.webp')}}" /> 
                                </a>
                            </div>
                        </figure>                         
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-9.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-9.webp')}}" /> 
                                </a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-10.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-10.webp')}}" /> 
                                </a>
                            </div>                
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>     
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-11.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-11.webp')}}" /> 
                                </a>
                            </div>
                        </figure>                         
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-12.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-12.webp')}}" /> 
                                </a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-13.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-13.webp')}}" /> 
                                </a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets//src/images/photo-gallery-14.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets//src/images/photo-gallery-14.webp')}}" /> 
                                </a>
                            </div>                
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>     
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-15.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-15.webp')}}" /> 
                                </a>
                            </div>
                        </figure>                         
                    </div>
                    
                </div>

                

                <div class="row popup-gallery details-tab-details" id="wedding_ceremonies">
                    
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-3.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-3.webp')}}" /> 
                                </a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-4.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-4.webp')}}" /> 
                                </a>
                            </div>                
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center">
                        <figure>     
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-5.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-5.webp')}}" /> 
                                </a>
                            </div>
                        </figure>                         
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-6.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-6.webp')}}" /> 
                                </a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-7.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-7.webp')}}" /> 
                                </a>
                            </div>                
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>     
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-8.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-8.webp')}}" /> 
                                </a>
                            </div>
                        </figure>                         
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-9.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-9.webp')}}" /> 
                                </a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-10.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-10.webp')}}" /> 
                                </a>
                            </div>                
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>     
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-11.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-11.webp')}}" /> 
                                </a>
                            </div>
                        </figure>                         
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-12.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-12.webp')}}" /> 
                                </a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-13.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-13.webp')}}" /> 
                                </a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-14.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-14.webp')}}" /> 
                                </a>
                            </div>                
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>     
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-15.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-15.webp')}}" /> 
                                </a>
                            </div>
                        </figure>                         
                    </div>
                    
                </div>

                <div class="row popup-gallery details-tab-details" id="happy_snaps">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-1.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-1.webp')}}" /> 
                                </a>
                            </div>                
                        </figure>
                    </div>
                    
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-4.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-4.webp')}}" /> 
                                </a>
                            </div>                
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center">
                        <figure>     
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-5.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-5.webp')}}" /> 
                                </a>
                            </div>
                        </figure>                         
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-6.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-6.webp')}}" /> 
                                </a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-7.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-7.webp')}}" /> 
                                </a>
                            </div>                
                        </figure>
                    </div>
                    
                </div>

                <div class="row popup-gallery details-tab-details" id="venues">
                    
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-4.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-4.webp')}}" /> 
                                </a>
                            </div>                
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center">
                        <figure>     
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-5.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-5.webp')}}" /> 
                                </a>
                            </div>
                        </figure>                         
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-6.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-6.webp')}}" /> 
                                </a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-7.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-7.webp')}}" /> 
                                </a>
                            </div>                
                        </figure>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center img-top-padding">
                        <figure>     
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{asset('assets/src/images/photo-gallery-8.webp')}}" title="" class="a">
                                    <img class="img-fluid" src="{{asset('assets/src/images/photo-gallery-8.webp')}}" /> 
                                </a>
                            </div>
                        </figure>                         
                    </div>
                    
                </div>

                
                <a href="" class="common-btn text-center">Load More</a>
            </div>
        </section>
       
        <!---------------------  Our Gallery ----------------------->
@endsection