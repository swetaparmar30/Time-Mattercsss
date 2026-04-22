@extends('layouts.backend.index')
@section('main_content')
<div class="pcoded-wrapper">
   <div class="pcoded-content">
      <div class="pcoded-inner-content">
         <!-- [ breadcrumb ] start -->
         <!-- [ breadcrumb ] end -->
         <div class="main-body">
            <div class="page-wrapper">
               <!-- [ Main Content ] start -->
               <form action="{{ route('client-logo.store') }}" method="POST" data-parsley-validate=""
                  enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" id="client_logo_id" name="client_logo_id" value=" {{ isset($client->id) ? $client->id : '' }} ">
                  <div class="row">
                     <div
                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 cpl-sm-12 col-xs-12 add-article form-main-sec ">
                        <div class="card Recent-Users">
                           @if (isset($client) && $client != '')
                           <h5>Edit Client Logo</h5>
                           @else
                           <h5>Add Client Logo</h5>
                           @endif
                           <div class="card-block px-0 py-3">
                              <div class="row form-sec">
                                 <div class=" Recent-Users">
                                    <div
                                       class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                       <label for="">Image <span style="color: red;margin: 0;">*</span></label>
                                    </div>
                                    <div class="card-block px-0 py-3">
                                       <div class="row form-sec">
                                          <div
                                             class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                             <input type="hidden"
                                                value="{{ isset($client->image) ? $client->image : '' }}"
                                                name="img_id" id="img_id" required data-parsley-errors-container="#logo_required" data-parsley-trigger="change" data-parsley-required-message="Please choose an image.">
                                             <div class="upload-img-sec text-center image_preview_div">
                                                @if (isset($image_name->name) && $image_name->name != '')
                                                <img src="{{ asset('uploads/' . $image_name->name) }}" alt=""
                                                   class="img-fluid profile_avtar" id="profile_avtar"
                                                   style="width:125px;height:125px;">
                                                <a id="remove_image"> <i class="fa fa-times"
                                                   aria-hidden="true"></i></a>
                                                @else
                                                <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt=""
                                                   id="profile_avtar" class="profile-img">
                                                <a id="remove_image" style="display: none;"> <i class="fa fa-times"
                                                   aria-hidden="true"></i></a>
                                                @endif
                                                <label for="file" style="cursor: pointer;"
                                                   class="form-label upload_image choose_file hm-choose-img-title">Choose image</label>
                                             </div>
                                             <span class="error_field" id="logo_required"></span>
                                          </div>
                                       </div>
                                    </div>

                                    <div
                                       class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                       <label for="">Url</label>
                                    </div>
                                    <div class="card-block px-0 py-3">
                                       <div class="row form-sec">
                                          <div
                                             class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                             <input type="text"
                                                value="{{ isset($client->url) ? $client->url : '' }}"
                                                name="url" id="url" data-parsley-type="url" data-parsley-errors-container="#url_required" data-parsley-type-message="Url is not valid">
                                             <span class="error_field" id="url_required"></span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="mb-3 text-end">
                                 <button type="submit" id="submit_form" class="btn btn-lg btn-primary">Save</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('script')
<script>
   const assetPath = "{{ asset('assets/images/user/img-demo_1041.jpg') }}";
   $('#remove_image').click(function(event) {
       event.stopPropagation();
       $('#img_id').val(null);
       $('#profile_avtar').attr('src', assetPath);
       $('#remove_image').css('display', 'none');
       $('#profile_avtar').css('opacity', '1.0');
   });
       
</script>
<script>
   $(document).ready(function () {
   
       $('form').parsley({
           excluded: 'input[type=hidden]:not(.visible)'
       });
       $('#submit_form').on('click', function (e) {
      
   
        $('#img_id').addClass('visible');
        $('#banner_img_id').addClass('visible');
   
   
           // Validate the form
           if (!$('form').parsley().validate()) {
               e.preventDefault();
           }
           // Hide the hidden input again
           $('#img_id').removeClass('visible');
           $('#banner_img_id').removeClass('visible');
           
   
       });
   });
</script>
@endsection