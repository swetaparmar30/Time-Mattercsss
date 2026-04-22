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
<section class="faq-sec sandk-common-padding sandk-common">

    <div class="container-md">
        <div class="row align-items-center">
            <h2>FAQ’s</h2>
            <!-- <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 left-side-image">
                @if(isset($faqs->faq_img))
                    @php
                        $img = App\Models\MediaImage::select('name')->where('id', $faqs->faq_img)->first();
                    @endphp
                    <figure>
                        <img src="{{ asset('uploads/'.$img->name) }}" width="auto" height="auto" alt="" loading="lazy" class="img-fluid">
                    </figure>
                @endif
            </div> -->

            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 right-faq-sec">
                @if($faqs->count() > 0)
                    @foreach($faqs as $dkey=>$dval)
                    <div class="accordion" id="bestAccordion">
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="heading{{$dkey}}">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse{{$dkey}}">{{$dval['title']}}</button>
                            </h4>
                            <div id="collapse{{$dkey}}" class="accordion-collapse collapse" data-bs-parent="#bestAccordion">
                                <div class="card-body">
                                    <p>{{$dval['description']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

@if(count($client_logo) > 0)
    @include('frontend.includes.client-logo-sec')
@endif

@endsection