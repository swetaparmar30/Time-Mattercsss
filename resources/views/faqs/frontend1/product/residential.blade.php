@extends('frontend.layouts.index')
@section('title') Residential Garage Doors @endsection
@section('content')

<section class="inner-residential-commercial-banner-section residential-banner-section sandk-common">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2>Residential Garage Doors</h2>
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
                    <div class="slider-content">
                        <div class="container-md">
                            <div class="row">
                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 banner_{{$key}}">
                                    <h4>{{isset($banner->banner_title) ? $banner->banner_title : ''}}</h4>
                                    <h1>{{isset($banner->banner_subtitle) ? $banner->banner_subtitle : ''}}</h1>
                                    @php
                                    if(isset($banner->link_product) && $banner->link_product != '' && $banner->link_product != null)
                                    {
                                        $route = route('residential.product_detail',['slug' => $banner->parent_cat_slug, 'slug2' => $banner->link_product]);

                                    }else if(isset($banner->link_sub_category) && $banner->link_sub_category != null && $banner->link_sub_category != '')
                                    {
                                        $route = route('residential.products',['slug' => $banner->link_sub_category]);

                                    }else if(isset($banner->link_category) && $banner->link_category != null && $banner->link_category != '')
                                    {
                                        $route = route('residential.products',['slug' => $banner->link_category]);
                                    }
                                    @endphp
                                    @if(isset($route) && $route != null && $route != '')
                                    <a href="{{ $route }}" class="common-btn">View Product</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('front-assets/src/images/residential-images/Residential-Garage-Doors-banner.webp')}}" class="img-fluid" width="auto" height="auto" alt="residential banner">
                    <div class="slider-content">
                        <div class="container-md">
                            <div class="row">
                                <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12">
                                    <h4>Aspen™ AP200</h4>
                                    <h1>Unbeatable Quality With The Most Design Options</h1>
                                    <a class="common-btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
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
        @if(array_key_exists('Distinctions Series', $result))
            <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common">
                <div class="container-md">
                    @if(isset($result['Distinctions Series']['category']))
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">
                            @if(isset($result['Distinctions Series']['category']['title']))
                                <h2>{{$result['Distinctions Series']['category']['title']}}</h2>
                            @endif
                            @if(isset($result['Distinctions Series']['category']['description']))
                                <p>{{$result['Distinctions Series']['category']['description']}}</p>
                            @endif
                        </div>
                    </div>
                    @endif

                    @if(isset($result['Distinctions Series']['product']) && count($result['Distinctions Series']['product']) > 0)
                        @php
                            $ddpcount = $result['Distinctions Series']['product'];
                            if(count($ddpcount)%2 != 0){
                                $dlst = end($ddpcount);
                                array_pop($ddpcount);
                            }
                        @endphp

                        @if(count($ddpcount) > 0)
                            <div class="row">
                                @foreach($ddpcount as $dkey => $dval)
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 products-box-section">
                                        <article>
                                            @if(isset($dval['list_image']) && $dval['list_image'] != null && $dval['list_image'] != '')
                                            <a href="{{route('residential.product_detail', [$result['Distinctions Series']['category']['slug'], $dval['product_slug']])}}">
                                                <img src="{{$dval['list_image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                            </a>
                                            @endif

                                            @if(isset($dval['list_title']))
                                                <h3><a href="{{route('residential.product_detail', [$result['Distinctions Series']['category']['slug'], $dval['product_slug']])}}">{{ $dval['list_title'] }}</a></h3>
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
                                            <div class="learn-more-btn-sec">
                                                <a href="{{route('residential.product_detail', [$result['Distinctions Series']['category']['slug'], $dval['product_slug']])}}" class="common-btn">Learn More</a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if(isset($dlst))
                        <div class="row row-reverse">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section products-full-box-section">
                                <article>
                                    <div class="row">
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="full-box-sec">
                                                @if(isset($dlst['list_title']))
                                                    <h3><a href="{{route('residential.product_detail', [$result['Distinctions Series']['category']['slug'], $dlst['product_slug']])}}">{{ $dlst['list_title'] }}</a></h3>
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
                                                <div class="learn-more-btn-sec">
                                                    <a href="{{route('residential.product_detail', [$result['Distinctions Series']['category']['slug'], $dlst['product_slug']])}}" class="common-btn">Learn More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            @if(isset($dlst['list_image']) && $dlst['list_image'] != null && $dlst['list_image'] != '')
                                            <a href="{{route('residential.product_detail', [$result['Distinctions Series']['category']['slug'], $dlst['product_slug']])}}" class="image-link">
                                                <img src="{{$dlst['list_image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    
                                </article>
                            </div>
                        </div>
                        @endif
                    @endif
                </div>
            </section>
        @endif

        @if(array_key_exists('Aspen Series', $result))
            <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common aspen-residential">
                <div class="container-md">
                    @if(isset($result['Aspen Series']['category']))
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">
                            @if(isset($result['Aspen Series']['category']['title']))
                                <h2>{{$result['Aspen Series']['category']['title']}}</h2>
                            @endif
                            @if(isset($result['Aspen Series']['category']['description']))
                                <p>{{$result['Aspen Series']['category']['description']}}</p>
                            @endif
                        </div>
                    </div>
                    @endif

                    @if(isset($result['Aspen Series']['product']) && count($result['Aspen Series']['product']) > 0)
                        @php
                            $adpcount = $result['Aspen Series']['product'];
                            if(count($adpcount)%2 != 0){
                                $alst = end($adpcount);
                                array_pop($adpcount);
                            }
                        @endphp

                        @if(count($adpcount) > 0)
                            <div class="row">
                                @foreach($adpcount as $dkey => $dval)
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 products-box-section">
                                        <article>
                                            @if(isset($dval['list_image']) && $dval['list_image'] != null && $dval['list_image'] != '')
                                            <a href="{{route('residential.product_detail', [$result['Aspen Series']['category']['slug'], $dval['product_slug']])}}">
                                                <img src="{{$dval['list_image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                            </a>
                                            @endif

                                            @if(isset($dval['list_title']))
                                                <h3><a href="{{route('residential.product_detail', [$result['Aspen Series']['category']['slug'], $dval['product_slug']])}}">{{ $dval['list_title'] }}</a></h3>
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
                                            <div class="learn-more-btn-sec">
                                                <a href="{{route('residential.product_detail', [$result['Aspen Series']['category']['slug'], $dval['product_slug']])}}" class="common-btn">Learn More</a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if(isset($alst))
                        <div class="row row-reverse">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section products-full-box-section">
                                <article>
                                <div class="row">
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="full-box-sec">
                                        @if(isset($alst['list_title']))
                                            <h3><a href="{{route('residential.product_detail', [$result['Aspen Series']['category']['slug'], $alst['product_slug']])}}">{{ $alst['list_title'] }}</a></h3>
                                        @endif

                                        @if(isset($alst['list_subtitle']))
                                            <h5>{{ $alst['list_subtitle'] }}</h5>
                                        @endif

                                        @if(isset($alst['list_description']))
                                            <p>{{ $alst['list_description'] }}</p>
                                        @endif
                                            
                                        @if(isset($alst['list_bullet']) && count($alst['list_bullet']) > 0)
                                            <ul>
                                                @foreach($alst['list_bullet'] as $bpoint)
                                                    <li>{{$bpoint}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <div class="learn-more-btn-sec">
                                            <a href="{{route('residential.product_detail', [$result['Aspen Series']['category']['slug'], $alst['product_slug']])}}" class="common-btn">Learn More</a>
                                        </div>
                                    </div>
                                 </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        @if(isset($alst['list_image']) && $alst['list_image'] != null && $alst['list_image'] != '')
                                            <a href="{{route('residential.product_detail', [$result['Aspen Series']['category']['slug'], $alst['product_slug']])}}" class="image-link">
                                                <img src="{{$alst['list_image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                            </a>
                                        @endif
                                    </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        @endif
                    @endif
                </div>
            </section>
        @endif

        @if(array_key_exists('Encore Series', $result))
            <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common sandk-inner-common residential-Polystyrene-steel-garage-door-section">
                <div class="container-md">
                    @if(isset($result['Encore Series']['category']))
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">
                            @if(isset($result['Encore Series']['category']['title']))
                                <h2>{{$result['Encore Series']['category']['title']}}</h2>
                            @endif
                            @if(isset($result['Encore Series']['category']['description']))
                                <p>{{$result['Encore Series']['category']['description']}}</p>
                            @endif
                        </div>
                    </div>
                    @endif

                    @if(isset($result['Encore Series']['product']) && count($result['Aspen Series']['product']) > 0)
                        @php
                            $edpcount = $result['Encore Series']['product'];
                            if(count($edpcount)%2 != 0){
                                $elst = end($edpcount);
                                array_pop($edpcount);
                            }
                        @endphp

                        @if(count($edpcount) > 0)
                            <div class="row">
                                @foreach($edpcount as $dkey => $dval)
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 products-box-section">
                                        <article>
                                            @if(isset($dval['list_image']) && $dval['list_image'] != null && $dval['list_image'] != '')
                                            <a href="{{route('residential.product_detail', [$result['Encore Series']['category']['slug'], $dval['product_slug']])}}">
                                                <img src="{{$dval['list_image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                            </a>
                                            @endif

                                            @if(isset($dval['list_title']))
                                                <h3><a href="{{route('residential.product_detail', [$result['Encore Series']['category']['slug'], $dval['product_slug']])}}">{{ $dval['list_title'] }}</a></h3>
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
                                            <div class="learn-more-btn-sec">
                                                <a href="{{route('residential.product_detail', [$result['Encore Series']['category']['slug'], $dval['product_slug']])}}" class="common-btn">Learn More</a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endif

                    @if(isset($elst))
                    <div class="row row-reverse">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section products-full-box-section">
                            <article>
                            <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="full-box-sec">
                                    @if(isset($elst['list_title']))
                                        <h3><a href="{{route('residential.product_detail', [$result['Encore Series']['category']['slug'], $elst['product_slug']])}}">{{ $elst['list_title']}}</a></h3>
                                    @endif

                                    @if(isset($elst['list_subtitle']))
                                        <h5>{{ $elst['list_subtitle'] }}</h5>
                                    @endif

                                    @if(isset($elst['list_description']))
                                        <p>{{ $elst['list_description'] }}</p>
                                    @endif
                                        
                                    @if(isset($elst['list_bullet']) && count($elst['list_bullet']) > 0)
                                        <ul>
                                            @foreach($elst['list_bullet'] as $bpoint)
                                                <li>{{$bpoint}}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <div class="learn-more-btn-sec">
                                        <a href="{{route('residential.product_detail', [$result['Encore Series']['category']['slug'], $elst['product_slug']])}}" class="common-btn">Learn More</a>
                                    </div>
                                </div>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                @if(isset($elst['list_image']) && $elst['list_image'] != null && $elst['list_image'] != '')
                                    <a href="{{route('residential.product_detail', [$result['Encore Series']['category']['slug'], $elst['product_slug']])}}" class="image-link">
                                        <img src="{{$elst['list_image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                    </a>
                                @endif
                                </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    @endif
                </div>
            </section>
        @endif

        @if(array_key_exists('Advantage Series', $result))
        <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common last-product-section advantage-series-sec">
            <div class="container-md">

                @if(isset($result['Advantage Series']['category']))
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">
                            @if(isset($result['Advantage Series']['category']['title']))
                                <h2>{{$result['Advantage Series']['category']['title']}}</h2>
                            @endif
                            @if(isset($result['Advantage Series']['category']['description']))
                                <p>{{$result['Advantage Series']['category']['description']}}</p>
                            @endif
                        </div>
                    </div>
                @endif
                
                @if(isset($result['Advantage Series']['product']) && count($result['Advantage Series']['product']) > 0)
                        @php
                            $addpcount = $result['Advantage Series']['product'];
                            if(count($addpcount)%2 != 0){
                                $adlst = end($addpcount);
                                array_pop($addpcount);
                            }
                        @endphp

                        @if(count($addpcount) > 0)
                            <div class="row">
                                @foreach($addpcount as $dkey => $dval)
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 products-box-section">
                                        <article>
                                            @if(isset($dval['list_image']) && $dval['list_image'] != null && $dval['list_image'] != '')
                                            <a href="{{route('residential.product_detail', [$result['Advantage Series']['category']['slug'], $dval['product_slug']])}}">
                                                <img src="{{$dval['list_image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                            </a>
                                            @endif

                                            @if(isset($dval['list_title']))
                                                <h3><a href="{{route('residential.product_detail', [$result['Advantage Series']['category']['slug'], $dval['product_slug']])}}">{{ $dval['list_title'] }}</a></h3>
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
                                            <div class="learn-more-btn-sec">
                                                <a href="{{route('residential.product_detail', [$result['Advantage Series']['category']['slug'], $dval['product_slug']])}}" class="common-btn">Learn More</a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if(isset($adlst))
                        <div class="row row-reverse">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section products-full-box-section">
                                <article>
                                <div class="row">
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="full-box-sec">
                                        @if(isset($adlst['list_title']))
                                            <h3><a href="{{route('residential.product_detail', [$result['Advantage Series']['category']['slug'], $adlst['product_slug']])}}">{{ $adlst['list_title'] }}</a></h3>
                                        @endif

                                        @if(isset($adlst['list_subtitle']))
                                            <h5>{{ $adlst['list_subtitle'] }}</h5>
                                        @endif

                                        @if(isset($adlst['list_description']))
                                            <p>{{ $adlst['list_description'] }}</p>
                                        @endif
                                            
                                        @if(isset($adlst['list_bullet']) && count($adlst['list_bullet']) > 0)
                                            <ul>
                                                @foreach($adlst['list_bullet'] as $bpoint)
                                                    <li>{{$bpoint}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <div class="learn-more-btn-sec">
                                            <a href="{{route('residential.product_detail', [$result['Advantage Series']['category']['slug'], $adlst['product_slug']])}}" class="common-btn">Learn More</a>
                                        </div>
                                    </div>
                                    </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    @if(isset($adlst['list_image']) && $adlst['list_image'] != null && $adlst['list_image'] != '')
                                        <a href="{{route('residential.product_detail', [$result['Advantage Series']['category']['slug'], $adlst['product_slug']])}}" class="image-link">
                                            <img src="{{$adlst['list_image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                        </a>
                                    @endif
                                    </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        @endif
                    @endif
            </div>
        </section>
        @endif

    @endif
    
    @include('frontend.includes.designs-sec')
    
    <section class="sandk-common sandk-common-padding residential-garage-door-openers-section">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <h2>Residential Garage Door Openers</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 left-side">
                    <img src="{{asset('front-assets/src/images/residential-images/residential-garage-door-openers.png')}}" width="auto" height="auto" alt="Residential Garage Door Openers" class="img-fluid">
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 right-side">
                    <h3>Automatic Garage Door Openers</h3>
                    <p>Raynor’s full line of residential garage door openers offer a broad selection of performance, features, and durability. All models offer the ultimate in garage door opener safety and security. This product line is available in a variety of horsepower levels and drive systems, as well as wall-mounted jackshaft door operators and battery backup systems. myQ™ technology enables you to securely monitor and control your garage door opener with your smartphone, tablet or computer.</p>
                    <div class="learn-more-btn-sec">
                        <a href="{{route('residential.products', ['openers'])}}" class="common-btn">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.includes.quote-sec')
    @if(count($client_logo) > 0)
        @include('frontend.includes.client-logo-sec')
    @endif

@endsection