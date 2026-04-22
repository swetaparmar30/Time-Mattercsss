@if($testimonials->count() > 0)
<section class="testimonial-sec sandk-common-padding sandk-common">

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                <div id="testimonial" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                        @foreach($testimonials as $tkey=>$tval)
                            <div class="carousel-item @if($tkey == 0) active @endif">
                                <div class="client-comment">
                                    <div class="star-img">
                                        @php
                                            $rating = $tval->rating;
                                            $blank = 5 - $rating;
                                            $halfblank = 5 - $tval->rating;
                                        @endphp
                                        @for($i = 0; $i < $rating; $i++)
                                            <img class="img-fluid" src="/uploads/66a0c92641524.svg" alt="Star Rating" width="32" height="32">
                                        @endfor

                                        @for($i = 0; $i < $blank; $i++)
                                            <img class="img-fluid" src="/uploads/66a0c92640233.svg" alt="Star Rating" width="32" height="32">
                                        @endfor
                                        <!-- <img class="img-fluid" src="/uploads/66a0c92641524.svg" width="auto" height="auto">
                                        <img class="img-fluid" src="/uploads/66a0c92641524.svg" width="auto" height="auto">
                                        <img class="img-fluid" src="/uploads/66a0c926418e1.svg" width="auto" height="auto">
                                        <img class="img-fluid" src="/uploads/66a0c92640233.svg" width="auto" height="auto"> -->
                                    </div>

                                    @if($tval->content && $tval->content != '')
                                    <p>“{!! html_entity_decode($tval->content) !!}”</p> 
                                    @endif
                                </div>
                                @if($tval->name && $tval->name != '')
                                <div class="client-details">
                                    @if(isset($tval->img) && $tval->img != '')
                                        @php
                                            $img = App\Models\MediaImage::select('name')->where('id', $tval->img)->first();
                                        @endphp
                        
                                        <span class="name-first-letter" style="background:white;"><img src="{{ asset('uploads/'.$img->name) }}" style="padding:10px;" class="img-fluid" width="auto" height="auto" alt="" loading="lazy"></span>
                                    @else
                                        <span class="name-first-letter">{{ substr($tval->name, 0, 1) }}</span>
                                    @endif
                                    <h4>{{$tval->name}}</h4>
                                </div>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonial" data-bs-slide="prev"><img class="img-fluid" src="{{ asset('front-assets/src/images/testimonal-right.webp')}}" alt="Prev" width="17" height="30">
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#testimonial" data-bs-slide="next"><img class="img-fluid" src="{{ asset('front-assets/src/images/testimonal-left.webp')}}" alt="Next" width="17" height="30">
                    </button>

                    <div class="carousel-indicators">
                    @foreach($testimonials as $tkey=>$tval)
                        <button type="button" data-bs-target="#testimonial" data-bs-slide-to="{{ $tkey }}" @if($tkey == 0) class="active" @endif aria-label="Slide {{ $tkey + 1 }}"></button>
                    @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endif