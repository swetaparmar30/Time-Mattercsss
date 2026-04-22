<div class="accordion-body">
   <div class="row">
      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
         <div class="row form-sec">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
               <label for="">Title </label>
            </div>
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <input type="text" name="door_title" id="door_title" placeholder="Title"  value="{{ isset($garage_door->door_title) ? $garage_door->door_title : '' }}" data-parsley-required-message="Please Enter Title">
            </div>
         </div>
        
         <div class="row form-sec">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
               <label for="">Button Name</label>
            </div>
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <input type="text" name="resi_button_name" id="resi_button_name" placeholder="Button Name"  value="{{ isset($residential->resi_button_name) ? $residential->resi_button_name : '' }}" data-parsley-required-message="Please Enter Button Name">
               <span id="content_required"></span>
            </div>
         </div>
         <div class="row form-sec">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
               <label for="">Button Url</label>
            </div>
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <input type="text" name="resi_button_url" id="resi_button_url" placeholder="Button Url"  value="{{ isset($residential->resi_button_url) ? $residential->resi_button_url : '' }}" data-parsley-required-message="Please Enter Button Url">
            </div>
         </div>
         <div class="row form-sec">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
               <label for="">Image</label>
               <div class="upload-img-sec">
                  <input type="hidden" name="garage_img" id="img_id" value="{{ isset($garage_door->garage_img) ? $garage_door->garage_img : '' }}">
                  @if(isset($garage_door->garage_img) && $garage_door->garage_img != '' && $garage_door->garage_img != null)
                  @php
                  $img = App\Models\MediaImage::select('name')->where('id', $garage_door->garage_img)->first();
                  @endphp
                  <div class="image_preview_div">
                     <img src="{{ asset('uploads/'.$img->name) }}" alt="" id="profile_avtar" class="profile-img" > 
                     <a id="remove_image"> <i class="fa fa-times" aria-hidden="true"></i></a>
                  </div>
                  @else
                  <div class="image_preview_div">
                     <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt="" id="profile_avtar" class="profile-img"> 
                     <a id="remove_image" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                  </div>
                  @endif
                  <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title">Choose image</label>
                  @if(isset($garage_door->garage_img) && $garage_door->garage_img != '' && $garage_door->garage_img != null)
                  @else
                  <span id="img_alert" class="parsley-required" style="font-weight: 500 !important;color: red !important;"> </span>
                  @endif
               </div>
            </div>
         </div>
      </div>
      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
         <div class="row form-sec">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
               <label for="">Sub Title </label>
            </div>
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <input type="text" name="door_sub_title" id="door_sub_title" placeholder="Sub Title"  value="{{ isset($garage_door->door_sub_title) ? $garage_door->door_sub_title : '' }}" data-parsley-required-message="Please Enter Sub Title">
            </div>
         </div>
         <div class="row form-sec">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
               <label for="">Description</label>
            </div>
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <textarea class="form-control rich-text-editor" id="garage_door_description" name="garage_door_description" style="height: 300px;"  data-parsley-errors-container="#content_required1" data-parsley-required-message="Please Enter Description">{{ isset($garage_door->garage_door_description) ? $garage_door->garage_door_description : '' }}</textarea>
               <span id="content_required1" class="parsley-required" style="font-weight: 500 !important;"></span>
            </div>
         </div>
      </div>
   </div>
</div>
