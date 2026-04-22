

<section class="diffrent-brand-sec newHome-common-padding sandk-newHome">
   <div class="container-md">
      <div class="row align-items-center">
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="logo-inline-image">
               @foreach($client_logo as $val)
                  @if(isset($val->image) && $val->image != null)
                     @php
                     $img = App\Models\MediaImage::select('name')->where('id', $val->image)->first();
                     @endphp
                     <figure>
                           @if(isset($img->name) && $img->name != null)
                           <img src="{{ asset('uploads/'.$img->name) }}" class="img-fluid" width="" height="" alt="Time Master Garage Doors Client" loading="lazy">
                        @endif
                     </figure>
                  @else
                     <figure>
                       
                           <img src="{{asset('front-assets/images/IDA.webp')}}" width="258" height="" alt="" class="img-fluid">
                     
                     </figure>
                  @endif
               @endforeach
                            
            </div>
            <div class="logo-mobile-images owl-loaded">
               @foreach($client_logo as $val)
                  @if(isset($val->image) && $val->image != null)
                     @php
                     $img = App\Models\MediaImage::select('name')->where('id', $val->image)->first();
                     @endphp
                     <figure>
                     @if(isset($img->name) && $img->name != null)
                           <img src="{{ asset('uploads/'.$img->name) }}" class="img-fluid" width="" height="" alt="Time Master Garage Doors Client" loading="lazy">
                           @endif
                     </figure>
                  @else
                     <figure>
                     
                           <img src="{{asset('front-assets/images/IDA.webp')}}" width="258" height="" alt="" class="img-fluid">
                      
                     </figure>
                  @endif
               @endforeach
            </div>
         </div>
      </div>
   </div>
</section>
<section class="new-diffrent-brand-sec newHome-common-padding sandk-newHome d-none">
   <div class="container-md">
         <div class="row align-items-center">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               <div class="logo-images owl-loaded">
                  @foreach($client_logo as $val)
                     @if(isset($val->image) && $val->image != null)
                        @php
                        $img = App\Models\MediaImage::select('name')->where('id', $val->image)->first();
                        @endphp
                        <figure>
                           @if(isset($img->name) && $img->name != null)
                          <img src="{{ asset('uploads/'.$img->name) }}" class="img-fluid" width="" height="" alt="Time Master Garage Doors Client" loading="lazy">
                        @endif
                        </figure>
                     @else
                        <figure>
                           <img src="{{asset('front-assets/images/IDA.webp')}}" width="258" height="" alt="" class="img-fluid">
                       
                        </figure>
                     @endif
                  @endforeach
               </div>
            </div>
         </div>
   </div>
</section>