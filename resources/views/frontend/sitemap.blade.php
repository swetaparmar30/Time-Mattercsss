@extends('frontend.layouts.index')

@section('title') {{ isset($meta_title) ? $meta_title : '' }} @endsection
@section('description') {{ isset($meta_description) ? $meta_description : '' }} @endsection
@section('keywords') {{ isset($meta_keywords) ? $meta_keywords : '' }} @endsection

@section('content')

    <section class="site-map-sec time-matter-common time-matter-common-padding">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="sitemap">Sitemap</h1>
                </div>
            </div>
        </div>  

    <section>  
        <div class="container-md">
                <div class="row"> 
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="sitemap-list">
                      
                            @if(!in_array(route('home').'/', $exselectpages))
                            <li>
                                <a href="{{route('home')}}/">Home</a>
                            </li>
                            @endif
                            @if(!in_array(route('about.us').'/', $exselectpages))
                            <li>
                                <a href="{{route('about.us')}}/">About</a>
                            </li>
                            @endif
                            @if(!in_array(route('contact').'/', $exselectpages))
                            <li>
                                <a href="{{route('contact')}}/">Contact</a>
                            </li>
                            @endif
                            @php
                                $excludedSlugs = ['sitemap', 'newport-garage-doors', 'dover-garage-doors', 'georgetown-garage-doors','salisbury-garage-doors'];
                            @endphp
                            @foreach($pages as $page)
                                @if(!in_array($page->slug, $excludedSlugs) && !in_array(route('frontend.page.index',['slug' => $page->slug]).'/', $exselectpages))
                                    <li>
                                        <a href="{{route('frontend.page.index',['slug' => $page->slug])}}/">{{$page->title}}</a>
                                    </li>
                                    @if(isset($page->id) && $page->id == 1)

                                        @if(isset($posts) && count($posts) > 0)
                                            <ul>
                                            @foreach($posts as $post)
                                                @php
                                                    $purl = route('front.single_blog_detail',['slug' => $post->slug]);
                                                @endphp
                                                @if(!in_array($purl, $exselectposts))
                                                <li>
                                                    <a href="{{$purl}}/">{{$post->title}}</a>
                                                </li>
                                                @endif
                                            @endforeach
                                            </ul>
                                        @endif
                                    @endif

                                @endif
                            @endforeach
                            <!-- for location -->


                            @foreach ($locations as $loc)
                                @if (!empty($loc->slug))
                                    @if(!in_array(url('locations/' . $loc->slug).'/', $exselectpages))
                                    <li>
                                        <a href="{{ url('locations/' . $loc->slug) }}/">
                                            {{ ucwords(str_replace('-', ' ', $loc->slug)) }}
                                        </a>
                                    </li>
                                    @endif
                                @endif
                            @endforeach

                            {{-- Time Services --}}
                            @if(isset($timeservices) && $timeservices->count() > 0)
                                <li><a href="#">Services</a></li>
                                
                                    @foreach($timeservices as $service)
                                        @if(!empty($service->slug))
                                            <li>
                                                <a href="{{ url('time-services/' . $service->slug) }}/">
                                                    {{ $service->name ?? ucwords(str_replace('-', ' ', $service->slug)) }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                
                            @endif

                            <!-- @if(!in_array(request()->route()->getName(), $exselectpages))
                            <li>
                                <a href="#">Member Access</a>
                            </li>
                            @endif
                             @if(!in_array(request()->route()->getName(), $exselectpages))
                            <li>
                                <a href="#">Independent Contractor</a>
                            </li>
                            @endif
                              @if(!in_array(request()->route()->getName(), $exselectpages))
                            <li>
                                <a href="#">Forms & Resources</a>
                            </li>
                            @endif
                              @if(!in_array(request()->route()->getName(), $exselectpages))
                            <li>
                                <a href="#">Temporary Employee</a>
                            </li>
                            @endif
                              @if(!in_array(request()->route()->getName(), $exselectpages))
                            <li>
                                <a href="#">Policies</a>
                            </li>
                            @endif
                              @if(!in_array(request()->route()->getName(), $exselectpages))
                            <li>
                                <a href="#">Resources</a>
                            </li>
                            @endif -->

                           
                        </ul>
                    </div>
                </div>
        </div>
    </section>
</section>

{{-- @if(count($client_logo) > 0)
        @include('frontend.includes.client-logo-sec')
    @endif --}}

@endsection