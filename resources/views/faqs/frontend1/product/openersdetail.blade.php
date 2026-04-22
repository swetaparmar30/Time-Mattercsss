@extends('frontend.layouts.index')
@section('content')

    <section class="sandk-common-padding sandk-common product-page-banner-section">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 left-side">
                    @if(isset($result->product_title) && $result->product_title)
                        <h1>{{$result->product_title}}</h1>
                    @endif
                    @if(isset($result->product_subtitle) && $result->product_subtitle)
                        <h4>{{$result->product_subtitle}}</h4>
                    @endif
                    @if(isset($result->description) && $result->description)
                        {!! $result->description !!}
                    @endif
                    <a  data-bs-toggle="modal" data-bs-target="#getafreequote" class="common-btn" style=" cursor: pointer;">GET A FREE QUOTE</a>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 right-side">
                    @if(isset($result->image) && $result->image != null && $result->image != '')
                        <a href="">
                            <img src="{{$result->image}}" width="auto" height="auto" class="img-fluid" alt="">
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @if(isset($result->contents))
        @if($result->contents[0]->title != '-')
            @if(count($result->contents) > 0)
                <section class="sandk-common-padding sandk-common product-page-product-item-section">
                    <div class="container-md">
                        <div class="row desktop-product-sec">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 left-side">
                                <ul class="nav nav-tabs product-nav-tab ">
                                    @foreach($result->contents as $kc => $kval)
                                        <li data-bs-active="#tab{{$kc}}"><a data-bs-toggle="tab" href="#tab{{$kc}}" @if($kc == 0) class="active" @endif>{{isset($kval->title) ? $kval->title : '-'}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 right-side">
                                <div class="tab-content">
                                    @foreach($result->contents as $kc => $kval)
                                        <div id="#tab{{$kc}}" class="tab-pane fade colors @if($kc == 0) active show @endif">
                                            <div class="row product-heading-content">
                                                <div class="col-12">
                                                    {!! $kval->content !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endif
    @endif

    @if(isset($result->features_and_options))
        @if($result->features_and_options[0]->title != '-')
            @if(count($result->features_and_options) > 0)
                <section class="sandk-common-padding sandk-common product-features-options-section">
                    <div class="container-md">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                @if(isset($result->product_title) && $result->product_title)
                                    <h2>{{$result->product_title}} Features & Options</h2>
                                @else
                                    <h2>Features & Options</h2>
                                @endif

                                @if(isset($result->feature_main_title) && $result->feature_main_title)
                                    <p>{{$result->feature_main_title}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="row product-features-options-row">
                            @foreach($result->features_and_options as $fkey=>$fval)
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 product-features-options-boxes">
                                    <article>
                                        @if(isset($fval->file_path))
                                        <img src="{{$fval->file_path}}" width="284" height="220" class="img-fluid" alt="">
                                        @endif
                                        <div>
                                            @if(isset($fval->title) && $fval->title)
                                                <h3>{{$fval->title}}</h3>
                                            @endif
                                            
                                            @if(isset($fval->content) && $fval->content)
                                                {!! $fval->content !!}
                                            @endif
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
        @endif
    @endif

    @include('frontend.includes.designs-sec')

    @include('frontend.includes.quote-sec')
    @if(count($client_logo) > 0)
        @include('frontend.includes.client-logo-sec')
    @endif

@endsection