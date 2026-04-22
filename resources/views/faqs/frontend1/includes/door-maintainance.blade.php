@if($garage_services->count() > 0)
<section class="garage-door-maintenance-sec sandk-common-padding sandk-common">
        <div class="container-md">
            <div class="row align-items-center">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    @if(isset($residential->resi_title) && $residential->resi_title != '')
                        <h2>{{$residential->resi_title}}</h2>
                    @endif
                </div>
            </div>
        </div>

        <div class="container-md">
            <div class="row desktop-garage-door-maintenance-sec align-items-center">

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-side">
                    @if(isset($residential->resi_sub_title) && $residential->resi_sub_title != '')
                        <h3>{{$residential->resi_sub_title}}</h3>
                    @endif
                    @if(isset($residential->resi_description) && $residential->resi_description != '')
                        {!! $residential->resi_description !!}
                    @endif
                    
                    <div class="left-side-tab-items" role="tablist">

                        @foreach($garage_services as $gskey => $gsvalue)
                            <a class="nav-link each-offer-item @if($gskey == 0) active @endif" id="door{{$gskey}}-tab" data-bs-toggle="tab" data-bs-target="#door{{$gskey}}-target" role="tab" aria-controls="door{{$gskey}}-target" aria-selected="false" href="" tabindex="-1">
                                <h4>{{$gsvalue->title}}</h4>
                            </a>
                        @endforeach
                    </div>
                    
                    
                </div>


                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">

                    <div class="tab-content what-offer-image">
              
                        @foreach($garage_services as $gskey => $gsvalue)
                            <div class="tab-pane @if($gskey == 0) active @endif" id="door{{$gskey}}-target" role="tabpanel" aria-labelledby="door{{$gskey}}-tab">
                                @if(isset($gsvalue->image) && $gsvalue->image != null)
                                    @php
                                    $img = App\Models\MediaImage::select('name')->where('id', $gsvalue->image)->first();
                                    @endphp
                                    @if(isset($img->name) && $img->name != null)
                                    <img 
                                    src="{{ asset('uploads/'.$img->name) }}" 
                                    srcset="{{ asset('uploads/' . $img->name) }} 400w,
                                            {{ asset('uploads/' . $img->name) }} 600w,
                                            {{ asset('uploads/' . $img->name) }} 786w" 
                                    sizes="(max-width: 600px) 100vw, 
                                            (max-width: 900px) 50vw, 
                                            786px"
                                    class="img-fluid" 
                                    width="786" height="750" 
                                    loading="lazy" 
                                    alt="{{$gsvalue->title}}">
                                    @endif
                                @else
                                <img src="{{ asset('front-assets/src/images/broken-sprin-grepair.webp')}}" class="img-fluid" width="786" height="750" alt="Garage Service" loading="lazy">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row mobile-garage-door-maintenance-sec">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="heading-sec">
                        @if(isset($residential->resi_sub_title) && $residential->resi_sub_title != '')
                            <h3>{{$residential->resi_sub_title}}</h3>
                        @endif
                        @if(isset($residential->resi_description) && $residential->resi_description != '')
                            {!! $residential->resi_description !!}
                        @endif
                    </div>
                    
                    <ul style="margin-bottom:15px;">
                        @foreach($garage_services as $gskey => $gsvalue)
                            <li>{{$gsvalue->title}}</li>
                        @endforeach
                    </ul>
                        {!! $garage_door->garage_door_description !!}

                    @if(isset($residential->resi_button_name) && $residential->resi_button_name !='')
                        @if(isset($residential->resi_button_url) && $residential->resi_button_url !='')
                            <a class="common-btn" href="{{$residential->resi_button_url}}"> 
                        @else
                            <a class="common-btn"> 
                        @endif
                        <img src="{{ asset('front-assets/src/images/white-yellow-call-icon.webp')}}" class="normal-icon" alt=""><img src="{{ asset('front-assets/src/images/blue-white-call-icon.webp')}}" class="hover-icon" alt="Garage Service" width="25" height="25">{{$residential->resi_button_name}}
                        </a>
                    @endif
                </div>
            </div>
        </div>
</section>
@endif