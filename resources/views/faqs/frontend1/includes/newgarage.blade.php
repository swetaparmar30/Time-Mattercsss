<section class="new-garage-door-sec sandk-common-padding sandk-common">
    <div class="container-md">
        <div class="row align-items-center">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                @if(isset($newgarage->newgarage_title) && $newgarage->newgarage_title != '')
                    <h2>{{$newgarage->newgarage_title}}</h2>
                    <h2 class="mobile-heading">{{$newgarage->newgarage_title}}</h2>
                @endif
                @if(isset($newgarage->newgarage_desc) && $newgarage->newgarage_desc != '')
                    {{$newgarage->newgarage_desc}}
                @endif
            </div>
        </div>

        @if($garage_doors->count() > 0)
        <div class="row justify-content-center desktop-garage-door-sec">
            @foreach($garage_doors as $gky=>$gvl)
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 box-sec-1 box-sec">
                    <article>
                        <div class="heading">
                            @if(isset($gvl->title) && $gvl->title != '')<h3><a href="@if(isset($gvl->button_url) && $gvl->button_url !='') {{$gvl->button_url}} @endif " aria-label="{{$gvl->title}}">{{$gvl->title}}</a></h3>@endif
                            @if(isset($gvl->subtitle) && $gvl->subtitle != '')<h4><a href="@if(isset($gvl->button_url) && $gvl->button_url !='') {{$gvl->button_url}} @endif " aria-label="{{$gvl->title}}">{{$gvl->subtitle}}</a></h4>@endif
                        </div>
                        @if(isset($gvl->image) && $gvl->image != null)
                            @php
                            $img = App\Models\MediaImage::select('name')->where('id', $gvl->image)->first();
                            @endphp
                            @if($img && isset($img->name) && $img->name != null)
                            <figure>
                                <a @if(isset($gvl->button_url) && $gvl->button_url !='') href="{{$gvl->button_url}}" @endif aria-label="{{$gvl->title}}">
                                    <img src="{{ asset('uploads/'.$img->name) }}" class="img-fluid" width="486" height="205" alt="" loading="lazy">
                                </a>
                            </figure>
                            @endif
                        @else
                        <figure>
                            <a @if(isset($gvl->button_url) && $gvl->button_url !='') href="{{$gvl->button_url}}" @endif aria-label="{{$gvl->title}}"><img src="{{ asset('front-assets/src/images/new-residential-garage-doors.webp')}}" class="img-fluid" width="486" height="205" alt="" loading="lazy"></a>
                        </figure>
                        @endif
                        @if(isset($gvl->description) && $gvl->description != '')
                            {!! $gvl->description !!}
                        @endif

                        @if(isset($gvl->bullets) && $gvl->bullets != '')
                            {!! $gvl->bullets !!}
                        @endif
                 
                        @if(isset($gvl->button) && $gvl->button !='')
                            @if(isset($gvl->button_url) && $gvl->button_url !='')
                                <a class="common-btn first-btn" href="{{$gvl->button_url}}" aria-label="{{$gvl->title}}" title="{{$gvl->title}}" > 
                            @else
                            <a class="common-btn first-btn" aria-label="{{$gvl->title}}" title="{{$gvl->title}}" > 
                            @endif
                                {{$gvl->button}}
                            </a>
                        @endif
                    </article>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</section>