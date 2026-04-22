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
               <form action="{{ route('location.store') }}" method="POST" data-parsley-validate=""
                  enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" id="location_id" name="location_id" value=" {{ isset($location->id) ? $location->id : '' }} ">
                  <div class="row">
                     <div
                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 cpl-sm-12 col-xs-12 add-article form-main-sec ">
                        <div class="card Recent-Users">
                           @if (isset($location) && $location != '')
                           <h5>Edit Location</h5>
                           @else
                           <h5>Add Location</h5>
                           @endif
                           <div class="card-block px-0 py-3">
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Country Short Name<span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" id="country_name" name="country_name" required
                                       data-parsley-required-message="Please Enter Country Short Name"
                                       placeholder="Country Short Name"
                                       value="{{ isset($location->country_name) ? $location->country_name : '' }}">
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Country Full Name <span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" id="country_full_name" name="country_full_name" required
                                       data-parsley-required-message="Please Enter Country Full Name"
                                       placeholder="Country Full Name"
                                       value="{{ isset($location->country_full_name) ? $location->country_full_name : '' }}">
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Title <span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" id="title" name="title" required
                                       data-parsley-required-message="Please Enter Title"
                                       placeholder="Title"
                                       value="{{ isset($location->title) ? $location->title : '' }}">
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Sub Title </label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" id="sub_title" name="sub_title" 
                                       placeholder="Sub Title"
                                       value="{{ isset($location->sub_title) ? $location->sub_title : '' }}">
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Address <span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <textarea class="form-control" id="address" name="address" style="height: 300px;" required  data-parsley-required-message="Please Enter Description" data-parsley-errors-container="#content_required">{{ isset($location->address) ? $location->address : '' }}</textarea>
                                    <span id="content_required" style="font-weight: 400!important;"></span>
                                 </div>
                              </div>
                                <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Google Map</label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" id="map" name="map" 
                                       placeholder="Google Map Link" required
                                       data-parsley-required-message="Please Enter Google Map Link"
                                       value="{{ isset($location->map) ? $location->map : '' }}">
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Phone <span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control imput-mask" id="phone" name="phone" required data-parsley-required-message="Please Enter Phone" data-parsley-pattern="^\(\d{3}\) \d{3}-\d{4}$" data-parsley-pattern-message="Phone Number must be at least 10 digits" data-parsley-minlength="10" data-parsley-minlength-message="Phone Number must be at least 10 digits"
                                       placeholder="Phone"
                                       value="{{ isset($location->phone) ? $location->phone : '' }}">
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Fax <span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control imput-mask" id="fax" name="fax" required
                                       data-parsley-required-message="Please Enter Fax" data-parsley-pattern="^\(\d{3}\) \d{3}-\d{4}$" data-parsley-pattern-message="Fax must be at least 10 digits" data-parsley-minlength="10" data-parsley-minlength-message="Fax must be at least 10 digits"
                                       placeholder="Fax"
                                       value="{{ isset($location->fax) ? $location->fax : '' }}">
                                 </div>
                              </div>
                              <div class="mb-3 text-end">
                                 <button type="submit" id="submit_form" class="btn btn-lg btn-primary">Save</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div
                        class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 cpl-sm-12 col-xs-12 add-article form-main-sec right-sec">
                        <div class="card Recent-Users">
                           <h5>Thumbnail</h5>
                           <div class="card-block px-0 py-3">
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                    <input type="hidden"
                                       value="{{ isset($location->image) ? $location->image : '' }}"
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
                                          class="form-label upload_image choose_file">Choose image</label>
                                    </div>
                                    <span class="error_field" id="logo_required"></span>
                                 </div>
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
   $('#address').summernote({height: 250});
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