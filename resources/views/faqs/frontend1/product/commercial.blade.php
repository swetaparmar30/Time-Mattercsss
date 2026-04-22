
@extends('frontend.layouts.index')
@section('title') Commercial Garage Doors @endsection
@section('content')

<section class="inner-residential-commercial-banner-section residential-banner-section sandk-common">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2>Commercial Garage Doors</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="inner-residential-commercial-slider-section residential-banner-section sandk-common">
        <div id="residentialslider" class="carousel slide">
            @if(isset($banners) && count($banners) > 0)
            <div class="carousel-inner">
                @foreach($banners as $key => $banner)
                <div class="carousel-item @if($key == 0) active @endif">
                    <img src="{{isset($banner->banner_image) ? $banner->banner_image : ''}}" class="img-fluid" width="auto" height="auto" alt="residential banner">
                    <div class="slider-content commercial-content">
                        <div class="container-md">
                            <div class="row">
                                <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12">
                                    <h4>{{isset($banner->banner_title) ? $banner->banner_title : ''}}</h4>
                                    <h1>{{isset($banner->banner_subtitle) ? $banner->banner_subtitle : ''}}</h1>
                                    @php
                                    if(isset($banner->link_product) && $banner->link_product != '' && $banner->link_product != null)
                                    {
                                        $route = route('commercial.product_detail',['slug' => $banner->parent_cat_slug, 'slug2' => $banner->link_product]);

                                    }else if(isset($banner->link_sub_category) && $banner->link_sub_category != null && $banner->link_sub_category != '')
                                    {
                                        $route = route('commercial.products',['slug' => $banner->link_sub_category]);

                                    }else if(isset($banner->link_category) && $banner->link_category != null && $banner->link_category != '')
                                    {
                                        $route = route('commercial.products',['slug' => $banner->link_category]);
                                    }
                                    @endphp
                                    @if(isset($route) && $route != null && $route != '')
                                    <a href="{{ $route }}" class="common-btn com-banner-section">Learn More</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            @if(isset($banners) && count($banners) > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#residentialslider" data-bs-slide="prev">
                <img src="{{asset('front-assets/src/images/residential-images/residential-slider-left.png')}}" class="img-fluid" width="auto" height="auto" alt="residential arrow">
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#residentialslider" data-bs-slide="next">
                <img src="{{asset('front-assets/src/images/residential-images/residential-slider-right.png')}}" class="img-fluid" width="auto" height="auto" alt="residential arrow">
            </button>
            @endif
        </div>
    </section>

    @if(isset($result) &&  count($result) > 0)
        @foreach($result as $key=>$res)
            @php

                //echo "<pre>"; print_r($res); echo "</pre>";
            @endphp

            @if($key != 'High-Speed Doors')
                @if(($key == 'Sectional Doors' || $key == 'Rolling Doors' || $key == "Fire Doors and Operators" || $key == 'High-Speed Doors' || $key == 'Traffic Doors' || $key == 'Operators'))
                    @if(array_key_exists('category', $res) && array_key_exists('product', $res))
                        @if(count($res['product']) > 0 || count($res['subcategories']) > 0)

                            <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common">
                                <div class="container-md">
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">
                                            @if(isset($res['category']['title']) && $res['category']['title'] != '')
                                                <h2 class="series-title">{{$res['category']['title']}}</h2>
                                            @endif
                                            @if(isset($res['category']['description']) && $res['category']['description'] != '')
                                                <p>{{$res['category']['description']}}</p>
                                            @endif
                                        </div>
                                    </div>

                                    @if((isset($res['product']) && count($res['product']) > 0) || (isset($res['subcategories']) && count($res['subcategories']) > 0))
                                        @php

                                            if($res['category']['slug'] == 'commercial-high-speed-fabric-doors' || $res['category']['slug'] == 'commercial-sectional-garage-doors'){
                                            
                                                $prdctcat = $res['product'];
                                                $first[] = isset($res['subcategories'][0]) ? $res['subcategories'][0] : null;
                                                if(isset($first)){
                                                    unset($res['subcategories'][0]);
                                                }
                                                $subcat = $res['subcategories'];
                                                $farr = array_merge($prdctcat,$subcat);
                                                $ddpcount = array_merge($first,$farr);
                                         
                                            }elseif($key == 'High-Speed Doors'){
                                                $ddpcount = $res['subcategories'];
                                            }else{
                                                $ddpcount = array_merge($res['product'],$res['subcategories']);
                                            }

                                            $dlst = [];
                                          
                                            if(count($ddpcount)%2 != 0){
                                                $dlst = end($ddpcount);
                                                array_pop($ddpcount);
                                            } 
                                            
                           
                                        @endphp

                                        @if(count($ddpcount) > 0)
                                            <div class="row">
                                                @foreach($ddpcount as $dkey => $dval)
                                                    @if((isset($dval['categorytitle']) && $dval['categorytitle'] != '') || (isset($dval['list_title']) && $dval['list_title'] != ''))
                                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 commercial-category products-box-section">
                                                        <article>
                                                            @if(isset($dval['slug']))
                                                                @if(isset($dval['image']) && $dval['image'] != null && $dval['image'] != '')
                                                                <a href="{{route('commercial.products', [$dval['slug']])}}">
                                                                    <img src="{{$dval['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                                </a>
                                                                @endif

                                                                @if(isset($dval['categorytitle']))
                                                                    <h3><a href="{{route('commercial.products', [$dval['slug']])}}">{{ $dval['categorytitle'] }}</a></h3>
                                                                @endif

                                                                @if(isset($dval['categorysubtitle']))
                                                                    <h5>{{ $dval['categorysubtitle'] }}</h5>
                                                                @endif

                                                                @if(isset($dval['list_description']) && $dval['list_description'] != '' && $dval['list_description'] != null)
                                                                    <p>{!! $dval['list_description'] !!}</p>
                                                                @elseif(isset($dval['description']))
                                                                    <p>{!! $dval['description'] !!}</p>
                                                                @endif
                                                            @else
                                                                @if(isset($dval['list_image']) && $dval['list_image'] != null && $dval['list_image'] != '')
                                                                <a href="{{route('commercial.products', [$dval['product_slug']])}}">
                                                                    <img src="{{$dval['list_image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                                </a>
                                                                @endif

                                                                @if(isset($dval['list_title']))
                                                                    <h3><a href="{{route('commercial.products', [$dval['product_slug']])}}">{{ $dval['list_title'] }}</a></h3>
                                                                @endif

                                                                @if(isset($dval['list_subtitle']))
                                                                    <h5>{{ $dval['list_subtitle'] }}</h5>
                                                                @endif

                                                                @if(isset($dval['list_description']))
                                                                    <p>{{ $dval['list_description'] }}</p>
                                                                @endif

                                                                @if(isset($dval['list_bullet']) && count($dval['list_bullet']) > 0)
                                                                <ul>
                                                                    @foreach($dval['list_bullet'] as $bpoint)
                                                                        <li>{{$bpoint}}</li>
                                                                    @endforeach
                                                                </ul>
                                                                @endif
                                                            @endif
                                                            
                                                            <div class="learn-more-btn-sec">
                                                                @if(isset($dval['product_slug']))<a href="{{route('commercial.products', [$dval['product_slug']])}}" class="common-btn">Learn More</a>@endif
                                                                @if(isset($dval['slug']))<a href="{{route('commercial.products', [$dval['slug']])}}" class="common-btn">Learn More</a>@endif
                                                            </div>
                                                        </article>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif

                                        @if(isset($dlst))
                                            @if((isset($dlst['categorytitle']) && $dlst['categorytitle'] != '') || (isset($dlst['list_title']) && $dlst['list_title'] != ''))
                                                <div class="row row-reverse lst_section @if(count($ddpcount) == 0) h_div @endif">
                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section commercial-category products-full-box-section">
                                                        <article>
                                                        <div class="row">
                                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="full-box-sec">
                                                                    @if(isset($dlst['slug']))

                                                                        @if(isset($dlst['categorytitle']))
                                                                            <h3><a href="{{route('commercial.products', [$dlst['slug']])}}">{{ $dlst['categorytitle'] }}</a></h3>
                                                                        @endif

                                                                        @if(isset($dlst['categorysubtitle']))
                                                                            <h5>{{ $dlst['categorysubtitle'] }}</h5>
                                                                        @endif

                                                                        @if(isset($dlst['list_description']) && $dlst['list_description'] != '' && $dlst['list_description'] != null)
                                                                            <p>{!! $dlst['list_description'] !!}</p>
                                                                        @elseif(isset($dlst['description']))
                                                                            <p>{!! $dlst['description'] !!}</p>
                                                                        @endif
                                                                    @else
                                                                        @if(isset($dlst['list_title']))
                                                                            <h3><a href="{{route('commercial.products', [$dlst['product_slug']])}}">{{ $dlst['list_title'] }}</a></h3>
                                                                        @endif

                                                                        @if(isset($dlst['list_subtitle']))
                                                                            <h5>{{ $dlst['list_subtitle'] }}</h5>
                                                                        @endif

                                                                        @if(isset($dlst['list_description']))
                                                                            <p>{{ $dlst['list_description'] }}</p>
                                                                        @endif

                                                                        @if(isset($dlst['list_bullet']) && count($dlst['list_bullet']) > 0)
                                                                        <ul>
                                                                            @foreach($dlst['list_bullet'] as $bpoint)
                                                                                <li>{{$bpoint}}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                        @endif
                                                                    @endif
                                                                <div class="learn-more-btn-sec">
                                                                    @if(isset($dlst['product_slug']))<a href="{{route('commercial.products', [$dlst['product_slug']])}}" class="common-btn">Learn More</a>@endif
                                                                    @if(isset($dlst['slug']))<a href="{{route('commercial.products', [$dlst['slug']])}}" class="common-btn">Learn More</a>@endif
                                                                </div>
                                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                            @if(isset($dlst['slug']))
                                                                @if(isset($dlst['image']) && $dlst['image'] != null && $dlst['image'] != '')
                                                                <a href="{{route('commercial.products', [$dlst['slug']])}}" class="image-link">
                                                                    <img src="{{$dlst['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                                </a>
                                                                @endif
                                                            @else
                                                                @if(isset($dlst['list_image']) && $dlst['list_image'] != null && $dlst['list_image'] != '')
                                                                <a href="{{route('commercial.products', [$dlst['product_slug']])}}"  class="image-link">
                                                                    <img src="{{$dlst['list_image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                                </a>
                                                                @endif
                                                            @endif
                                        </div></div>
                                                        </article>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            </section>
                        @endif
                    @endif
                @endif
            @else
                @if(array_key_exists('category', $res) && array_key_exists('product', $res))
                @if(count($res['product']) > 0 || count($res['subcategories']) > 0)
                    <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common">
                        <div class="container-md">
                            <div class="row">
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">
                                    @if(isset($res['category']['title']) && $res['category']['title'] != '')
                                        <h2 class="series-title">{{$res['category']['title']}}</h2>
                                    @endif
                                    @if(isset($res['category']['description']) && $res['category']['description'] != '')
                                        <p>{{$res['category']['description']}}</p>
                                    @endif
                                </div>
                            </div>

                            @if((isset($res['product']) && count($res['product']) > 0) || (isset($res['subcategories']) && count($res['subcategories']) > 0))
                                        @php

                                            $ddpcount = array_merge($res['subcategories'],$res['product']);

                                            $dlst = [];
                                          
                                            if(count($ddpcount)%2 != 0){
                                                $dlst = end($ddpcount);
                                                array_pop($ddpcount);
                                            } 
                                            
                           
                                        @endphp

                                @if(count($ddpcount) > 0)
                                    <div class="row">
                                        @foreach($ddpcount as $dkey => $dval)
                                            @if((isset($dval['categorytitle']) && $dval['categorytitle'] != '') || (isset($dval['list_title']) && $dval['list_title'] != ''))
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 commercial-category products-box-section">
                                                <article>
                                                    @if(isset($dval['slug']))
                                                        @if(isset($dval['image']) && $dval['image'] != null && $dval['image'] != '')
                                                        <a href="{{route('commercial.products', [$dval['slug']])}}">
                                                            <img src="{{$dval['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                        </a>
                                                        @endif

                                                        @if(isset($dval['categorytitle']))
                                                            <h3><a href="{{route('commercial.products', [$dval['slug']])}}">{{ $dval['categorytitle'] }}</a></h3>
                                                        @endif

                                                        @if(isset($dval['categorysubtitle']))
                                                            <h5>{{ $dval['categorysubtitle'] }}</h5>
                                                        @endif

                                                        @if(isset($dval['list_description']) && $dval['list_description'] != '' && $dval['list_description'] != null)
                                                            <p>{!! $dval['list_description'] !!}</p>
                                                        @elseif(isset($dval['description']))
                                                            <p>{!! $dval['description'] !!}</p>
                                                        @endif
                                                    @else
                                                        @if(isset($dval['list_image']) && $dval['list_image'] != null && $dval['list_image'] != '')
                                                        <a href="{{route('commercial.products', [$dval['product_slug']])}}">
                                                            <img src="{{$dval['list_image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                        </a>
                                                        @endif

                                                        @if(isset($dval['list_title']))
                                                            <h3><a href="{{route('commercial.products', [$dval['product_slug']])}}">{{ $dval['list_title'] }}</a></h3>
                                                        @endif

                                                        @if(isset($dval['list_subtitle']))
                                                            <h5>{{ $dval['list_subtitle'] }}</h5>
                                                        @endif

                                                        @if(isset($dval['list_description']))
                                                            <p>{{ $dval['list_description'] }}</p>
                                                        @endif

                                                        @if(isset($dval['list_bullet']) && count($dval['list_bullet']) > 0)
                                                        <ul>
                                                            @foreach($dval['list_bullet'] as $bpoint)
                                                                <li>{{$bpoint}}</li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    @endif
                                                    
                                                    <div class="learn-more-btn-sec">
                                                        @if(isset($dval['product_slug']))<a href="{{route('commercial.products', [$dval['product_slug']])}}" class="common-btn">Learn More</a>@endif
                                                        @if(isset($dval['slug']))<a href="{{route('commercial.products', [$dval['slug']])}}" class="common-btn">Learn More</a>@endif
                                                    </div>
                                                </article>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif

                                @if(isset($dlst))
                                    @if((isset($dlst['categorytitle']) && $dlst['categorytitle'] != '') || (isset($dlst['list_title']) && $dlst['list_title'] != ''))
                                        <div class="row row-reverse lst_section @if(count($ddpcount) == 0) h_div @endif">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section commercial-category products-full-box-section">
                                                <article>
                                                <div class="row">
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div class="full-box-sec">
                                                            @if(isset($dlst['slug']))

                                                                @if(isset($dlst['categorytitle']))
                                                                    <h3><a href="">{{ $dlst['categorytitle'] }}</a></h3>
                                                                @endif

                                                                @if(isset($dlst['categorysubtitle']))
                                                                    <h5>{{ $dlst['categorysubtitle'] }}</h5>
                                                                @endif

                                                                @if(isset($dlst['list_description']) && $dlst['list_description'] != '' && $dlst['list_description'] != null)
                                                                    <p>{!! $dlst['list_description'] !!}</p>
                                                                @elseif(isset($dlst['description']))
                                                                    <p>{!! $dlst['description'] !!}</p>
                                                                @endif
                                                            @else
                                                                @if(isset($dlst['list_title']))
                                                                    <h3><a href="">{{ $dlst['list_title'] }}</a></h3>
                                                                @endif

                                                                @if(isset($dlst['list_subtitle']))
                                                                    <h5>{{ $dlst['list_subtitle'] }}</h5>
                                                                @endif

                                                                @if(isset($dlst['list_description']))
                                                                    <p>{{ $dlst['list_description'] }}</p>
                                                                @endif

                                                                @if(isset($dlst['list_bullet']) && count($dlst['list_bullet']) > 0)
                                                                <ul>
                                                                    @foreach($dlst['list_bullet'] as $bpoint)
                                                                        <li>{{$bpoint}}</li>
                                                                    @endforeach
                                                                </ul>
                                                                @endif
                                                            @endif
                                                        <div class="learn-more-btn-sec">
                                                            @if(isset($dlst['product_slug']))<a href="{{route('commercial.products', [$dlst['product_slug']])}}" class="common-btn">Learn More</a>@endif
                                                            @if(isset($dlst['slug']))<a href="{{route('commercial.products', [$dlst['slug']])}}" class="common-btn">Learn More</a>@endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    @if(isset($dlst['slug']))
                                                        @if(isset($dlst['image']) && $dlst['image'] != null && $dlst['image'] != '')
                                                        <a href="{{route('commercial.products', [$dlst['slug']])}}" class="image-link">
                                                            <img src="{{$dlst['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                        </a>
                                                        @endif
                                                    @else
                                                        @if(isset($dlst['list_image']) && $dlst['list_image'] != null && $dlst['list_image'] != '')
                                                        <a href="{{route('commercial.products', [$dlst['product_slug']])}}"  class="image-link">
                                                            <img src="{{$dlst['list_image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                        </a>
                                                        @endif
                                                    @endif
                                                </div>
                                                </div>
                                                </article>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        </div>
                    </section>
                @endif
            @endif

            @endif
        @endforeach
    @endif
    
    @include('frontend.includes.designs-sec')

    @include('frontend.includes.quote-sec')
    @if(count($client_logo) > 0)
        @include('frontend.includes.client-logo-sec')
    @endif

@endsection