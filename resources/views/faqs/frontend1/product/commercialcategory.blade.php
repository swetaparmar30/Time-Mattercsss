
@extends('frontend.layouts.index')
@php
$topLevelKey = array_key_first($result);
@endphp
@if(isset($result[$topLevelKey]['category']['title']) && $result[$topLevelKey]['category']['title'] != '' && $result[$topLevelKey]['category']['title'] != null)
@section('title') {{$result[$topLevelKey]['category']['title']}} @endsection
@endif
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
                                    <p>{!! $res['category']['description'] !!}</p>
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
                         
                            }else{
                                $ddpcount = array_merge($res['product'],$res['subcategories']);
                            }
                                
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
                                                @if(isset($dval['slug']))
                                                    @if(isset($dval['image']) && $dval['image'] != null && $dval['image'] != '')
                                                        @if($dval['link_category'] != null || $dval['link_category'] != '')
                                                            <a href="{{route('commercial.products', [$dval['link_category']])}}">
                                                                <img src="{{$dval['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                            </a>
                                                        @elseif($dval['link_sub_category'] != null || $dval['link_sub_category'] != '')
                                                            <a href="{{route('commercial.products', [$dval['link_sub_category']])}}">
                                                                <img src="{{$dval['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                            </a>
                                                        @else
                                                            <a href="{{route('commercial.products', [$dval['slug']])}}">
                                                                <img src="{{$dval['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                            </a>
                                                        @endif
                                                    @endif

                                                    @if(isset($dval['title']))

                                                        @if($dval['link_category'] != null || $dval['link_category'] != '')
                                                            <h3><a href="{{route('commercial.products', [$dval['link_category']])}}">{{ $dval['title'] }}</a></h3>
                                                        @elseif($dval['link_sub_category'] != null || $dval['link_sub_category'] != '')
                                                            <h3><a href="{{route('commercial.products', [$dval['link_sub_category']])}}">{{ $dval['title'] }}</a></h3>
                                                        @else
                                                            <h3><a href="{{route('commercial.products', [$dval['slug']])}}">{{ $dval['title'] }}</a></h3>
                                                        @endif
                                                    @endif

                                                    @if(isset($dval['list_subtitle']) && $dval['list_subtitle'] != '' && $dval['list_subtitle'] != null)
                                                        <h5>{{ $dval['list_subtitle'] }}</h5>
                                                    @elseif(isset($dval['categorysubtitle']))
                                                        <h5>{{ $dval['categorysubtitle'] }}</h5>
                                                    @endif

                                                    @if(isset($dval['list_description']) && $dval['list_description'] != '' && $dval['list_description'] != null)
                                                        <p>{!! $dval['list_description'] !!}</p>
                                                    @elseif(isset($dval['description']))
                                                        <p>{!! $dval['description'] !!}</p>
                                                    @endif

                                                    @if(isset($dval['bullet']))
                                                        @php
                                                            $bul = explode(',',$dval['bullet']);
                                                        @endphp
                                                        @if(isset($bul) && count($bul) > 0)
                                                        <ul>
                                                            @foreach($bul as $bpoint)
                                                                <li>{{$bpoint}}</li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    @endif
                                                @else

                                                    @if(isset($dval['list_image']) && $dval['list_image'] != null && $dval['list_image'] != '')
                                                    <a href="{{route('commercial.product_detail', [$res['category']['slug'], $dval['product_slug']])}}">
                                                        <img src="{{$dval['list_image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                    </a>
                                                    @endif

                                                    @if(isset($dval['list_title']))
                                                        <h3><a href="{{route('commercial.product_detail', [$res['category']['slug'], $dval['product_slug']])}}">{{ $dval['list_title'] }}</a></h3>
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
                                                    @if(isset($dval['product_slug']))
                                                            <a href="{{route('commercial.product_detail', [$res['category']['slug'], $dval['product_slug']])}}" class="common-btn">Learn More</a>
                                                    @endif
                                                    @if(isset($dval['slug']))
                                                        @if($dval['link_category'] != null || $dval['link_category'] != '')
                                                            <a href="{{route('commercial.products', [$dval['link_category']])}}" class="common-btn">Learn More</a>
                                                        @elseif($dval['link_sub_category'] != null || $dval['link_sub_category'] != '')
                                                            <a href="{{route('commercial.products', [$dval['link_sub_category']])}}" class="common-btn">Learn More</a>
                                                        @else
                                                            <a href="{{route('commercial.products', [$dval['slug']])}}" class="common-btn">Learn More</a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </article>
                                        </div>
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
                                                                @if(isset($dlst['title']))
                                                                    @if($dlst['link_category'] != null || $dlst['link_category'] != '')
                                                                        <h3><a href="{{route('commercial.products', [$dlst['link_category']])}}">{{ $dlst['title'] }}</a></h3>
                                                                    @elseif($dlst['link_sub_category'] != null || $dlst['link_sub_category'] != '')
                                                                        <h3><a href="{{route('commercial.products', [$dlst['link_sub_category']])}}">{{ $dlst['title'] }}</a></h3>
                                                                    @else
                                                                        <h3><a href="{{route('commercial.products', [$dlst['slug']])}}">{{ $dlst['title'] }}</a></h3>
                                                                    @endif
                                                                @endif

                                                                @if(isset($dlst['list_subtitle']) && $dlst['list_subtitle'] != '' && $dlst['list_subtitle'] != null)
                                                                    <h5>{{ $dlst['list_subtitle'] }}</h5>
                                                                @elseif(isset($dlst['categorysubtitle']))
                                                                    <h5>{{ $dlst['categorysubtitle'] }}</h5>
                                                                @endif
                                                                
                                                                @if(isset($dlst['list_description']) && $dlst['list_description'] != '' && $dlst['list_description'] != null)
                                                                    <p>{!! $dlst['list_description'] !!}</p>
                                                                @elseif(isset($dlst['description']))
                                                                    <p>{!! $dlst['description'] !!}</p>
                                                                @endif

                                                                @if(isset($dlst['bullet']))
                                                                    @php
                                                                            $bul = explode(',',$dlst['bullet']);
                                                                    @endphp
                                                                    @if(isset($bul) && count($bul) > 0)
                                                                    <ul>
                                                                        @foreach($bul as $bpoint)
                                                                            <li>{{$bpoint}}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                    @endif
                                                                @endif

                                                            @else
                                                                @if(isset($dlst['list_title']))
                                                                    <h3><a href="{{route('commercial.product_detail', [$res['category']['slug'], $dlst['product_slug']])}}">{{ $dlst['list_title'] }}</a></h3>
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
                                                                @if(isset($dlst['product_slug']))<a href="{{route('commercial.product_detail', [$res['category']['slug'], $dlst['product_slug']])}}" class="common-btn">Learn More</a>@endif
                                                                @if(isset($dlst['slug']))<a href="{{route('commercial.products', [$dlst['slug']])}}" class="common-btn">Learn More</a>@endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        @if(isset($dlst['slug']))
                                                            @if(isset($dlst['image']) && $dlst['image'] != null && $dlst['image'] != '')
                                                                @if($dlst['link_category'] != null || $dlst['link_category'] != '')
                                                                    <a href="{{route('commercial.products', [$dlst['link_category']])}}" class="image-link">
                                                                        <img src="{{$dlst['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                                    </a>
                                                                @elseif($dlst['link_sub_category'] != null || $dlst['link_sub_category'] != '')
                                                                    <a href="{{route('commercial.products', [$dval['link_sub_category']])}}" class="image-link">
                                                                        <img src="{{$dlst['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                                    </a>
                                                                @else
                                                                    <a href="{{route('commercial.products', [$dlst['slug']])}}" class="image-link">
                                                                        <img src="{{$dlst['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                                    </a>
                                                                @endif
                                                            @endif
                                                        @else
                                                            @if(isset($dlst['list_image']) && $dlst['list_image'] != null && $dlst['list_image'] != '')
                                                                <a href="{{route('commercial.product_detail', [$res['category']['slug'], $dlst['product_slug']])}}"  class="image-link">
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

                @if(isset($res['subcategories_dts']))
                    @foreach($res['subcategories_dts'] as $skey=>$subs)
                        <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common">
                            <div class="container-md">
                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">
                                        @if(isset($subs['category']['title']) && $subs['category']['title'] != '')
                                            <h2>{{$subs['category']['title']}}</h2>
                                        @endif
                                        @if(isset($subs['category']['description']) && $subs['category']['description'] != '')
                                            <p>{!! $subs['category']['description'] !!}</p>
                                        @endif
                                    </div>
                                </div>
                                @if(isset($subs['subcategories']) && count($subs['subcategories']) > 0)
                                    @php
                                        $dlst = [];
                                        $ddpcount = $subs['subcategories'];
                                        if(count($ddpcount)%2 != 0){
                                            $dlst = end($ddpcount);
                                            array_pop($ddpcount);
                                        } 
                                    @endphp

                                    @if(count($ddpcount) > 0)
                                        <div class="row">
                                            @foreach($ddpcount as $dkey => $dval)
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 commercial-category  products-box-section">
                                                    <article>
                                                        @if(isset($dval['slug']))
                                                            @if(isset($dval['image']) && $dval['image'] != null && $dval['image'] != '')
                                                                @if($dval['link_category'] != null || $dval['link_category'] != '')
                                                                    <a href="{{route('commercial.products', [$dval['link_category']])}}">
                                                                        <img src="{{$dval['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                                    </a>
                                                                @elseif($dval['link_sub_category'] != null || $dval['link_sub_category'] != '')
                                                                    <a href="{{route('commercial.products', [$dval['link_sub_category']])}}">
                                                                        <img src="{{$dval['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                                    </a>
                                                                @else
                                                                    <a href="{{route('commercial.products', [$dval['slug']])}}">
                                                                        <img src="{{$dval['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                                    </a>
                                                                @endif
                                                            @endif

                                                            @if(isset($dval['title']))

                                                                @if($dval['link_category'] != null || $dval['link_category'] != '')
                                                                    <h3><a href="{{route('commercial.products', [$dval['link_category']])}}">{{ $dval['title'] }}</a></h3>
                                                                @elseif($dval['link_sub_category'] != null || $dval['link_sub_category'] != '')
                                                                    <h3><a href="{{route('commercial.products', [$dval['link_sub_category']])}}">{{ $dval['title'] }}</a></h3>
                                                                @else
                                                                    <h3><a href="{{route('commercial.products', [$dval['slug']])}}">{{ $dval['title'] }}</a></h3>
                                                                @endif
                                                            @endif

                                                         
                                                            @if(isset($dval['list_subtitle']) && $dval['list_subtitle'] != '' && $dval['list_subtitle'] != null)
                                                                <h5>{{ $dval['list_subtitle'] }}</h5>
                                                            @elseif(isset($dval['categorysubtitle']))
                                                                <h5>{{ $dval['categorysubtitle'] }}</h5>
                                                            @endif

                                                            @if(isset($dval['list_description']) && $dval['list_description'] != '' && $dval['list_description'] != null)
                                                                <p>{!! $dval['list_description'] !!}</p>
                                                            @elseif(isset($dval['description']))
                                                                <p>{!! $dval['description'] !!}</p>
                                                            @endif

                                                            @if(isset($dval['bullet']))
                                                                @php
                                                                    $bul = explode(',',$dval['bullet']);
                                                                @endphp
                                                                @if(isset($bul) && count($bul) > 0)
                                                                <ul>
                                                                    @foreach($bul as $bpoint)
                                                                        <li>{{$bpoint}}</li>
                                                                    @endforeach
                                                                </ul>
                                                                @endif
                                                            @endif
                                                        @else

                                                            @if(isset($dval['list_image']) && $dval['list_image'] != null && $dval['list_image'] != '')
                                                            <a href="{{route('commercial.product_detail', [$res['category']['slug'], $dval['product_slug']])}}">
                                                                <img src="{{$dval['list_image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                            </a>
                                                            @endif

                                                            @if(isset($dval['list_title']))
                                                                <h3><a href="{{route('commercial.product_detail', [$res['category']['slug'], $dval['product_slug']])}}">{{ $dval['list_title'] }}</a></h3>
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
                                                            @if(isset($dval['product_slug']))
                                                                    <a href="{{route('commercial.product_detail', [$res['category']['slug'], $dval['product_slug']])}}" class="common-btn">Learn More</a>
                                                            @endif
                                                            @if(isset($dval['slug']))
                                                                @if($dval['link_category'] != null || $dval['link_category'] != '')
                                                                    <a href="{{route('commercial.products', [$dval['link_category']])}}" class="common-btn">Learn More</a>
                                                                @elseif($dval['link_sub_category'] != null || $dval['link_sub_category'] != '')
                                                                    <a href="{{route('commercial.products', [$dval['link_sub_category']])}}" class="common-btn">Learn More</a>
                                                                @else
                                                                    <a href="{{route('commercial.products', [$dval['slug']])}}" class="common-btn">Learn More</a>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </article>
                                                </div>
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
                                                                        @if(isset($dlst['title']))
                                                                            @if($dlst['link_category'] != null || $dlst['link_category'] != '')
                                                                                <h3><a href="{{route('commercial.products', [$dlst['link_category']])}}">{{ $dlst['title'] }}</a></h3>
                                                                            @elseif($dlst['link_sub_category'] != null || $dlst['link_sub_category'] != '')
                                                                                <h3><a href="{{route('commercial.products', [$dlst['link_sub_category']])}}">{{ $dlst['title'] }}</a></h3>
                                                                            @else
                                                                                <h3><a href="{{route('commercial.products', [$dlst['slug']])}}">{{ $dlst['title'] }}</a></h3>
                                                                            @endif
                                                                        @endif

                                                                        @if(isset($dlst['list_subtitle']) && $dlst['list_subtitle'] != '' && $dval['list_subtitle'] != null)
                                                                            <h5>{{ $dlst['list_subtitle'] }}</h5>
                                                                        @elseif(isset($dlst['categorysubtitle']))
                                                                            <h5>{{ $dlst['categorysubtitle'] }}</h5>
                                                                        @endif

                                                                        @if(isset($dlst['list_description']) && $dlst['list_description'] != '' && $dlst['list_description'] != null)
                                                                            <p>{!! $dlst['list_description'] !!}</p>
                                                                        @elseif(isset($dlst['description']))
                                                                            <p>{!! $dlst['description'] !!}</p>
                                                                        @endif

                                                                        @if(isset($dlst['bullet']))
                                                                            @php
                                                                                    $bul = explode(',',$dlst['bullet']);
                                                                            @endphp
                                                                            @if(isset($bul) && count($bul) > 0)
                                                                            <ul>
                                                                                @foreach($bul as $bpoint)
                                                                                    <li>{{$bpoint}}</li>
                                                                                @endforeach
                                                                            </ul>
                                                                            @endif
                                                                        @endif

                                                                    @else
                                                                        @if(isset($dlst['list_title']))
                                                                            <h3><a href="{{route('commercial.product_detail', [$res['category']['slug'], $dlst['product_slug']])}}">{{ $dlst['list_title'] }}</a></h3>
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
                                                                        @if(isset($dlst['product_slug']))<a href="{{route('commercial.product_detail', [$res['category']['slug'], $dlst['product_slug']])}}" class="common-btn">Learn More</a>@endif

                                                                        @if($dlst['link_category'] != null || $dlst['link_category'] != '')
                                                                            <a href="{{route('commercial.products', [$dlst['link_category']])}}" class="common-btn">Learn More</a>
                                                                        @elseif($dlst['link_sub_category'] != null || $dlst['link_sub_category'] != '')
                                                                            <a href="{{route('commercial.products', [$dlst['link_sub_category']])}}" class="common-btn">Learn More</a>
                                                                        @else
                                                                            <a href="{{route('commercial.products', [$dlst['slug']])}}" class="common-btn">Learn More</a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                @if(isset($dlst['slug']))
                                                                    @if(isset($dlst['image']) && $dlst['image'] != null && $dlst['image'] != '')
                                                                        @if($dlst['link_category'] != null || $dlst['link_category'] != '')
                                                                            <a href="{{route('commercial.products', [$dlst['link_category']])}}" class="image-link">
                                                                                <img src="{{$dlst['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                                            </a>
                                                                        @elseif($dlst['link_sub_category'] != null || $dlst['link_sub_category'] != '')
                                                                            <a href="{{route('commercial.products', [$dval['link_sub_category']])}}" class="image-link">
                                                                                <img src="{{$dlst['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                                            </a>
                                                                        @else
                                                                            <a href="{{route('commercial.products', [$dlst['slug']])}}" class="image-link">
                                                                                <img src="{{$dlst['image']}}" width="auto" height="auto" class="img-fluid" alt="">
                                                                            </a>
                                                                        @endif
                                                                    @endif
                                                                @else
                                                                    @if(isset($dlst['list_image']) && $dlst['list_image'] != null && $dlst['list_image'] != '')
                                                                        <a href="{{route('commercial.product_detail', [$res['category']['slug'], $dlst['product_slug']])}}"  class="image-link">
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
                    @endforeach
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