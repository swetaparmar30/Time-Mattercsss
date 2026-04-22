@extends('frontend.layouts.index')
@if(isset($page->meta_title) && $page->meta_title != '')
    @section('title') {{$page->meta_title}} @endsection

@endif

@if(isset($page->meta_keyword) && $page->meta_keyword != '')

    @section('meta-keywords') {{$page->meta_keyword}} @endsection

@endif

@if(isset($page->meta_description) && $page->meta_description != '')

    @section('meta-description') {{$page->meta_description}} @endsection

@endif
@section('content')
 <!--------------------- Header ----------------------->


        <section class="testimonials-banner-sec common-text common-padding">
            <div class="container-md">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 photo-gallery-content">
                        <h4 class="petit-text">What Our Happy Couples Say</h4>
                        <h1>Testimonials</h1>
                    </div>
                </div>
            </div>
        </section>
        <!--------------------- Photo Gallery Banner Section ----------------------->


        <section class="testimonial-sec review-sec common-text common-padding">
            <div class="container-md">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 review-content">
                        <div class="physicianList">
                        <input type='hidden' id='current_page' />
                        <input type='hidden' id='show_per_page' />
                       
                                        

                                    @if(isset($testi_list) && count($testi_list))
                                    @foreach($testi_list as $testi_lists)
                                     <ul id="pagingBox">
                            <li>
                                <div class="physicianBox d-flex align-items-center">
                                    <div class="row align-items-center">
                                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 mb-5">
                                    <div class="name-letter">
                                        <!-- <img src="./src/images/j-letter-img.webp" class="img-fluid" alt=""> -->
                                         @if(isset($testi_lists->img) && $testi_lists->img != null && $testi_lists->img != '')

                                        @php

                                        $img_1 = App\Models\MediaImage::select('name')->where('id', $testi_lists->img)->first();

                                        @endphp

                                        <img src="{{ asset('uploads/'.$img_1->name) }}" class="img-fluid" alt="">

                                        @else

                                        <span class="slider_name_span">

                                            @if(isset($testi_lists->name))

                                                {{ substr($testi_lists->name, 0, 1) }}

                                            @endif

                                        </span>

                                        @endif
                                    </div>
                                    </div>
                                    <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 mb-5 testimonial-content">

                                    <div class="client-details">
                                        <div class="client-comment">
                                            <!-- <span class="star-icon"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> -->

                                     @for($i = 1; $i <= 5; $i++)

                                        @if($i <= $testi_lists->rating)

                                            <i class="fa fa-star" style="color: #E4B513;font-size: 30px;    margin-right: 10px;"></i>

                                        @else

                                            <i class="fa fa-star" style="color: #f0f0f0;font-size: 30px;    margin-right: 10px;"></i>

                                        @endif

                                    @endfor
                                            <!-- <p>{{isset($testi_lists->content) ? $testi_lists->content : ''}}</p> -->


                                            @if(isset($testi_lists->content) && $testi_lists->content != null)

                                              {!! html_entity_decode(preg_replace('/<br\s?\/?>/i', '', $testi_lists->content)) !!}

                                              @endif

                                        </div>
                                        
                                    </div>
                                    </div>
                                         </div>
                                </div>
                            </li>
                            </ul>
                                    @endforeach


                                    @endif
                                   <!--  <div class="name-letter">
                                        <img src="./src/images/j-letter-img.webp" class="img-fluid" alt="">
                                    </div>
                                    <div class="client-details">
                                        <div class="client-comment">
                                            <span class="star-icon"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
                                            <p>“It was a very special day, especially as my Dad performed our Wedding Ceremony. Both Jelena and I were very happy he was able to do it. It was his first and he did a wonderful job, in spite of the thunderstorms.”</p>
                                        </div>
                                        <div class="name-details">
                                            <h5>Jelena and Jesse</h5>
                                            <p>@ Jelena and Jesse . 4 months <img src="./src/images/google.webp" class="img-fluid" alt=""></p>
                                        </div>
                                    </div> -->

                           <!--  <li>
                                <div class="physicianBox d-flex align-items-center">
                                    <div class="name-letter">
                                        <img src="./src/images/j-letter-img.webp" class="img-fluid" alt="">
                                    </div>
                                    <div class="client-details">
                                        <div class="client-comment">
                                            <span class="star-icon"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
                                            <p>“It was a very special day, especially as my Dad performed our Wedding Ceremony. Both Jelena and I were very happy he was able to do it. It was his first and he did a wonderful job, in spite of the thunderstorms.”</p>
                                        </div>
                                        <div class="name-details">
                                            <h5>Jelena and Jesse1</h5>
                                            <p>@ Jelena and Jesse . 4 months <img src="./src/images/google.webp" class="img-fluid" alt=""></p>
                                        </div>
                                    </div>
                                </div>
                            </li> -->
                           <!--  <li>
                                <div class="physicianBox d-flex align-items-center">
                                    <div class="name-letter">
                                        <img src="./src/images/j-letter-img.webp" class="img-fluid" alt="">
                                    </div>
                                    <div class="client-details">
                                        <div class="client-comment">
                                            <span class="star-icon"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
                                            <p>“It was a very special day, especially as my Dad performed our Wedding Ceremony. Both Jelena and I were very happy he was able to do it. It was his first and he did a wonderful job, in spite of the thunderstorms.”</p>
                                        </div>
                                        <div class="name-details">
                                            <h5>Jelena and Jesse2</h5>
                                            <p>@ Jelena and Jesse . 4 months <img src="./src/images/google.webp" class="img-fluid" alt=""></p>
                                        </div>
                                    </div>
                                </div>
                            </li> -->
                        
                        </div>

                       {!! $testi_list->links() !!}
                    <!-- <div id='page_navigation'></div> -->

                    </div>
                </div>
            </div>
        </section>


@endsection