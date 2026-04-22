
@extends('frontend.layouts.index')
@if(isset($result[0]['subcategory'][0]['categorytitle']) && $result[0]['subcategory'][0]['categorytitle'] != '' && $result[0]['subcategory'][0]['categorytitle'] != null)
@section('title') {{$result[0]['subcategory'][0]['categorytitle']}} @endsection
@endif
@section('content')

    @if(isset($result) &&  count($result) > 0)
        @foreach($result as $key=>$res)
            @php
                //echo "<pre>"; print_r($res); echo "</pre>";
            @endphp
            @if(array_key_exists('subcategory', $res))
            
                <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common">
                    <div class="container-md">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">

                                
                                    @if(isset($res['subcategory'][0]['categorytitle']) && $res['subcategory'][0]['categorytitle'] != '')
                                        <h2 class="series-title">{{$res['subcategory'][0]['categorytitle']}}</h2>
                                    @endif
                                    @if(isset($res['subcategory'][0]['categorysubtitle']) && $res['subcategory'][0]['categorysubtitle'] != '')
                                        <h5 class="series-subtitle">{{$res['subcategory'][0]['categorysubtitle']}}</h5>
                                    @endif
                                    @if(isset($res['subcategory'][0]['description']) && $res['subcategory'][0]['description'] != '')
                                        <p>{!!$res['subcategory'][0]['description']!!}</p>
                                    @endif
                             
                               
                            </div>
                        </div>

                        @if((isset($res['product']) && count($res['product']) > 0))
                            @php
                                $ddpcount = $res['product'];
                                if(count($ddpcount)%2 != 0){
                                    $dlst = end($ddpcount);
                                    array_pop($ddpcount);
                                } 
                            @endphp

                            @if(count($ddpcount) > 0)
                                <div class="row">
                                    @foreach($ddpcount as $dkey => $dval)
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 commercial-category products-box-section">
                                            <article>
                                                @if(isset($dval['list_image']) && $dval['list_image'] != null && $dval['list_image'] != '')
                                                <a href="{{ route('commercial.product_detail', [$res['category'], $dval['product_slug']]) }}">
                                                    <img src="{{ $dval['list_image'] }}" width="auto" height="auto" class="img-fluid" alt="">
                                                </a>
                                                @endif

                                                @if(isset($dval['list_title']))
                                                    <h3><a href="{{ route('commercial.product_detail', [$res['category'], $dval['product_slug']]) }}">{{ $dval['list_title'] }}</a></h3>
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
                                                    <a href="{{ route('commercial.product_detail', [$res['category'], $dval['product_slug']]) }}" class="common-btn">Learn More</a>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @if(isset($dlst))
                            <div class="row row-reverse">
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section commercial-category products-full-box-section">
                                    <article>
                                        <div class="row">
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div class="full-box-sec">
                                                    @if(isset($dlst['list_title']))
                                                        <h3><a href="{{route('commercial.product_detail', [$res['category'], $dlst['product_slug']])}}">{{ $dlst['list_title'] }}</a></h3>
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
                                                        <a href="{{route('commercial.product_detail', [$res['category'], $dlst['product_slug']])}}" class="common-btn">Learn More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                @if(isset($dlst['list_image']) && $dlst['list_image'] != null && $dlst['list_image'] != '')
                                                <a href="{{route('commercial.product_detail', [$res['category'], $dlst['product_slug']])}}" class="image-link">
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
        @endforeach
    @endif
    
    @include('frontend.includes.designs-sec')
    

    @include('frontend.includes.quote-sec')
    @if(count($client_logo) > 0)
        @include('frontend.includes.client-logo-sec')
    @endif

@endsection