
<section class="design-center-sec sandk-common-padding sandk-common">
   <div class="container-md">
         <div class="row align-items-center">

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-side">
               @if(isset($design->design_title) && $design->design_title != '')
                  <h2 class="design-h2">{{$design->design_title}}</h2>
               @endif
               @if(isset($design->design_sub_title) && $design->design_sub_title != '')
                  <h3 class="design-h3">{{$design->design_sub_title}}</h3>
               @endif
               @if(isset($design->design_img) && $design->design_img != null)
                  @php
                  $img = App\Models\MediaImage::select('name')->where('id', $design->design_img)->first();
                  @endphp
                  @if(isset($img->name) && $img->name != null)
                  <img src="{{ asset('uploads/'.$img->name) }}" class="img-fluid mobile-img" width="786" height="473" alt="" loading="lazy">
                  @endif
               @else
               <img src="{{ asset('front-assets/src/images/new-design-adoor-right-img.webp')}}" class="img-fluid mobile-img" width="auto" height="auto" alt="" loading="lazy">
               @endif
               
               @if(isset($design->design_description) && $design->design_description != '')
                  {!! html_entity_decode($design->design_description) !!}
               @endif

               @if(isset($design->button_name) && $design->button_name !='')
                     @if(isset($design->button_url) && $design->button_url !='')
                        <a class="common-btn first-btn" href="{{$design->button_url}}" target="_blank"> 
                     @else
                     <a class="common-btn first-btn"> 
                     @endif
                        {{$design->button_name}}
                     </a>
               @endif
            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
               @if(isset($design->design_img) && $design->design_img != null)
                  @php
                  $img = App\Models\MediaImage::select('name')->where('id', $design->design_img)->first();
                  @endphp
                  @if(isset($img->name) && $img->name != null)
                  <img src="{{ asset('uploads/'.$img->name) }}" class="img-fluid deskto-img" width="786" height="473" alt="" loading="lazy">
                  @endif
               @else
               <img src="{{ asset('front-assets/src/images/new-design-adoor-right-img.webp')}}" class="img-fluid deskto-img" width="auto" height="auto" alt="" loading="lazy">
               @endif
            </div>
         </div>
   </div>
</section>