<section class="banner">
    <!-- <img src="{{ asset('front-assets/src/images/banner-image.webp')}}" class="banner-img" alt="" width="1900" height="780"> -->
    <!-- <img class="lazyload banner-img" src="{{ asset('front-assets/src/images/banner-image.webp')}}" data-src="{{ asset('front-assets/src/images/banner-image.webp')}}" srcset="{{ asset('front-assets/src/images/banner780.webp')}} 991w, {{ asset('front-assets/src/images/banner1100.webp')}} 1100w, {{ asset('front-assets/src/images/banner1100.webp')}} 1300w, {{ asset('front-assets/src/images/banner1100.webp')}} 1500w" class="banner-img" alt="" width="1900" height="780" /> -->
    @php
        $img = App\Models\MediaImage::select('id','name')->find($banner->banner_img);
        $src = asset('uploads/' . $img->name);
        function imageAsset($screen): string
        {
            return $screen === 575
            ? asset('uploads/675aa5e055ae7.webp')
            : asset('front-assets/src/images/home-page-banner1100.webp');
        }
    @endphp

<!-- <img class="lazyload banner-img"
         src="{{ $src }}"
         data-src="{{ $src }}"
         srcset="{{ imageAsset(575) .' 575w,'.
              imageAsset(991).' 991w,'.
             imageAsset(1100) .' 1100w,'.
             imageAsset(1300) .' 1300w,'.
             imageAsset(1500) .' 1500w'}}"
         alt="{{ $banner->banner_subtitle ?? 'Banner Image' }}"
         width="1900"
         height="780"
         loading="eager"
         fetchpriority="high"/> -->

<picture>
    <source srcset="{{ imageAsset(575) }}" media="(max-width: 575px)" type="image/webp">
    <source srcset="{{ imageAsset(991) }}" media="(max-width: 991px)" type="image/webp">
    <source srcset="{{ imageAsset(1100) }}" media="(max-width: 1100px)" type="image/webp">
    <source srcset="{{ imageAsset(1300) }}" media="(max-width: 1300px)" type="image/webp">
    <source srcset="{{ imageAsset(1500) }}" media="(max-width: 1500px)" type="image/webp">
    <img class="banner-img"
         src="{{ $src }}"
         data-src="{{ $src }}"
         srcset="{{ imageAsset(575) . ' 575w,' .
                   imageAsset(991) . ' 991w,' .
                   imageAsset(1100) . ' 1100w,' .
                   imageAsset(1300) . ' 1300w,' .
                   imageAsset(1500) . ' 1500w' }}"
         sizes="(max-width: 575px) 575px, 
                (max-width: 991px) 991px, 
                (max-width: 1100px) 1100px, 
                (max-width: 1300px) 1300px, 
                1500px"
         alt="{{ $banner->banner_subtitle ?? 'Banner Image' }}"
         width="500"
         height="415" fetchpriority="high">
</picture>


    <div class="banner-content">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 left-side desk-banner-left-side">
                    @if(isset($banner->banner_subtitle) && $banner->banner_subtitle != '')
                        <h4>{{$banner->banner_subtitle}}</h4>
                    @endif
                    @if(isset($banner->banner_title) && $banner->banner_title != '')
                        <h1>{!! $banner->banner_title !!}</h1>
                    @endif
                    @if(isset($banner->banner_description) && $banner->banner_description != '')
                        {!! $banner->banner_description !!}
                    @endif
                </div>


                @php
                    $mobileimg = App\Models\MediaImage::select('name')->where('id', $banner->mobile_banner_img)->first();
                    $bgImage = $mobileimg ? asset('uploads/' . $mobileimg->name) : asset('front-assets/src/images/home-mobile-banner-image.webp');
                @endphp



                        <!--<div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 left-side mobile-banner-left-side" style="background-image: url('{{ $bgImage }}'); ">
                    @if(isset($banner->banner_subtitle) && $banner->banner_subtitle != '')
                    <h4>{{$banner->banner_subtitle}}</h4>


                @endif
                @if(isset($banner->banner_title) && $banner->banner_title != '')
                    <h1>{!! $banner->banner_title !!}</h1>


                @endif
                @if(isset($banner->banner_description) && $banner->banner_description != '')
                    {!! $banner->banner_description !!}
                @endif
                </div>-->

                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 right-side">
                    @include('frontend.includes.contactform')
                </div>
            </div>
        </div>
    </div>
</section>