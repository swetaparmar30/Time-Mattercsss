@extends('frontend.layouts.index')
@section('content')

    @if(isset($result) &&  count($result) > 0)
        @foreach($result as $key=>$res)
            @php
                //echo "<pre>"; print_r($res); echo "</pre>";
            @endphp
            @if(array_key_exists('category', $res))
                <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common">
                    <div class="container-md">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">
                                @if(isset($res['category']['title']) && $res['category']['title'] != '')
                                    <h2>{{$res['category']['title']}}</h2>
                                @endif
                                @if(isset($res['category']['description']) && $res['category']['description'] != '')
                                    <p>{{$res['category']['description']}}</p>
                                @endif
                            </div>
                        </div>

                        @if((isset($res['product']) && count($res['product']) > 0) || (isset($res['subcategories']) && count($res['subcategories']) > 0))
                            @php
                                $ddpcount = array_merge($res['product'],$res['subcategories']);
                                if(count($ddpcount)%2 != 0){
                                    $dlst = end($ddpcount);
                                    array_pop($ddpcount);
                                } 
                            @endphp

                            @if(count($ddpcount) > 0)
                                <div class="row">
                                    @foreach($ddpcount as $dkey => $dval)
                                        @if((isset($dval->categorytitle) && $dval->categorytitle != '') || (isset($dval->list_title) && $dval->list_title != ''))
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 products-box-section">
                                                <article>
                                                    @if(isset($dval->slug))
                                                        @if(isset($dval->image) && $dval->image != null && $dval->image != '')
                                                        <a href="{{route('commercial.products', [$dval->slug])}}">
                                                            <img src="{{$dval->image}}" width="auto" height="auto" class="img-fluid" alt="">
                                                        </a>
                                                        @endif

                                                        @if(isset($dval->categorytitle))
                                                            <h3><a href="{{route('commercial.products', [$dval->slug])}}">{{ $dval->categorytitle }}</a></h3>
                                                        @endif

                                                        @if(isset($dval->categorysubtitle))
                                                            <h5>{{ $dval->categorysubtitle }}</h5>
                                                        @endif

                                                        @if(isset($dval->description))
                                                            <p>{{ $dval->description }}</p>
                                                        @endif
                                                    @else
                                                        @if(isset($dval->list_image) && $dval->list_image != null && $dval->list_image != '')
                                                        <a href="{{route('commercial.products', [$dval->product_slug])}}">
                                                            <img src="{{$dval->list_image}}" width="auto" height="auto" class="img-fluid" alt="">
                                                        </a>
                                                        @endif

                                                        @if(isset($dval->list_title))
                                                            <h3><a href="{{route('commercial.products', [$dval->product_slug])}}">{{ $dval->list_title }}</a></h3>
                                                        @endif

                                                        @if(isset($dval->list_subtitle))
                                                            <h5>{{ $dval->list_subtitle }}</h5>
                                                        @endif

                                                        @if(isset($dval->list_description))
                                                            <p>{{ $dval->list_description }}</p>
                                                        @endif

                                                        @if(isset($dval->list_bullet) && count($dval->list_bullet) > 0)
                                                        <ul>
                                                            @foreach($dval->list_bullet as $bpoint)
                                                                <li>{{$bpoint}}</li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    @endif
                                                    
                                                    <div class="learn-more-btn-sec">
                                                        @if(isset($dval->product_slug))<a href="{{route('commercial.products', [$dval->product_slug])}}" class="common-btn">Learn More</a>@endif
                                                        @if(isset($dval->slug))<a href="{{route('commercial.products', [$dval->slug])}}" class="common-btn">Learn More</a>@endif
                                                    </div>
                                                </article>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif

                            @if(isset($dlst))
                                @if((isset($dlst->categorytitle) && $dlst->categorytitle != '') || (isset($dlst->list_title) && $dlst->list_title != ''))
                                    <div class="row row-reverse lst_section">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section products-full-box-section">
                                            <article>
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="full-box-sec">
                                                        @if(isset($dlst->slug))

                                                            @if(isset($dlst->categorytitle))
                                                                <h3><a href="">{{ $dlst->categorytitle }}</a></h3>
                                                            @endif

                                                            @if(isset($dlst->categorysubtitle))
                                                                <h5>{{ $dlst->categorysubtitle }}</h5>
                                                            @endif

                                                            @if(isset($dlst->description))
                                                                <p>{{ $dlst->description }}</p>
                                                            @endif
                                                        @else
                                                            @if(isset($dlst->list_title))
                                                                <h3><a href="">{{ $dlst->list_title }}</a></h3>
                                                            @endif

                                                            @if(isset($dlst->list_subtitle))
                                                                <h5>{{ $dlst->list_subtitle }}</h5>
                                                            @endif

                                                            @if(isset($dlst->list_description))
                                                                <p>{{ $dlst->list_description }}</p>
                                                            @endif

                                                            @if(isset($dlst->list_bullet) && count($dlst->list_bullet) > 0)
                                                            <ul>
                                                                @foreach($dlst->list_bullet as $bpoint)
                                                                    <li>{{$bpoint}}</li>
                                                                @endforeach
                                                            </ul>
                                                            @endif
                                                        @endif
                                                    <div class="learn-more-btn-sec">
                                                        @if(isset($dlst->product_slug))<a href="{{route('commercial.products', [$dlst->product_slug])}}" class="common-btn">Learn More</a>@endif
                                                        @if(isset($dlst->slug))<a href="{{route('commercial.products', [$dlst->slug])}}" class="common-btn">Learn More</a>@endif
                                                    </div>
                                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                @if(isset($dlst->slug))
                                                    @if(isset($dlst->image) && $dlst->image != null && $dlst->image != '')
                                                    <a href="" class="image-link">
                                                        <img src="{{$dlst->image}}" width="auto" height="auto" class="img-fluid" alt="">
                                                    </a>
                                                    @endif
                                                @else
                                                    @if(isset($dlst->list_image) && $dlst->list_image != null && $dlst->list_image != '')
                                                    <a href="" class="image-link">
                                                        <img src="{{$dlst->list_image}}" width="auto" height="auto" class="img-fluid" alt="">
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
        @endforeach
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
                    <p>Raynor’s full line of residential garage door openers offers a broad selection of performance, features, and durability. All models offer the ultimate in garage door opener safety and security features, are available in a variety of horsepower levels and drive systems, as well as wall-mounted jackshaft door operators and battery backup systems. myQ™ technology enables you to securely monitor and control your garage door opener with your smartphone, tablet or computer.</p>
                    <div class="learn-more-btn-sec">
                        <a href="#" class="common-btn">Learn More</a>
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