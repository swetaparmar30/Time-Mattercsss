<section class="common-problems-sec sandk-common-padding sandk-common">
    <div class="container-md">
        <div class="row align-items-center">
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 left-side">
            @if(isset($garage_door->garage_img) && $garage_door->garage_img != null)
                @php
                $img = App\Models\MediaImage::select('name')->where('id', $garage_door->garage_img)->first();
                @endphp
                @if(isset($img->name) && $img->name != null)
                <img src="{{ asset('uploads/'.$img->name) }}" 
                srcset="{{ asset('uploads/'.$img->name) }} 602w" 
                sizes="(max-width: 600px) 400px, (max-width: 900px) 600px, 602px" 
                class="img-fluid" 
                width="602" height="588" 
                loading="lazy"
                alt="{{ isset($garage_door->door_title) ? $garage_door->door_title : 'ProDoor' }}">
                @endif
            @else
                <img src="{{ asset('front-assets/src/images/More-Common-Problems.webp') }}" class="img-fluid" width="602" height="588" alt="Garage Door" loading="lazy">
            @endif
            </div>

            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 right-side">
                <h2>{{ isset($garage_door->door_title) ? $garage_door->door_title : ''}} @if(isset($garage_door->door_sub_title) && $garage_door->door_sub_title != '') {{ $garage_door->door_sub_title }} @endif</h2>
                <h2 class="mobile-heading">{{ isset($garage_door->door_title) ? $garage_door->door_title : ''}} {{ isset($garage_door->door_sub_title) ? $garage_door->door_sub_title : ''}}</h2>
                {!! $garage_door->garage_door_description !!}
                @if(isset($residential->resi_button_name) && $residential->resi_button_name !='')
                        @if(isset($residential->resi_button_url) && $residential->resi_button_url !='')
                            <a class="common-btn" href="{{$residential->resi_button_url}}"> 
                        @else
                            <a class="common-btn"> 
                        @endif
                        <img src="{{ asset('front-assets/src/images/white-yellow-call-icon.webp')}}" class="normal-icon" alt=""><img src="{{ asset('front-assets/src/images/blue-white-call-icon.webp')}}" class="hover-icon" alt="" width="25" height="25">{{$residential->resi_button_name}}
                        </a>
                    @endif
            </div>
        </div>
    </div>
</section>