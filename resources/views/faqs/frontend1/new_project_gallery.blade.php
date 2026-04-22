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

        <!--------------------- Photo Gallery Banner Section ----------------------->
        <section class="photo-gallery gallery-page sandk-common-padding sandk-common text-center">
            <div class="container-md">
            <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 photo-gallery-content">
                        <h2>Photo Gallery</h2>
                    </div>
                </div>
                <!-- <div class="row popup-gallery-tab">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 tab-sec">
                        <ul id="details-tab-item" class="details-tab-items">
                            <li><a href="#all">All</a></li>
                            @if(isset($categories) && count($categories) > 0 && !empty($categories))
                            @foreach($categories as $key => $cat)
                            <li><a href="#{{ $cat->slug }}">{{ $cat->category }}</a></li>
                            @endforeach
                            @endif

                        </ul>
                    </div>
                </div> -->
                    <div class="row popup-gallery details-tab-details" id="all">
                        @if(isset($photos) && count($photos) > 0 && !empty($photos))
                        @foreach($photos as $key => $val)
                        @if(isset($val->featured_img) && $val->featured_img != null)
                        @php
                        $img_2 = $img = App\Models\MediaImage::select('name')->where('id', $val->featured_img)->first();
                        @endphp
                        @endif
                        @if(isset($val->banner_image) && $val->banner_image != null)
                        @php
                        $img_2 = App\Models\MediaImage::select('name')->where('id', $val->banner_image)->first();
                        @endphp
                        @endif
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center each-image @if($key > 2) @endif">
                            <figure>
                                <div class="gallery-item">
                                    <a data-effect="mfp-zoom-in" href="{{ isset($img_2->name) ? asset('uploads/'.$img_2->name) : (isset($img->name) ? asset('uploads/'.$img->name) : '#') }}" title="" class="a">
                                        <img class="img-fluid" src="{{ asset('uploads/'.$img->name) }}" alt="{{ $val->title }}"/> 
                                        <img class="plus-img" src="{{asset('front-assets/src/images/maginifier-zoom.webp')}}" width="80" height="80">
                                    </a>
                                </div>                
                            </figure>
                        </div>
                        @endforeach
                        @if(isset($photos) && count($photos) > 15 && !empty($photos))
                        <div>
                         <a class="common-btn text-center" id="loadMoreBtn" style="cursor: pointer;">Load More</a>
                        </div>
                        @endif
                        @endif
                    </div>

                @if(isset($categories) && count($categories) > 0 && !empty($categories))
                @foreach($categories as $key => $cat)
                @php
                $images = App\Models\ProjectGallery::where('category_id', $cat->id)->latest()->get();
                @endphp
                <div class="row popup-gallery details-tab-details" id="{{ $cat->slug }}">
                    @if(isset($images) && count($images) > 0 && !empty($images))
                    @foreach($images->take(15) as $key => $val)
                    @if(isset($val->featured_img) && $val->featured_img != null)
                    @php
                    $img = (isset($val->featured_img) && $val->featured_img != null) ? App\Models\MediaImage::select('name')->where('id', $val->featured_img)->first() : null;
                    @endphp
                    @endif
                    @if(isset($val->banner_image) && $val->banner_image != null)
                    @php
                    $img_2 = (isset($val->banner_image) && $val->banner_image != null) ? App\Models\MediaImage::select('name')->where('id', $val->banner_image)->first() : null;
                    @endphp
                    @endif
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 each-image text-center  @if($key > 2) @endif">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{ isset($img_2->name) ? asset('uploads/'.$img_2->name) : (isset($img->name) ? asset('uploads/'.$img->name) : '#') }}" title="" class="a">
                                    <img class="img-fluid" src="{{ asset('uploads/'.$img->name) }}" alt="{{ $val->title }}"/> 
                                    <img class="plus-img" src="{{asset('front-assets/src/images/maginifier-zoom.webp')}}" width="80" height="80">
                                </a>
                            </div>
                        </figure>
                    </div>
                     @endforeach
                     @if(isset($images) && count($images) > 15 && !empty($images))
                     <div>
                     <a class="common-btn text-center loadMoreBtncats" id="loadMoreBtncats" data-container="{{ $cat->slug }}-remaining" style="cursor: pointer;">Load More</a>
                    </div>
                    @endif
                     @else
                     <h4>No Images Found</h4>
                    @endif
                </div>
                <div class="row popup-gallery details-tab-details show_remaining" id="{{ $cat->slug }}-remaining">
                    @if(isset($images) && count($images) > 0 && !empty($images))
                    @foreach($images->skip(15) as $key => $val)
                    @if(isset($val->featured_img) && $val->featured_img != null)
                    @php
                    $img = (isset($val->featured_img) && $val->featured_img != null) ? App\Models\MediaImage::select('name')->where('id', $val->featured_img)->first() : null;
                    @endphp
                    @endif
                    @if(isset($val->banner_image) && $val->banner_image != null)
                    @php
                    $img_2 = (isset($val->banner_image) && $val->banner_image != null) ? App\Models\MediaImage::select('name')->where('id', $val->banner_image)->first() : null;
                    @endphp
                    @endif
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 each-image text-center  @if($key > 2) @endif">
                        <figure>
                            <div class="gallery-item">
                                <a data-effect="mfp-zoom-in" href="{{ isset($img_2->name) ? asset('uploads/'.$img_2->name) : (isset($img->name) ? asset('uploads/'.$img->name) : '#') }}" title="" class="a">
                                    <img class="img-fluid" src="{{ asset('uploads/'.$img->name) }}" /> 
                                    <img class="plus-img" src="{{asset('front-assets/src/images/maginifier-zoom.webp')}}" width="80" height="80">
                                </a>
                            </div>
                        </figure>
                    </div>
                     @endforeach
                     @if(isset($images) && count($images) > 15 && !empty($images))
                     <div>
                     <a class="common-btn text-center show_less" id="show_less" data-container="{{ $cat->slug }}-remaining" style="cursor: pointer;">Show Less</a>
                    </div>
                    @endif
                     @else
                     <h4>No Images Found</h4>
                    @endif
                </div>
                @endforeach
                @endif
            </div>
        </section>
       
        <!---------------------  Our Gallery ----------------------->
@endsection
@section('script')
<script>
$(document).ready(function () {
    var displayedImages = 15;
    var imagesVisible = true;

    $('#all .col-xxl-4:gt(' + (displayedImages - 1) + ')').addClass('hidden');
    $(document).on('click', '#loadMoreBtn', function () {
        if (imagesVisible) {
            $('#all .col-xxl-4.hidden').removeClass('hidden');
            $(this).text('Show Less');
        } else {
            $('#all .col-xxl-4:gt(' + (displayedImages - 1) + ')').addClass('hidden');
            $(this).text('Load More');
        }
        imagesVisible = !imagesVisible;
    });
});


    $(document).on('click', '.loadMoreBtncats', function () {
        $(this).hide();
        var content = $(this).data('container');
        $('#' + content).show();
        $('.show_less').show();
    });

    $(document).on('click', '.show_less', function () {
        $(this).hide();
        var content = $(this).data('container');
        $('#' + content).hide();
        $('.loadMoreBtncats').show();
    });


</script>
@endsection