
<section class="faq-sec sandk-common-padding sandk-common">

    <div class="container-md">
        <div class="row">
            <h2>FAQ’s</h2>
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 left-side-image">
                @if($faqs->faq_img)
                    @php
                        $img = App\Models\MediaImage::select('name')->where('id', $faqs->faq_img)->first();
                    @endphp
                    <figure>
                        @if(isset($img->name) && $img->name != null)
                        <img src="{{ asset('uploads/'.$img->name) }}" width="auto" height="auto" alt="" loading="lazy" class="img-fluid">
                        @endif
                    </figure>
                @endif
            </div>

            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 right-faq-sec">
                @if($faq_data->count() > 0)
                <div class="accordion" id="bestAccordion">
                    @foreach($faq_data as $dkey=>$dval)
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
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>