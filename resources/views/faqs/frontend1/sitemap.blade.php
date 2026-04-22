@extends('frontend.layouts.index')
@section('title') Sitemap @endsection
@section('robots') noindex @endsection
@section('content')
<section class="faq-sec sandk-common-padding sandk-common sitemap-page-section">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2>Sitemap</h2>
                </div>
            </div>
        </div>

    <section>  
        <div class="container-md">
                <div class="row"> 
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{route('about.us')}}">About</a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}">Contact</a>
                            </li>
                            @foreach($pages as $page)
                                @if($page->slug != 'sitemap')
                                    <li>
                                        <a href="{{route('frontend.page.index',['slug' => $page->slug])}}">{{$page->title}}</a>
                                    </li>
                                    @if(isset($page->id) && $page->id == 1)

                                        @if(isset($posts) && count($posts) > 0)
                                            <ul>
                                            @foreach($posts as $post)
                                                <li>
                                                    <a href="{{route('front.single_blog_detail',['slug' => $post->slug])}}">{{$post->title}}</a>
                                                </li>
                                            @endforeach
                                            </ul>
                                        @endif
                                    @endif

                                @endif
                            @endforeach

                            <li>
                                <a href="{{route('get.residential.products')}}">Residential</a>
                            </li>
                            @if(count($residential_menus) > 0)
                                <ul>
                                @foreach($residential_menus as $reskey => $resmenu)
                                    
                                    @if(count($resmenu) > 0)
                                        <ul>
                                        @foreach($resmenu as $fkey=>$fval)
                                            
                                            <li><a href="{{route('residential.products', [$fval['slug']])}}">{{$fval['title']}}</a></li>
                                            @php
                                            $dataproduct = App\Models\Apiproductdata::select('product_json')->where('menutype','residential')->where('category',$fval['slug'])->get()->toArray();
                                     
                                            @endphp 
                                            @if($dataproduct > 0)  
                                                <ul>
                                                @foreach($dataproduct as $dkey=>$vls)
                                                    @php
                                                        $arp = json_decode($vls['product_json'],true);
                                                    @endphp

                                                    @if($arp)
                                                        @if(isset($arp['product_slug']))
                                                            <li><a href="{{route('residential.product_detail', [$fval['slug'], $arp['product_slug']])}}">{{$arp['list_title']}}</a></li>
                                                        @endif
                                                    @endif
                                                    
                                                @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                        </ul>
                                    @endif
                                    
                                @endforeach
                                </ul>
                            @endif

                            <li>
                                <a href="{{route('get.commercial.products')}}">Commercial</a>
                            </li>

                            @if(count($commercial_menus) > 0)
                                <ul>
                                @foreach($commercial_menus as $reskey => $resmenu)
                                    
                                    @if(count($resmenu) > 0)
                                  
                                        @foreach($resmenu as $fkey=>$fval)
                                            @php
                                                $subcat = $fval['subcategories'];
                                                $prdctcat = $fval['products'];
                                            @endphp
                                            @if($fval['slug'] == 'operators')
                                                <li><a href="{{route('commercial.products', [$fval['slug']])}}">Operators</a></li>
                                            @else
                                                <li><a href="{{route('commercial.products', [$fval['slug']])}}">{{$fval['title']}}</a></li>
                                            @endif

                                            @if(count($prdctcat) > 0 || count($subcat) > 0)
                                                <ul>
                                                @if(count($prdctcat) > 0)
                                                    @foreach($prdctcat as $ss=>$vls)
                                                        <li><a href="{{route('commercial.products', [$vls['product_slug']])}}">{{$vls['list_title']}}</a></li>
                                                    @endforeach
                                                @endif
                                                @if(count($subcat) > 0)
                                                    @foreach($subcat as $s=>$vl)
                                                        <li><a href="{{route('commercial.products', [$vl['slug']])}}">{{$vl['title']}}</a></li>

                                                        @php
                                                        $dataproduct = App\Models\Apiproductdata::select('product_json')->where('menutype','commercial')->where('subcategory',$fval['slug'])->get()->toArray();
                                                 
                                                        @endphp 
                                                        @if(count($dataproduct) > 0)  
                                                       
                                                            @foreach($dataproduct as $dkey=>$vls)
                                                                @php
                                                                    $arp = json_decode($vls['product_json'],true);
                                                                @endphp

                                                                @if($arp)
                                                                    @if(isset($arp['product_slug']))
                                                                    <li><a href="{{route('commercial.products', [$arp['product_slug']])}}">{{$arp['list_title']}}</a></li>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        
                                                        @endif

                                                    @endforeach
                                                @endif
                                                </ul>
                                            @endif
                                        @endforeach
                                    
                                    @endif
                                    
                                @endforeach
                                </ul>
                            @endif

                           
                        </ul>
                    </div>
                </div>
        </div>
    </section>
</section>

@if(count($client_logo) > 0)
        @include('frontend.includes.client-logo-sec')
    @endif

@endsection